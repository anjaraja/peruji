<?php

namespace App\Http\Controllers;

use App\Helpers\Pagination;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Storage;

class NewsController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/news/{page}",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\Parameter(
     *          name="page",
     *          in="path",
     *          description="Page Number",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function index($page)
    {
        try{
            $page = is_int($page)?$page:1;

            $news = News::orderBy("created_at","desc")->paginate(15, ["*"], "page", $page)->toArray();
            $news = Pagination::ClearObject($news);

            Log::channel('activity')->warning('[LOAD NEWS]', ["page"=>$page]);

            return response()->json(["message"=>"ok","data"=>$news],200);;
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[LOAD NEWS]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC1"],500);;
        }
    }

    /**
     * @OA\Post(
     *      path="/api/news/",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"newsname","newsdate","description","photo","additionalcontent"},
     *                  @OA\Property(
     *                      property="newsname",
     *                      type="string",
     *                      example="News Title"
     *                  ),
     *                  @OA\Property(
     *                      property="newsdate",
     *                      type="date",
     *                      example="2025-01-30"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="text",
     *                      example="News Description"
     *                  ),
     *                  @OA\Property(
     *                      property="photo",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                      property="additionalcontent",
     *                      type="text",
     *                      example="Some links or another"
     *                  )
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function store(Request $request)
    {
        try{
            $validated = Validator::make($request->all(),[
                'newsname' => 'required|string',
                'newsdate' => 'required|string',
                'description' => 'required|string',
                'photo' => 'required|file|mimes:jpeg,jpg,png|max:2048',
                'additionalcontent' => 'string',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[CREATE NEWS]', $request->all());
                return response()->json(["message" => "RC2.1"], 422);
            }

            $data = $request->all();
            $data["activestatus"] = 1;
            $data["created_by"] = auth("api")->user()->email;
            $data["modified_by"] = auth("api")->user()->email;
            Log::channel('activity')->info('[CREATE NEWS][DATA]', $data);

            // BEGIN UPLOAD
            $photo = $request->file("photo");
            $filename = time()."_".$data["newsname"].".".$photo->getClientOriginalExtension();
            $path = $request->file('photo')->storeAs('news', $filename, 'public');
            $data["photo"] = Storage::url($path);
            // END UPLOAD

            $store = News::create($data);

            return response()->json(["message"=>"ok"],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[CREATE NEWS]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC2.2"],500);;
        }
    }

    public function show(News $news)
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/api/update-news/",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"news","newsname","newsdate","description","additionalcontent"},
     *                  @OA\Property(
     *                      property="news",
     *                      type="string",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="newsname",
     *                      type="string",
     *                      example="News Title"
     *                  ),
     *                  @OA\Property(
     *                      property="newsdate",
     *                      type="date",
     *                      example="2025-01-30"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="text",
     *                      example="News Description"
     *                  ),
     *                  @OA\Property(
     *                      property="photo",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                      property="additionalcontent",
     *                      type="text",
     *                      example="Some links or another"
     *                  )
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function update(Request $request)
    {
        try{
            $validated = Validator::make($request->all(),[
                'news' => 'required|int',
                'newsname' => 'required|string',
                'newsdate' => 'required|string',
                'description' => 'required|string',
                'photo' => 'nullable|file|mimes:jpeg,jpg,png|max:2048',
                'additionalcontent' => 'string',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[UPDATE NEWS]', [$validated->errors(),$request->all()]);
                return response()->json(["message" => "RC3.1"], 422);
            }

            $news = News::select("photo")->where("id",$request->news);
            $news_data = $news->first();
            if(!$news_data){
                Log::channel('activity')->warning('[UPDATE NEWS]', ["Data not found with id",$request->news]);
                return response()->json(["message" => "RC3.2"], 422);
            }

            $data = $request->all();
            $data["id"] = $request->news;
            $data["modified_by"] = auth("api")->user()->email;
            Log::channel('activity')->info('[UPDATE NEWS][DATA]', $data);

            // BEGIN UPLOAD
            if ($request->hasFile('photo')) {
                $photo_path = str_replace("storage/", "", $news_data->photo);
                // Delete old image if it exists
                if ($photo_path && Storage::disk('public')->exists($photo_path)) {
                    Storage::disk('public')->delete($photo_path);
                }

                // Store new image
                $photo = $request->file("photo");
                $filename = time()."_".$data["newsname"].".".$photo->getClientOriginalExtension();
                $path = $request->file('photo')->storeAs('news', $filename, 'public');
                $data["photo"] = Storage::url($path);
            }
            else unset($data["photo"]);

            // END UPLOAD

            unset($data["news"]);
            $store = $news->update($data);

            return response()->json(["message"=>"ok"],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[UPDATE NEWS]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC3.3"],500);;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
