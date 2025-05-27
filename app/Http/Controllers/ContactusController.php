<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use App\Models\EmailAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class ContactusController extends Controller
{
    public function index()
    {
        //
    }
    /**
     * @OA\Post(
     *      path="/api/contact-us",
     *      tags={"Landingpage"}, 
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *              required={"fullname","email","phone","subject","message"},
     *              @OA\Property(property="fullname", type="string", example="Your Name"),
     *              @OA\Property(property="email", type="string", format="email", example="youremail@gmail.com"),
     *              @OA\Property(property="phone", type="string", example="628123123123"),
     *              @OA\Property(property="subject", type="string", example="Subject Message"),
     *              @OA\Property(property="message", type="string", example="This is my message")
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
                'email' => 'required|email',
                'phone' => 'required|string',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[CONTACTUS]', $request->all());
                return response()->json([
                    "status" => "gagal",
                    "message" => $validated->errors()
                ], 422);
            }

            //NEED TO GRAB IP ADDRESS FROM USER SUBMITTED TO DEFENDING BRUTEFORCEuse App\Models\EmailAdmin;use App\Models\EmailAdmin;use App\Models\EmailAdmin;

            $email_admin = EmailAdmin::select(DB::raw("rawemail as emails"))
                ->where("activestatus",1)
                ->get();

            $view = 'mailtemplate.contactus'; // dynamic
            $subject = $request->subject;
            foreach($email_admin as $key => $value){

                $maildata = [
                    "fullname"=>$request->fullname,
                    "email"=>$request->email,
                    "phone"=>$request->phone,
                    "usermessage"=>$request->message
                ];

                if($value->emails){
                    Log::channel('activity')->info('[SENDING EMAIL TO ADMIN]', [$value->emails]);
                    Mail::to($value->emails)->send(new SendMail($view, $subject, $maildata));
                }
            }

            Log::channel('activity')->info('[CONTACTUS]', $request->all());
            $data = $request->all();
            $data["emailstatus"] = 1;
            $store = Contactus::create($data);

            DB::commit();
            return response()->json([
                "status"=>"berhasil",
                "message"=>"berhasil mengisi form contact us !"
            ],200);
        }
        catch (\Exception $e) {
            DB::rollback();
            Log::channel('errorlog')->error('[CONTACTUS]', [$request->all(),$e->getMessage()]);
            return response()->json([
                "status"=>"error",
                "message"=>"RC2"
            ],500);
        } 

    }

    public function show(contactus $contactus)
    {
        //
    }

    public function edit(contactus $contactus)
    {
        //
    }

    public function update(Request $request, contactus $contactus)
    {
        //
    }

    public function destroy(contactus $contactus)
    {
        //
    }
}
