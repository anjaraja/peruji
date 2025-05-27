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
            $page = is_int($page)?$page:1;

            $email_admin = EmailAdmin::select(DB::raw("id as ordering, rawemail as emails"))->paginate(15, ["*"], "page", $page)->toArray();
            $email_admin = Pagination::ClearObject($email_admin);

            Log::channel('activity')->warning('[LOAD EMAIL ADMIN]', ["page"=>$page]);

            return response()->json(["message"=>"ok","data"=>$email_admin],200);;
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
                'email' => 'required'
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[CREATE EMAIL ADMIN]', [$request->all(),$validated->errors()]);
                return response()->json(["message" => "RC2.1"], 422);
            }

            $data = $request->all();
            $id = [0=>1,1=>2,2=>3];

            foreach($data["email"] as $key => $value){
                $store_data = [];
                $store_data["activestatus"] = 1;
                $store_data["modified_by"] = auth("api")->user()->email;
                $value = isset($value)?$value:"";

                if(!isset($id[$key])){
                    DB::rollback();
                    Log::channel('activity')->warning('[CREATE EMAIL ADMIN]', [$request->all(),"KEY $key IS NOT DEFINED ID"]);
                    return response()->json(["message" => "RC2.1"], 422);
                }

                $email_admin = EmailAdmin::where("id",$id[$key]);

                if($email_admin->first()){
                    $store_data["rawemail"] = $value;
                    $store_data["modified_by"] = auth("api")->user()->email;
                    Log::channel('activity')->info('[UPDATE EMAIL ADMIN][DATA]', $store_data);
                    
                    $store = $email_admin->update($store_data);
                }
                else{
                    $store_data["rawemail"] = $value;
                    $store_data["created_by"] = auth("api")->user()->email;
                    Log::channel('activity')->info('[CREATE EMAIL ADMIN][DATA]', $store_data);

                    $store = $email_admin->create($store_data);
                }
            }

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
