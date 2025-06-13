<?php

namespace App\Http\Controllers;

use App\Helpers\Pagination;
use App\Models\EmailAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmailAdminController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/email-admin/{page}",
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
            // $page = is_int($page)?$page:1;

            // $email_admin = EmailAdmin::select(DB::raw("id as ordering, rawemail as emails"))->paginate(15, ["*"], "page", $page)->toArray();
            // $email_admin = Pagination::ClearObject($email_admin);
            $email_admin = EmailAdmin::select(DB::raw("emailfor, rawemail as emails"))->where("activestatus",1)->get();
            $data = [];
            foreach($email_admin as $value){
                $data[$value->emailfor][] = $value->emails;
            }

            Log::channel('activity')->warning('[LOAD EMAIL ADMIN]', ["data"=>$data]);

            return response()->json(["message"=>"ok","data"=>$data],200);;
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[LOAD EMAIL ADMIN]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC1"],500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/email-admin/",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="emailfor",
     *                      type="string",
     *                      enum={"event", "membership", "contact"},
     *                      example="event"
     *                  ),
     *                  @OA\Property(
     *                      property="email[0]",
     *                      type="string",
     *                      example="adminemail@mail.com"
     *                  ),
     *                  @OA\Property(
     *                      property="email[1]",
     *                      type="string",
     *                      example="adminemail@mail.com"
     *                  ),
     *                  @OA\Property(
     *                      property="email[2]",
     *                      type="string",
     *                      example="adminemail@mail.com"
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
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $validated = Validator::make($request->all(),[
                'emailfor' => 'required|in:event,membership,contact',
                'email' => 'required'
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[CREATE EMAIL ADMIN]', [$request->all(),$validated->errors()]);
                return response()->json(["message" => "RC2.1"], 422);
            }

            $data = $request->all();

            $set_inactive = EmailAdmin::where("emailfor",$data["emailfor"])->update([
                "activestatus"=>0,
                "modified_by"=> auth("api")->user()->email
            ]);

            foreach($data["email"] as $key => $value){
                if($value){
                    $store_data = [];
                    $store_data["emailfor"] = $data["emailfor"];
                    $store_data["rawemail"] = $value??"";
                    $store_data["created_by"] = auth("api")->user()->email;
                    $store_data["modified_by"] = auth("api")->user()->email;
                    Log::channel('activity')->info('[CREATE EMAIL ADMIN][DATA]', $store_data);

                    $store = EmailAdmin::create($store_data);
                }
            }

            // foreach($data["email"] as $key => $value){
            //     $store_data = [];
            //     $store_data["activestatus"] = 1;
            //     $store_data["modified_by"] = auth("api")->user()->email;
            //     $value = isset($value)?$value:"";

            //     if(!isset($id[$key])){
            //         DB::rollback();
            //         Log::channel('activity')->warning('[CREATE EMAIL ADMIN]', [$request->all(),"KEY $key IS NOT DEFINED ID"]);
            //         return response()->json(["message" => "RC2.1"], 422);
            //     }

            //     $email_admin = EmailAdmin::where("emailfor","event");

            //     if($email_admin->first()){
            //         $store_data["rawemail"] = $value;
            //         $store_data["modified_by"] = auth("api")->user()->email;
            //         Log::channel('activity')->info('[UPDATE EMAIL ADMIN][DATA]', $store_data);
                    
            //         $store = $email_admin->update($store_data);
            //     }
            //     else{
            //         $store_data["rawemail"] = $value;
            //         $store_data["created_by"] = auth("api")->user()->email;
            //         Log::channel('activity')->info('[CREATE EMAIL ADMIN][DATA]', $store_data);

            //         $store = $email_admin->create($store_data);
            //     }
            // }

            DB::commit();
            return response()->json(["message"=>"ok"],200);
        }
        catch(\Exception $e){
            DB::rollback();
            Log::channel('errorlog')->error('[CREATE / UPDATE EMAIL ADMIN]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC2.2"],500);;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailAdmin $news)
    {
        //
    }
}
