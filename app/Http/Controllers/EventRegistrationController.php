<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
use App\Models\EmailAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class EventRegistrationController extends Controller
{
    // public function testmail(){
    //     $view = 'mailtemplate.testmail'; // dynamic
    //     $subject = 'Welcome Aboard!';
    //     $data = [
    //         'name' => 'Jane Doe',
    //         'role' => 'Editor',
    //     ];

    //     Mail::to('anjarpratama16@gmail.com')->send(new SendMail($view, $subject, $data));

    //     return 'Email sent!';
    // }
    public function index()
    {
        //
    }
    /**
     * @OA\Post(
     *      path="/api/event-registration",
     *      tags={"Landingpage"}, 
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *              required={"eventregistrationname","fullname","email","phone","ofcphone","company","address"},
     *              @OA\Property(property="eventregistrationname", type="string", example="Event Name"),
     *              @OA\Property(property="fullname", type="string", example="Your Name"),
     *              @OA\Property(property="email", type="string", format="email", example="youremail@gmail.com"),
     *              @OA\Property(property="phone", type="string", example="628123123123"),
     *              @OA\Property(property="ofcphone", type="string", example="0211231231"),
     *              @OA\Property(property="company", type="string", example="My Company Name"),
     *              @OA\Property(property="address", type="string", example="This is My Address")
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
                'eventregistrationname' => 'required|string',
                'fullname' => 'required|string',
                'email' => 'required|string',
                'phone' => 'required|string',
                'ofcphone' => 'required|string',
                'company' => 'required|string',
                'address' => 'required|string',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[EVENT REGISTRATION]', $request->all());
                return response()->json([
                    "status" => 'gagal',
                    "message" => $validated->errors()
                ], 422);
            }

            //NEED TO VALIDATE EVENT EXISTS OR NOT

            $check_data = EventRegistration::where(["eventregistrationname"=>$request->eventregistrationname,"email"=>$request->email])->first();
            if($check_data){
                Log::channel('activity')->warning('[EVENT REGISTRATION EMAIL EXISTS]', $request->all());
                return response()->json([
                    "message" => "You are already registered for this event."
                ], 422);
            }

            $email_admin = EmailAdmin::select(DB::raw("rawemail as emails"))
                ->where("emailfor","event")
                ->where("activestatus",1)
                ->get();

            $data["emailstatus"] = 0;
            if($email_admin){
                $view = 'mailtemplate.eventregistration'; // dynamic
                $subject = "$request->fullname Join the Event!";
                foreach($email_admin as $key => $value){

                    $data = [
                        "eventregistrationname"=>$request->eventregistrationname,
                        "fullname"=>$request->fullname,
                        "email"=>$request->email,
                        "phone"=>$request->phone,
                        "ofcphone"=>$request->ofcphone,
                        "company"=>$request->company,
                        "address"=>$request->address
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
                $data["emailstatus"] = 1;
            }

            Log::channel('activity')->info('[EVENT REGISTRATION]', $request->all());

            $data = $request->all();
            $store = EventRegistration::create($data);

            DB::commit();
            return response()->json([
                "status" => "berhasil",
                "message"=>"ok"
            ],200);
        }
        catch (\Exception $e) {
            DB::rollback();
            Log::channel('errorlog')->error('[EVENT REGISTRATION]', [$request->all(),$e->getMessage()]);
            return response()->json([
                "status" => "error",
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
