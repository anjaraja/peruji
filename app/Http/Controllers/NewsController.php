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
    public function index($page,$for="dashboard")
    {
        $idn_month = [
            "January"=>"Januari",
            "February"=>"Februari",
            "March"=>"Maret",
            "April"=>"April",
            "May"=>"Mei",
            "June"=>"Juni",
            "July"=>"Juli",
            "August"=>"Agustus",
            "September"=>"September",
            "October"=>"Oktober",
            "November"=>"November",
            "December"=>"Desember"
        ];
        try{
            $page = is_int($page)?$page:1;

            $news = News::when($for!="dashboard",function($news){
                    $news->where("activestatus",1);
                })
                ->orderBy("newsdate","desc")->paginate(15, ["*"], "page", $page)->toArray();

            foreach($news["data"] as $key => $value){
                $start_date = date('d', strtotime($value["newsdate"]));
                $eng_month_name = date('F', strtotime($value["newsdate"]));
                $month_name = $idn_month[$eng_month_name];
                $end_year = date('Y', strtotime($value["newsdate"]));
                $news["data"][$key]["display_eng_newsdate"] = "$start_date $eng_month_name $end_year";
                $news["data"][$key]["display_newsdate"] = "$start_date $month_name $end_year";

                $description = $news["data"][$key]["description"];
                $eng_description = $news["data"][$key]["eng_description"];
                if (strlen($description) >= 710){
                    $news["data"][$key]["shorted"] = true;
                    $news["data"][$key]["short_description"] = substr($description, 0, 710).".....";
                    $news["data"][$key]["short_eng_description"] = substr($eng_description, 0, 710).".....";
                }
                else{
                    $news["data"][$key]["shorted"] = false;
                    $news["data"][$key]["short_description"] = $description;
                    $news["data"][$key]["short_eng_description"] = $eng_description;
                }
            }

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
     *                  required={"news","newsname","newsdate","description","eng_description","photo","additionalcontent"},
     *                  @OA\Property(
     *                      property="news",
     *                      type="integer",
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
     *                      example="News Description (IDN)"
     *                  ),
     *                  @OA\Property(
     *                      property="eng_description",
     *                      type="text",
     *                      example="News Description (ENG)"
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
                'eng_description' => 'required|string',
                'photo' => 'required|file|mimes:jpeg,jpg,png',
                'additionalcontent' => 'nullable|string',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[CREATE NEWS]', [$validated->errors(),$request->all()]);
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
     *                      example="News Description (IDN)"
     *                  ),
     *                  @OA\Property(
     *                      property="eng_description",
     *                      type="text",
     *                      example="News Description (ENG)"
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
                'eng_description' => 'required|string',
                'photo' => 'nullable|file|mimes:jpeg,jpg,png',
                'additionalcontent' => 'nullable|string',
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

            $photo_path = str_replace("storage/", "", $news_data->photo);
            // BEGIN UPLOAD
            if ($request->hasFile('photo')) {
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
            else{
                if(isset($request->delete_photo)){
                    if ($photo_path && Storage::disk('public')->exists($photo_path)) {
                        Storage::disk('public')->delete($photo_path);
                        $data["photo"] = null;
                        unset($data["delete_photo"]);
                    }
                }
            } 

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
