<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;


class MembershipController extends Controller
{
    public function index()
    {
        //
    }
    /**
     * @OA\Post(
     *      path="/api/membership",
     *      tags={"Landingpage"}, 
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *              required={"fullname","gender","email","phone","dob","org","address","website","ofcemail"},
     *              @OA\Property(property="fullname", type="string", example="Member Name"),
     *              @OA\Property(property="gender", type="string", enum={"M", "F"}, example="M", description="Gender: M = Male, F = Female"),
     *              @OA\Property(property="email", type="string", format="email", example="membername@gmail.com"),
     *              @OA\Property(property="phone", type="string", example="628123123123"),
     *              @OA\Property(property="dob", type="string", format="date", example="1990-01-30"),
     *              @OA\Property(property="org", type="string", example="Member Organization"),
     *              @OA\Property(property="address", type="string", example="This is my address"),
     *              @OA\Property(property="website", type="string", example="https://mywebsite.com"),
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
                'dob' => 'required|date',
                'org' => 'nullable|string',
                'address' => 'nullable|string',
                'website' => 'nullable|url',
                'ofcemail' => 'nullable|email',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[MEMBERSHIP REGISTER]', $request->all());
                return response()->json(["message" => $validated->errors()], 422);
            }

            Log::channel('activity')->info('[MEMBERSHIP REGISTER]', $request->all());
            $store = Membership::create($request->all());

            DB::commit();
            return response()->json(["message"=>"ok"],200);
        }
        catch (\Exception $e) {
            DB::rollback();
            Log::channel('errorlog')->error('[MEMBERSHIP REGISTER]', [$request->all(),$e->getMessage()]);
            return response()->json(["message"=>"RC2"],500);
        } 

    }

    public function show(membership $membership)
    {
        //
    }

    public function edit(membership $membership)
    {
        //
    }

    public function update(Request $request, membership $membership)
    {
        //
    }

    public function destroy(membership $membership)
    {
        //
    }
}
