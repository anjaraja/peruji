<?php

namespace App\Http\Controllers;

use App\Helpers\Pagination;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
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
            $events = Events::where("activestatus",1)
                ->where("eventdate",">=",Carbon::now()->format("Y-m-d"))
                ->when($for!="dashboard",function($events){
                    $events->where("publishdate","<=",Carbon::now()->format("Y-m-d"));
                })
                ->orderBy("eventdate","asc")
                ->paginate(15, ["*"], "page", $page)
                ->toArray();
            foreach($events["data"] as $key => $value){
                $start_date = date('d', strtotime($value["eventdate"]));
                $end_date = date('d', strtotime($value["eventdate"] . " +".$value["duration"]." days"));
                $eng_month_name = date('F', strtotime($value["eventdate"] . " +".$value["duration"]." days"));
                $month_name = $idn_month[$eng_month_name];
                $end_year = date('Y', strtotime($value["eventdate"] . " +".$value["duration"]." days"));

                $events["data"][$key]["eng_display_detail_date"] = "$start_date - $end_date $eng_month_name $end_year";
                $events["data"][$key]["display_detail_date"] = "$start_date - $end_date $month_name $end_year";
            }
            $events = Pagination::ClearObject($events);

            Log::channel('activity')->warning('[LOAD EVENTS]', ["page"=>$page]);

            return response()->json(["message"=>"ok","data"=>$events],200);;
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
     *                  required={"eventsource","eventname","eventdate","description","eng_description"},
     *                  @OA\Property(
     *                      property="eventsource",
     *                      type="string",
     *                      example="event1 | event2 | event3 | event4"
     *                  ),
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
     *                      property="duration",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="text",
     *                      example="Event Description (IDN)"
     *                  ),
     *                  @OA\Property(
     *                      property="eng_description",
     *                      type="text",
     *                      example="Event Description (ENG)"
     *                  ),
     *                  @OA\Property(
     *                      property="banner",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                      property="thumbnail",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                     description="Multiple files to upload",
     *                     property="photo[]",
     *                     type="array",
     *                     @OA\Items(
     *                         type="string",
     *                         format="binary"
     *                     )
     *                  ),
     *                  @OA\Property(
     *                      property="agenda",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                      property="additionalcontent",
     *                      type="string",
     *                      description="Additional Content (textarea)",
     *                      example="http://newswebsite1.com\nhttp://newswebsite1.com\nhttp://newswebsite1.com\nhttp://newswebsite1.com\nhttp://newswebsite1.com"
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
                'eventsource' => 'required|string',
                'eventname' => 'required|string',
                'eventdate' => 'required|string',
                'duration' => 'nullable|integer',
                'eventdisplaydate' => 'required|string',
                'description' => 'required|string',
                'eng_description' => 'required|string',
                'banner' => 'nullable|file|mimes:jpeg,jpg,png',
                'thumbnail' => 'nullable|file|mimes:jpeg,jpg,png',
                'photo' => 'nullable|array',
                'photo.*' => 'nullable|file|mimes:jpeg,jpg,png',
                'agenda' => 'nullable|file|mimes:pdf',
                'additionalcontent' => 'nullable|string',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[CREATE EVENTS]', [$request->all(),$validated->errors()]);
                return response()->json(["message" => "RC2.1"], 422);
            }

            $data = $request->all();
            $data["source"] = $data["eventsource"];
            $data["publishdate"] = $data["eventdisplaydate"];
            unset($data["eventdisplaydate"]);
            $data["activestatus"] = 1;
            $data["created_by"] = auth("api")->user()->email;
            $data["modified_by"] = auth("api")->user()->email;
            Log::channel('activity')->info('[CREATE EVENTS][DATA]', $data);

            // BEGIN UPLOAD BANNER
            if(isset($request->banner)){
                $banner = $request->file("banner");
                $filename = time()."_".$data["eventname"].".".$banner->getClientOriginalExtension();
                $path = $request->file('banner')->storeAs('event-banner', $filename, 'public');
                $data["banner"] = Storage::url($path);
            }
            // END UPLOAD BANNER

            // BEGIN UPLOAD THUMBNAIL
            if(isset($request->thumbnail)){
                $thumbnail = $request->file("thumbnail");
                $filename = time()."_".$data["eventname"].".".$thumbnail->getClientOriginalExtension();
                $path = $request->file('thumbnail')->storeAs('event-thumbnail', $filename, 'public');
                $data["thumbnail"] = Storage::url($path);
            }
            // END UPLOAD THUMBNAIL

            // BEGIN UPLOAD PHOTO
            $photos = [];
            if(isset($request->photo)){
                if($request->file("photo")){
                    foreach ($request->file("photo") as $key => $value) {
                        $filename = time()."_".$data["eventname"]."-$key".".".$value->getClientOriginalExtension();
                        $path = $value->storeAs('event-photo', $filename, 'public');
                        $photos[] = Storage::url($path);
                    }  
                }
            } 
            $data["photo"] = json_encode($photos);
            // END UPLOAD PHOTO   

            // BEGIN UPLOAD AGENDA
            if(isset($request->agenda)){
                $agenda = $request->file("agenda");
                $filename = time()."_".$data["eventname"].".".$agenda->getClientOriginalExtension();
                $path = $request->file('agenda')->storeAs('event-agenda', $filename, 'public');
                $data["agenda"] = Storage::url($path);
            }
            // END UPLOAD

            $store = Events::create($data);

            return response()->json(["message"=>"ok"],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[CREATE EVENTS]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC2.2"],500);;
        }
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
     *                  required={"events","eventname","eventdate","eventdisplaydate","description","eng_description"},
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
     *                      property="duration",
     *                      type="integer",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="eventdisplaydate",
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
     *                      property="banner",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                      property="thumbnail",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                     description="Multiple files to upload",
     *                     property="photo[]",
     *                     type="array",
     *                     @OA\Items(
     *                         type="string",
     *                         format="binary"
     *                     )
     *                  ),
     *                  @OA\Property(
     *                      property="agenda",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                      property="additionalcontent",
     *                      type="string",
     *                      description="Additional Content (textarea)",
     *                      example="http://newswebsite1.com\nhttp://newswebsite1.com\nhttp://newswebsite1.com\nhttp://newswebsite1.com\nhttp://newswebsite1.com"
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
                'eventname' => 'required|string',
                'eventdate' => 'required|string',
                'duration' => 'nullable|integer',
                'eventdisplaydate' => 'required|string',
                'description' => 'required|string',
                'eng_description' => 'required|string',
                'banner' => 'nullable|file|mimes:jpeg,jpg,png',
                'thumbnail' => 'nullable|file|mimes:jpeg,jpg,png',
                'photo' => 'nullable|array',
                'photo.*' => 'nullable|file|mimes:jpeg,jpg,png',
                'agenda' => 'nullable|file|mimes:pdf',
                'additionalcontent' => 'nullable|string',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[UPDATE EVENTS]', [$validated->errors(),$request->all()]);
                return response()->json(["message" => "RC3.1"], 422);
            }

            $events = Events::select("banner","thumbnail","photo","agenda")->where("id",$request->events);
            $events_data = $events->first();
            if(!$events_data){
                Log::channel('activity')->warning('[UPDATE EVENTS]', ["Data not found with id",$request->events]);
                return response()->json(["message" => "RC3.2"], 422);
            }

            $data = $request->all();
            $data["id"] = $request->events;
            $data["publishdate"] = $data["eventdisplaydate"];
            unset($data["eventdisplaydate"]);
            $data["modified_by"] = auth("api")->user()->email;
            Log::channel('activity')->info('[UPDATE EVENTS][DATA]', $data);

            // BEGIN UPLOAD BANNER
            if ($request->hasFile('banner')) {
                $banner_path = str_replace("storage/", "", $events_data->banner);
                // Delete old image if it exists
                if ($banner_path && Storage::disk('public')->exists($banner_path)) {
                    Storage::disk('public')->delete($banner_path);
                }

                // Store new image
                $banner = $request->file("banner");
                $filename = time()."_".$data["eventname"].".".$banner->getClientOriginalExtension();
                $path = $request->file('banner')->storeAs('event-banner', $filename, 'public');
                $data["banner"] = Storage::url($path);
            }
            else unset($data["banner"]);
            // END UPLOAD BANNER

            // BEGIN UPLOAD THUMBNAIL
            if ($request->hasFile('thumbnail')) {
                $thumbnail_path = str_replace("storage/", "", $events_data->thumbnail);
                // Delete old image if it exists
                if ($thumbnail_path && Storage::disk('public')->exists($thumbnail_path)) {
                    Storage::disk('public')->delete($thumbnail_path);
                }

                // Store new image
                $thumbnail = $request->file("thumbnail");
                $filename = time()."_".$data["eventname"].".".$thumbnail->getClientOriginalExtension();
                $path = $request->file('thumbnail')->storeAs('event-thumbnail', $filename, 'public');
                $data["thumbnail"] = Storage::url($path);
            }
            else unset($data["thumbnail"]);
            // END UPLOAD THUMBNAIL

            // BEGIN UPLOAD PHOTO
            $photos = json_decode($events_data->photo);
            if(isset($request->photo)){
                if($request->file("photo")){
                    foreach ($request->file("photo") as $key => $value) {
                        $filename = time()."_".$data["eventname"]."-$key".".".$value->getClientOriginalExtension();
                        $path = $value->storeAs('event-photo', $filename, 'public');
                        $photos[] = Storage::url($path);
                    }  
                }
            } 
            $data["photo"] = json_encode($photos);
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
     * @OA\Get(
     *      path="/api/detail-events/{events}",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\Parameter(
     *          name="events",
     *          in="path",
     *          description="Event ID",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function show($events)
    {
        try{
            if (!isset($events) && !is_int($events)) {
                Log::channel('activity')->warning('[DETAIL EVENTS]', ["Event ID is empty or incorrect type",$events]);
                return response()->json(["message" => "RC4.1"], 422);
            }

            $event_data = Events::where("id",$events)->first();
            if($event_data){
                $event_data->photo = json_decode($event_data->photo);
            }

            Log::channel('activity')->warning('[DETAIL EVENTS]', ["Event ID"=>$events]);

            return response()->json(["message"=>"ok","data"=>$event_data],200);;
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[DETAIL EVENTS]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC4"],500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/upload-gallery-events/",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"events","photo"},
     *                  @OA\Property(
     *                      property="events",
     *                      type="string",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="photo",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function eventUploadPhotoGallery(Request $request)
    {
        try{
            $validated = Validator::make($request->all(),[
                'events' => 'required|integer',
                'photo' => 'required|file|mimes:jpeg,jpg,png',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[UPDATE PHOTO GALLERY EVENTS]', [$validated->errors(),$request->all()]);
                return response()->json(["message" => "RC5.1"], 422);
            }

            $events = Events::where("id",$request->events);
            $events_data = $events->first();
            if(!$events_data){
                Log::channel('activity')->warning('[UPDATE PHOTO GALLERY EVENTS]', ["Data not found with id",$request->events]);
                return response()->json(["message" => "RC5.2"], 422);
            }

            $data = $request->all();
            $data["id"] = $request->events;
            $data["modified_by"] = auth("api")->user()->email;
            Log::channel('activity')->info('[UPDATE PHOTO GALLERY EVENTS][DATA]', $data);

            // BEGIN UPLOAD PHOTO
            $photos = json_decode($events_data->photo);
            if(isset($request->photo)){
                $photo = $request->file("photo");
                $filename = time()."_".$events_data->eventname.".".$photo->getClientOriginalExtension();
                $path = $request->file('photo')->storeAs('event-photo', $filename, 'public');
                $photos[] = Storage::url($path);
            }
            $data["photo"] = $photos;
            // END UPLOAD PHOTO

            unset($data["events"]);
            $store = $events->update($data);

            return response()->json(["message"=>"ok"],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[UPDATE PHOTO GALLERY AGENDA]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC5.3"],500);;
        }
    }

    /**
     * @OA\Get(
     *      path="/api/previous-events/{page}",
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
    public function previousEvents($page)
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

            $events = Events::where("isprevious",1)->orderBy("eventdate","desc")->paginate(15, ["*"], "page", $page)->toArray();

            foreach($events["data"] as $key => $value){
                $start_date = date('d', strtotime($value["eventdate"]));
                $end_date = date('d', strtotime($value["eventdate"] . " +".$value["duration"]." days"));
                $eng_month_name = date('F', strtotime($value["eventdate"] . " +".$value["duration"]." days"));
                $month_name = $idn_month[$eng_month_name];
                $end_year = date('Y', strtotime($value["eventdate"] . " +".$value["duration"]." days"));

                $events["data"][$key]["eng_display_detail_date"] = "$start_date - $end_date $eng_month_name $end_year";
                $events["data"][$key]["display_detail_date"] = "$start_date - $end_date $month_name $end_year";
            }

            $events = Pagination::ClearObject($events);

            Log::channel('activity')->warning('[LOAD PREVIOUS EVENTS]', ["page"=>$page]);

            return response()->json(["message"=>"ok","data"=>$events],200);;
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[LOAD PREVIOUS EVENTS]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC6"],500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/publish-previous-events/",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"events"},
     *                  @OA\Property(
     *                      property="events",
     *                      type="integer",
     *                      example=1
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
    public function publishToPrevious(Request $request)
    {
        try{
            $validated = Validator::make($request->all(),[
                'events' => 'required|integer'
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[PUBLISH PREVIOUS EVENTS]', [$validated->errors(),$request->all()]);
                return response()->json(["message" => "RC7.1"], 422);
            }

            $events = Events::where("id",$request->events);
            $event_data = $events->first();
            if($event_data){
                $events->update([
                    "isprevious" => 1,
                    "modified_by" => now()
                ]);

                Log::channel('activity')->warning('[PUBLISH PREVIOUS EVENTS]', [$validated->errors(),$request->all()]);
                return response()->json(["message" => "ok"], 200);
            }
            else{
                Log::channel('activity')->warning('[PUBLISH PREVIOUS EVENTS]', ["DATA NOT FOUND",$request->all()]);
                return response()->json(["message" => "RC7.2"], 422);
            }
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[PUBLISH PREVIOUS EVENTS]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC7"],500);
        }
    }


    /**
     * @OA\Post(
     *      path="/api/delete-photo-gallery-events/",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"events","photo"},
     *                  @OA\Property(
     *                      property="events",
     *                      type="string",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="photo",
     *                      type="string",
     *                      example="/storage/event-photo/filename.formatimage"
     *                  ),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function deletePhotoGalleryEvent(Request $request)
    {
        try{
            $validated = Validator::make($request->all(),[
                'events' => 'required|integer',
                'photo' => 'required|string',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[UPDATE PHOTO GALLERY EVENTS]', [$validated->errors(),$request->all()]);
                return response()->json(["message" => "RC8.1"], 422);
            }

            $events = Events::where("id",$request->events);
            $events_data = $events->first();
            if(!$events_data){
                Log::channel('activity')->warning('[UPDATE PHOTO GALLERY EVENTS]', ["Data not found with id",$request->events]);
                return response()->json(["message" => "RC8.2"], 422);
            }

            $data = $request->all();
            $data["id"] = $request->events;
            $data["modified_by"] = auth("api")->user()->email;
            Log::channel('activity')->info('[UPDATE PHOTO GALLERY EVENTS][DATA]', $data);

            // BEGIN UPLOAD PHOTO
            $photos = json_decode($events_data->photo);
            foreach($photos as $key => $value){
                if($value == $request->photo){
                    $photo_path = str_replace("storage/", "", $value);
                    // Delete old image if it exists
                    if ($photo_path && Storage::disk('public')->exists($photo_path)) {
                        Storage::disk('public')->delete($photo_path);
                    }
                    unset($photos[$key]);
                }
            }
            $data["photo"] = $photos;
            // END UPLOAD PHOTO

            unset($data["events"]);
            $store = $events->update($data);

            return response()->json(["message"=>"ok"],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[UPDATE PHOTO GALLERY AGENDA]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC8.3"],500);;
        }
    }
}
