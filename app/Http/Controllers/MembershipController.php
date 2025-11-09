<?php

namespace App\Http\Controllers;

use App\Helpers\Pagination;
use App\Models\Membership;
use App\Models\UserProfile;
use App\Models\EmailAdmin;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Storage;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class MembershipController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/membership/{page}",
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
            $page = $page?$page:1;

            $offset = $page == 1?0:(10*$page);

            $membership = Membership::select(DB::raw("membership.id as membership, ifnull(userprofile.fullname,membership.fullname)as fullname, ifnull(userprofile.email,membership.email)as email, DATE(membership.created_at)AS registered_date, ifnull(userprofile.status,'pending')as status"))
                ->leftJoin("userprofile","membership.id","=","userprofile.memberid")
                ->orderBy("membership.created_at","desc")
                ->paginate(10, ["*"], "page", $page)
                // ->skip($offset)->take(10)->get()
                ->toArray();
            $membership = Pagination::ClearObject($membership);

            Log::channel('activity')->warning('[LOAD MEMBERSHIP]', ["page"=>$page]);

            return response()->json(["message"=>"ok","data"=>$membership],200);;
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[LOAD MEMBERSHIP]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC1"],500);;
        }
    }
    /**
     * @OA\Post(
     *      path="/api/membership",
     *      tags={"Landingpage"}, 
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *              required={"fullname","gender","email","phone","org","address","website","funct","department","ofcemail"},
     *              @OA\Property(property="fullname", type="string", example="Member Name"),
     *              @OA\Property(property="gender", type="string", enum={"M", "F"}, example="M", description="Gender: M = Male, F = Female"),
     *              @OA\Property(property="email", type="string", format="email", example="membername@gmail.com"),
     *              @OA\Property(property="phone", type="string", example="628123123123"),
     *              @OA\Property(property="dob", type="string", format="date", example="1990-01-30"),
     *              @OA\Property(property="org", type="string", example="My Company / My Organization"),
     *              @OA\Property(property="address", type="string", example="This is my address"),
     *              @OA\Property(property="website", type="string", example="https://mywebsite.com"),
     *              @OA\Property(property="funct", type="string", example="My Function is..."),
     *              @OA\Property(property="department", type="string", example="My Department is..."),
     *              @OA\Property(property="ofcemail", type="string", format="email", example="myoffice@mail.com")
     *         )
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
                'fullname' => 'required|string',
                'gender' => 'required|in:M,F',
                'email' => 'required|email',
                'phone' => 'required|string',
                'org' => 'nullable|string',
                'address' => 'nullable|string',
                'website' => 'nullable|url',
                'funct' => 'nullable|string',
                'department' => 'nullable|string',
                'ofcemail' => 'nullable|email',
            ]);

            if ($validated->fails()) {
                Log::channel('activity')->warning('[MEMBERSHIP REGISTER]', $request->all());
                return response()->json([
                    "status" => "gagal",
                    "message" => $validated->errors()
                ], 422);
            }

            $check_membership = Membership::where("email",$request->email)->first();
            if($check_membership){
                Log::channel('activity')->warning('[MEMBERSHIP REGISTER EMAIL EXISTS]', $request->all());
                return response()->json([
                    "message" => "Your email has already registered."
                ], 422);
            }

            $email_admin = EmailAdmin::select(DB::raw("rawemail as emails"))
                ->where("emailfor","membership")
                ->where("activestatus",1)
                ->get();

            if($email_admin){
                $view = 'mailtemplate.membership'; // dynamic
                $subject = "Someone Register Membership";
                foreach($email_admin as $key => $value){
                    $data = [
                        "fullname"=>$request->fullname,
                        "gender"=>$request->gender=="M"?"Male":"Female",
                        "email"=>$request->email,
                        "phone"=>$request->phone,
                        "company"=>$request->companyname,
                        "department"=>$request->department,
                        "funct"=>$request->funct,
                        "ofcemail"=>$request->ofcemail
                    ];

                    if($value->emails){
                        Log::channel('activity')->info('[SENDING EMAIL TO ADMIN]', [$value->emails]);
                        try{
                            Mail::to($value->emails)->send(new SendMail($view, $subject, $data));
                        } catch (\Exception $e) {
                            // Log the error and continue
                            Log::channel('errorlog')->info('[FAILED SENDING EMAIL]', [$value->emails], $e->getMessage());
                            continue;
                        }
                    }
                }
            }

            Log::channel('activity')->info('[MEMBERSHIP REGISTER]', $request->all());
            $storeData = $request->all();
            $storeData["org"] = $request->companyname;
            $store = Membership::create($storeData);

            DB::commit();
            return response()->json([
                "status" => "berhasil",
                "message" => "Pendaftaran berhasil"
            ], 200);
        }
         catch (\Exception $e) {
            DB::rollback();
            Log::channel('errorlog')->error('[MEMBERSHIP REGISTER]', [$request->all(), $e->getMessage()]);
            return response()->json([
                "status" => "error",
                "message" => "Terjadi kesalahan server. Coba lagi nanti."
            ], 500);
        }

    }

    /**
     * @OA\Get(
     *      path="/api/membership/detail/{id}",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id membership",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function show($id)
    {
        try{
            $membership = Membership::select(DB::raw("userprofile.id as userpfofileid, membership.id as memberid, userprofile.prefix, ifnull(userprofile.organization,membership.org)as organization, membership.gender, ifnull(userprofile.fullname,membership.fullname)as fullname, userprofile.ofcaddress, membership.funct, membership.department, userprofile.suffix, userprofile.ofcphone, userprofile.dob, ifnull(userprofile.ofcemail,membership.ofcemail)as ofcemail, ifnull(userprofile.phone,membership.phone)as phone, userprofile.website, ifnull(userprofile.email,membership.email)as email, userprofile.photo, userprofile.joindate, userprofile.expiredate, userprofile.number, userprofile.status, userprofile.additionaldocument, userprofile.title, userprofile.hobby"))
                ->leftJoin("userprofile","membership.id","=","userprofile.memberid")
                ->where("membership.id",$id)
                ->first();

            $membership->additionaldocument = json_decode($membership->additionaldocument);

            Log::channel('activity')->warning('[LOAD DETAIL MEMBERSHIP]', ["data"=>$membership]);

            return response()->json(["message"=>"ok","data"=>$membership],200);;
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[LOAD DETAIL MEMBERSHIP]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC2"],500);;
        }
    }

    public function edit(membership $membership)
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/api/update-membership/personal-information",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"member","organization","fullname","dob","phone","email"},
     *                  @OA\Property(
     *                      property="member",
     *                      type="integer",
     *                      example="1"
     *                  ),
     *                  @OA\Property(
     *                      property="organization",
     *                      type="string",
     *                      example="My Organization"
     *                  ),
     *                  @OA\Property(
     *                      property="fullname",
     *                      type="string",
     *                      example="John Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="dob",
     *                      type="date",
     *                      example="1999-01-01"
     *                  ),
     *                  @OA\Property(
     *                      property="hobby",
     *                      type="string",
     *                      example="Badminton, Padel, Running, Marathon"
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="string",
     *                      example="08123123123"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="email",
     *                      example="myemail@mail.com"
     *                  ),
     *                  @OA\Property(
     *                      property="photo",
     *                      type="string",
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                      property="joindate",
     *                      type="date",
     *                      example="2025-01-01"
     *                  ),
     *                  @OA\Property(
     *                      property="expiredate",
     *                      type="date",
     *                      example="2026-01-01"
     *                  ),
     *                  @OA\Property(
     *                      property="number",
     *                      type="string",
     *                      example="0012025010101"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="string",
     *                      enum={"pending","active","expired"},
     *                      description="Status: pending = Pending, active = Active, expired = Expired"
     *                  ),
     *                  @OA\Property(
     *                      property="title",
     *                      type="string",
     *                      enum={"management","member"},
     *                      description="Status: management = Management, member = Regular"
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
    public function updatePersonalInformation(Request $request)
    {
        try{
            $validated = Validator::make($request->all(),[
                'member' => 'required|string',
                'organization' => 'nullable|string',
                'fullname' => 'required|string',
                'dob' => 'nullable|date',
                'hobby' => 'nullable|string',
                'phone' => 'required|string',
                'email' => 'required|email',
                'photo' => 'nullable|file|mimes:jpeg,jpg,png',
                'joindate' => 'required|string',
                'expiredate' => 'required|string',
                'number' => 'required|string',
                'status' => 'required|string|in:pending,active,expired',
                'title' => 'required|string|in:member,special,priority,management'
            ]);

            if ($validated->fails()) {
                Log::channel('activity')->warning('[UPDATE PERSONAL INFORMATION]', [$request->all(),$validated->errors()]);
                return response()->json(["message" => "RC3.1"], 422);
            }

            $userprofile = UserProfile::where("memberid",$request->member);
            $userprofiledata = $userprofile->first();
            $store_data = [
                "member"=>$request->member,
                "prefix"=>$request->prefix,
                "fullname"=>$request->fullname,
                "suffix"=>$request->suffix,
                "dob"=>$request->dob,
                "hobby"=>$request->hobby,
                "phone"=>$request->phone,
                "email"=>$request->email,
                "organization"=>$request->organization,
                "ofcaddress"=>$request->ofcaddress,
                "ofcphone"=>$request->ofcphone,
                "ofcemail"=>$request->ofcemail,
                "website"=>$request->website,
                "member"=>$request->member,
                "joindate"=>$request->joindate,
                "expiredate"=>$request->expiredate,
                "number"=>$request->number,
                "status"=>$request->status,
                "title"=>$request->title,
                "modified_by"=>auth("api")->user()->email
            ];

            $membership_data = [
                "gender"=>$request->gender,
                "funct"=>$request->funct,
                "department"=>$request->department,
                "updated_at" => now()
            ];

            $check_membership = Membership::where("email",$request->email)->where('id','<>',$request->member)->first();
            if($check_membership){
                DB::rollback();
                Log::channel('activity')->warning('[MEMBERSHIP REGISTER EMAIL EXISTS]', $request->all());
                return response()->json([
                    "message" => "The email has already registered."
                ], 422);
            }

            if(!$userprofiledata){
                $store_data["memberid"] = $request->member;
                $store_data["created_by"] = auth("api")->user()->email;

                // BEGIN UPLOAD PHOTO
                if(isset($request->photo)){
                    $photo = $request->file("photo");
                    $filename = time()."_".$store_data["memberid"].".".$photo->getClientOriginalExtension();
                    $path = $request->file('photo')->storeAs('member-photo', $filename, 'public');
                    $store_data["photo"] = Storage::url($path);
                }
                // END UPLOAD

                // Generate a signed URL with expiration (e.g., 1 day)
                $member = Membership::where("id",$request->member)->first();
                $url = URL::temporarySignedRoute(
                    'setup-password',
                    now()->addDays(1),
                    ['email' => $member->email, 'fullname' => $member->fullname]
                );

                $view = 'mailtemplate.register-invitation'; // dynamic
                $subject = "Setup Your Peruji Account";
                $data = [
                    "url"=>$url,
                ];
                Log::channel('activity')->info('[SENDING EMAIL TO MEMBER]', [$member->email]);
                try{
                    Mail::to($member->email)->send(new SendMail($view, $subject, $data));
                } catch (\Exception $e) {
                    // Log the error and continue
                    Log::channel('errorlog')->info('[FAILED SENDING EMAIL TO MEMBER]', [$member->email], $e->getMessage());
                    return response()->json(["message" => "RC3.2","wording" => "Failed when sending email to member"], 422);
                }

                $membership_data["email"] = $request->email;
                $membership = Membership::where("id",$request->member)->update($membership_data);

                $store = UserProfile::create($store_data);
            }
            else{
                $membership = Membership::where("id",$request->member)->update($membership_data);
                $store_data["modified_by"] = auth("api")->user()->email;

                // BEGIN UPLOAD PHOTO
                $photo_path = str_replace("storage/", "", $userprofiledata->photo);
                if ($request->hasFile('photo')) {
                    // Delete old image if it exists
                    if ($photo_path && Storage::disk('public')->exists($photo_path)) {
                        Storage::disk('public')->delete($photo_path);
                    }

                    // Store new image
                    $photo = $request->file("photo");
                    $filename = time()."_".$userprofiledata["member"].".".$photo->getClientOriginalExtension();
                    $path = $request->file('photo')->storeAs('event-photo', $filename, 'public');
                    $store_data["photo"] = Storage::url($path);
                }
                else {
                    if(isset($request->delete_photo)){
                        if ($photo_path && Storage::disk('public')->exists($photo_path)) {
                            Storage::disk('public')->delete($photo_path);
                            $store_data["photo"] = null;
                            unset($store_data["delete_photo"]);
                        }   
                    }
                    // else{
                    //     unset($data["photo"]);
                    // }
                }
                // END UPLOAD PHOTO

                unset($store_data["member"]);
                $store = UserProfile::where("memberid",$request->member)->update($store_data);
            }

            return response()->json(["message"=>"ok","data"=>$store],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[UPDATE PERSONAL INFORMATION]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC3"],500);;
        }
    }

    /**
     * @OA\Post(
     *      path="/api/update-membership/membership-status",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"member","joindate","expiredate","number","status"},
     *                  @OA\Property(
     *                      property="member",
     *                      type="integer",
     *                      example="1"
     *                  ),
     *                  @OA\Property(
     *                      property="joindate",
     *                      type="date",
     *                      example="2025-01-01"
     *                  ),
     *                  @OA\Property(
     *                      property="expiredate",
     *                      type="date",
     *                      example="2026-01-01"
     *                  ),
     *                  @OA\Property(
     *                      property="number",
     *                      type="string",
     *                      example="0012025010101"
     *                  ),
     *                  @OA\Property(
     *                      property="status",
     *                      type="string",
     *                      enum={"pending","active","expired"},
     *                      description="Status: pending = Pending, active = Active, expired = Expired"
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
    public function updateMembershipStatus(Request $request)
    {
        try{
            $validated = Validator::make($request->all(),[
                'member' => 'required|string',
                'joindate' => 'required|string',
                'expiredate' => 'required|string',
                'number' => 'required|string',
                'status' => 'required|string|in:pending,active,expired'
            ]);

            if ($validated->fails()) {
                Log::channel('activity')->warning('[UPDATE MEMBERSHIP STATUS]', [$request->all(),$validated->errors()]);
                return response()->json(["message" => "RC4.1"], 422);
            }

            $userprofile = UserProfile::where("memberid",$request->member);
            $userprofiledata = $userprofile->first();
            $store_data = [
                "member"=>$request->member,
                "joindate"=>$request->joindate,
                "expiredate"=>$request->expiredate,
                "number"=>$request->number,
                "status"=>$request->status
            ];
            if(!$userprofiledata){
                Log::channel('activity')->warning('[UPDATE MEMBERSHIP STATUS] [MEMBER IS NOT EXIST]', [$request->all()]);
                return response()->json(["message" => "RC4.2","wording" => "Need to complete Personal Information."], 422);
            }
            else{
                $store_data["modified_by"] = auth("api")->user()->email;

                unset($store_data["member"]);
                $store = UserProfile::where("memberid",$request->member)->update($store_data);
            }

            return response()->json(["message"=>"ok","data"=>$store],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[UPDATE PERSONAL INFORMATION]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC4"],500);;
        }
    }



    /**
     * @OA\Get(
     *      path="/api/membership/detail-member",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function memberShow()
    {
        try{
            $id = auth("api")->user()->id;
            $membership = Membership::select(DB::raw("userprofile.id as userpfofileid, membership.id as memberid, userprofile.prefix, ifnull(userprofile.organization,membership.org)as organization, ifnull(userprofile.fullname,membership.fullname)as fullname, userprofile.ofcaddress, userprofile.suffix, userprofile.ofcphone, userprofile.dob, ifnull(userprofile.ofcemail,membership.ofcemail)as ofcemail, ifnull(userprofile.phone,membership.phone)as phone, userprofile.website, ifnull(userprofile.email,membership.email)as email, userprofile.photo, userprofile.joindate, userprofile.expiredate, userprofile.number, userprofile.status, userprofile.additionaldocument, userprofile.title, userprofile.hobby"))
                ->leftJoin("userprofile","membership.id","=","userprofile.memberid")
                ->where("userprofile.userid",$id)
                ->first();


            $membership->additionaldocument = json_decode($membership->additionaldocument);

            Log::channel('activity')->warning('[LOAD DETAIL MEMBERSHIP]', ["data"=>$membership]);

            return response()->json(["message"=>"ok","data"=>$membership],200);;
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[LOAD DETAIL MEMBERSHIP]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC5"],500);;
        }
    }

    /**
     * @OA\Post(
     *      path="/api/update-membership/member-personal-information",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"member","organization","fullname","dob","phone","email"},
     *                  @OA\Property(
     *                      property="member",
     *                      type="integer",
     *                      example="1"
     *                  ),
     *                  @OA\Property(
     *                      property="organization",
     *                      type="string",
     *                      example="My Organization"
     *                  ),
     *                  @OA\Property(
     *                      property="fullname",
     *                      type="string",
     *                      example="John Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="dob",
     *                      type="date",
     *                      example="1999-01-01"
     *                  ),
     *                  @OA\Property(
     *                      property="hobby",
     *                      type="string",
     *                      example="Badminton, Padel, Running, Marathon"
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="string",
     *                      example="08123123123"
     *                  ),
     *                  @OA\Property(
     *                      property="email",
     *                      type="email",
     *                      example="myemail@mail.com"
     *                  ),
     *                  @OA\Property(
     *                      property="photo",
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
    public function memberUpdatePersonalInformation(Request $request)
    {
        try{
            $validated = Validator::make($request->all(),[
                'fullname' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email',
                'photo' => 'nullable|file|mimes:jpeg,jpg,png',
            ]);

            if ($validated->fails()) {
                Log::channel('activity')->warning('[UPDATE PERSONAL INFORMATION]', [$request->all(),$validated->errors()]);
                return response()->json(["message" => "RC6.1"], 422);
            }

            $userprofile = UserProfile::where("userprofile.userid",auth("api")->user()->id);
            $userprofiledata = $userprofile->first();
            $store_data = [
                "prefix"=>$request->prefix,
                "fullname"=>$request->fullname,
                "suffix"=>$request->suffix,
                "dob"=>$request->dob,
                "hobby"=>$request->hobby,
                "phone"=>$request->phone,
                "email"=>$request->email,
                "organization"=>$request->organization,
                "ofcaddress"=>$request->ofcaddress,
                "ofcphone"=>$request->ofcphone,
                "ofcemail"=>$request->ofcemail,
                "website"=>$request->website,
                "member"=>$request->member,
                "modified_by"=>auth("api")->user()->email
            ];
            if(!$userprofiledata){
                Log::channel('errorlog')->error('[UPDATE PERSONAL INFORMATION]', ["message"=>"userprofile not found"]);
                return response()->json(["message"=>"RC6.2"],500);
            }
            else{
                $store_data["modified_by"] = auth("api")->user()->email;

                // BEGIN UPLOAD PHOTO
                $photo_path = str_replace("storage/", "", $userprofiledata->photo);
                if ($request->hasFile('photo')) {
                    // Delete old image if it exists
                    if ($photo_path && Storage::disk('public')->exists($photo_path)) {
                        Storage::disk('public')->delete($photo_path);
                    }

                    // Store new image
                    $photo = $request->file("photo");
                    $filename = time()."_".$userprofiledata["member"].".".$photo->getClientOriginalExtension();
                    $path = $request->file('photo')->storeAs('event-photo', $filename, 'public');
                    $store_data["photo"] = Storage::url($path);
                }
                else {
                    if(isset($request->delete_photo)){
                        if ($photo_path && Storage::disk('public')->exists($photo_path)) {
                            Storage::disk('public')->delete($photo_path);
                            $store_data["photo"] = null;
                            unset($store_data["delete_photo"]);
                        }   
                    }
                    // else{
                    //     unset($data["photo"]);
                    // }
                }
                // END UPLOAD PHOTO

                unset($store_data["member"]);
                $store = UserProfile::where("userid",auth("api")->user()->id)->update($store_data);
            }

            return response()->json(["message"=>"ok","data"=>$store],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[UPDATE PERSONAL INFORMATION]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC6"],500);
        }
    }

    public function addCertificate(Request $request){
        try{
            $validated = Validator::make($request->all(),[
                'member' => 'required|string',
                'certificate' => 'required|file|mimes:pdf',
                'certificate_name' => 'required|string',
            ]);

            if ($validated->fails()) {
                Log::channel('activity')->warning('[ADD CERTIFICATE]', [$request->all(),$validated->errors()]);
                return response()->json(["message" => "RC7.1"], 422);
            }

            $userprofile = UserProfile::where("memberid",$request->member);
            $userprofile_data = $userprofile->first();

            $additional_document = json_decode($userprofile_data->additionaldocument);

            if(isset($request->certificate)){
                $certificate = $request->file("certificate");
                $filename = time()."_".$request->certificate_name.".".$certificate->getClientOriginalExtension();
                $path = $request->file('certificate')->storeAs('member-certificate', $filename, 'public');
                $storage_path = Storage::url($path);
                
                $additional_document[] = ["name"=>$request->certificate_name,"path"=>$storage_path];

                $store = [
                    "additionaldocument"=>json_encode($additional_document),
                    "modified_by"=>auth("api")->user()->id
                ];

                $store = $userprofile->update($store);

                return response()->json(["message"=>"ok","data"=>$store],200);
            }
            
            Log::channel('activity')->error('[FAILED ADD CERTIFICATE]', $request->all());
            return response()->json(["message" => "RC7.2"], 422);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[ADD CERTIFICATE]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC7"],500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/delete-membership",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"member"},
     *                  @OA\Property(
     *                      property="member",
     *                      type="integer",
     *                      example="1"
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
    public function deleteMember(Request $request){
        DB::beginTransaction();
        try{
            $validated = Validator::make($request->all(),[
                'member' => 'required|string'
            ]);

            if ($validated->fails()) {
                Log::channel('activity')->warning('[DELETE MEMBER]', [$request->all(),$validated->errors()]);
                return response()->json(["message" => "RC8.1"], 422);
            }   

            $member = Membership::where("id",$request->member);
            $deletedMember = $member->first();
            if($deletedMember){
                Log::channel('activity')->warning('[DELETE MEMBER]', [$deletedMember]);
                $member->delete();
            }

            $userprofile = UserProfile::where("memberid",$request->member);
            $deletedUserProfile = $userprofile->first();
            if($deletedUserProfile){
                Log::channel('activity')->warning('[DELETE MEMBER USERPROFILE]', [$deletedUserProfile]);
                $userprofile->delete();
            }

            if(isset($deletedUserProfile->userid)){
                $user = User::where("id",$deletedUserProfile->userid);
                $deletedUser = $user->first();
                if($deletedUser){
                    Log::channel('activity')->warning('[DELETE MEMBER USER]', [$deletedUser]);
                    $user->delete();
                }
            }

            DB::commit();
            return response()->json(["message"=>"ok","data"=>null],200);
        }
        catch(\Exception $e){
            DB::rollback();
            Log::channel('errorlog')->error('[DELETE MEMBER]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC8"],500);
        }
    }
}
