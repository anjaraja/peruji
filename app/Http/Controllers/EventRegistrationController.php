<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;


class EventRegistrationController extends Controller
{
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

            Log::channel('activity')->info('[EVENT REGISTRATION]', $request->all());
            $data = $request->all();
            $data["emailstatus"] = 1;
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
