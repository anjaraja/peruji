<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;


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
                return response()->json(["message" => $validated->errors()], 422);
            }

            Log::channel('activity')->info('[CONTACTUS]', $request->all());
            $data = $request->all();
            $data["emailstatus"] = 1;
            $store = Contactus::create($data);

            DB::commit();
            return response()->json(["message"=>"ok"],200);
        }
        catch (\Exception $e) {
            DB::rollback();
            Log::channel('errorlog')->error('[CONTACTUS]', [$request->all(),$e->getMessage()]);
            return response()->json(["message"=>"RC2"],500);
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
