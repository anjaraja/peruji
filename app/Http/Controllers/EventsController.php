<?php

namespace App\Http\Controllers;

use App\Helpers\Pagination;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Storage;

class EventsController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/events/{page}",
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

            $news = Events::orderBy("created_at","desc")->paginate(15, ["*"], "page", $page)->toArray();
            $news = Pagination::ClearObject($news);

            Log::channel('activity')->warning('[LOAD EVENTS]', ["page"=>$page]);

            return response()->json(["message"=>"ok","data"=>$news],200);;
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[LOAD EVENTS]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC1"],500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/events/",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"eventname","eventdate","description","photo","agenda"},
     *                  @OA\Property(
     *                      property="eventname",
     *                      type="string",
     *                      example="Event Title"
     *                  ),
     *                  @OA\Property(
     *                      property="eventdate",
     *                      type="date",
     *                      example="2025-01-30"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="text",
     *                      example="Event Description"
     *                  ),
     *                  @OA\Property(
     *                      property="photo",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                      property="agenda",
     *                      type="string",
     *                      format="binary"
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
                'eventname' => 'required|string',
                'eventdate' => 'required|string',
                'description' => 'required|string',
                // 'photo' => 'required|file|mimes:jpeg,jpg,png|max:2048',
                'photo' => 'required|file|mimes:jpeg,jpg,png',
                'agenda' => 'required|file|mimes:pdf',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[CREATE EVENTS]', [$request->all(),$validated->errors()]);
                return response()->json(["message" => "RC2.1"], 422);
            }

            $data = $request->all();
            $data["activestatus"] = 1;
            $data["created_by"] = auth("api")->user()->email;
            $data["modified_by"] = auth("api")->user()->email;
            Log::channel('activity')->info('[CREATE EVENTS][DATA]', $data);

            // BEGIN UPLOAD PHOTO
            $photo = $request->file("photo");
            $filename = time()."_".$data["eventname"].".".$photo->getClientOriginalExtension();
            $path = $request->file('photo')->storeAs('event-photo', $filename, 'public');
            $data["photo"] = Storage::url($path);
            // END UPLOAD PHOTO

            // BEGIN UPLOAD AGENDA
            $agenda = $request->file("agenda");
            $filename = time()."_".$data["eventname"].".".$agenda->getClientOriginalExtension();
            $path = $request->file('agenda')->storeAs('event-agenda', $filename, 'public');
            $data["agenda"] = Storage::url($path);
            // END UPLOAD

            $store = Events::create($data);

            return response()->json(["message"=>"ok"],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[CREATE EVENTS]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC2.2"],500);;
        }
    }

    public function show(News $news)
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/api/update-events/",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"events","eventname","eventdate","description"},
     *                  @OA\Property(
     *                      property="events",
     *                      type="string",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="eventname",
     *                      type="string",
     *                      example="News Title"
     *                  ),
     *                  @OA\Property(
     *                      property="eventdate",
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
     *                      property="agenda",
     *                      type="string",
     *                      format="binary"
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
                'events' => 'required|int',
                'eventname' => 'required|string',
                'eventdate' => 'required|string',
                'description' => 'required|string',
                // 'photo' => 'nullable|file|mimes:jpeg,jpg,png|max:2048',
                'photo' => 'nullable|file|mimes:jpeg,jpg,png',
                'agenda' => 'nullable|file|mimes:pdf',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[UPDATE EVENTS]', [$validated->errors(),$request->all()]);
                return response()->json(["message" => "RC3.1"], 422);
            }

            $events = Events::select("photo","agenda")->where("id",$request->events);
            $events_data = $events->first();
            if(!$events_data){
                Log::channel('activity')->warning('[UPDATE EVENTS]', ["Data not found with id",$request->events]);
                return response()->json(["message" => "RC3.2"], 422);
            }

            $data = $request->all();
            $data["id"] = $request->events;
            $data["modified_by"] = auth("api")->user()->email;
            Log::channel('activity')->info('[UPDATE EVENTS][DATA]', $data);

            // BEGIN UPLOAD PHOTO
            if ($request->hasFile('photo')) {
                $photo_path = str_replace("storage/", "", $events_data->photo);
                // Delete old image if it exists
                if ($photo_path && Storage::disk('public')->exists($photo_path)) {
                    Storage::disk('public')->delete($photo_path);
                }

                // Store new image
                $photo = $request->file("photo");
                $filename = time()."_".$data["eventname"].".".$photo->getClientOriginalExtension();
                $path = $request->file('photo')->storeAs('event-photo', $filename, 'public');
                $data["photo"] = Storage::url($path);
            }
            else unset($data["photo"]);
            // END UPLOAD PHOTO

            // BEGIN UPLOAD AGENDA
            if ($request->hasFile('agenda')) {
                $agenda_path = str_replace("storage/", "", $events_data->agenda);
                // Delete old image if it exists
                if ($agenda_path && Storage::disk('public')->exists($agenda_path)) {
                    Storage::disk('public')->delete($agenda_path);
                }

                // Store new image
                $agenda = $request->file("agenda");
                $filename = time()."_".$data["eventname"].".".$agenda->getClientOriginalExtension();
                $path = $request->file('agenda')->storeAs('event-agenda', $filename, 'public');
                $data["agenda"] = Storage::url($path);
            }
            else unset($data["agenda"]);
            // END UPLOAD AGENDA

            unset($data["events"]);
            $store = $events->update($data);

            return response()->json(["message"=>"ok"],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[UPDATE AGENDA]', ["message"=>$e->getMessage()]);
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
