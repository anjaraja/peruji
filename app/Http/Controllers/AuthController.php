<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/register",
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *              required={"name","email","password"},
     *              @OA\Property(property="name", type="string", example="Your Name"),
     *              @OA\Property(property="email", type="string", format="email", example="youremail@gmail.com"),
     *              @OA\Property(property="password", type="string", example="Your Password")
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function register(Request $request)
    {
        DB::beginTransaction();
        try{
            $dataLog = $request->all();
            unset($dataLog["password"]);

            $validated = Validator::make($request->all(),[
                'name'     => 'required|string|max:255',
                'email'    => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[USER REGISTRATION]', $dataLog);
                return response()->json(["message" => $validated->errors()], 422);
            }

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Log::channel('activity')->info('[USER REGISTRATION]', $dataLog);

            $token = auth()->login($user);

            DB::commit();
            return response()->json([
                'access_token' => $token,
                'user' => $user,
                'token_type' => 'bearer',
                'expires_in' => auth("api")->factory()->getTTL() * 60,
            ]);
        }
        catch(\Exception $e){
            DB::rollback();
            Log::channel('errorlog')->error('[USER REGISTRATION]', [$request->all(),$e->getMessage()]);
            return response()->json(["message"=>"RC1"],500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/login",
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *              required={"email","password"},
     *              @OA\Property(property="email", type="string", format="email", example="youremail@gmail.com"),
     *              @OA\Property(property="password", type="string", example="Your Password")
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function login(Request $request)
    {
        try{
            $dataLog = $request->all();
            unset($dataLog["password"]);

            $credentials = $request->only('email', 'password');

            if (!$token = auth("api")->attempt($credentials)) {
                Log::channel('errorlog')->warning('[USER LOGIN]', [$dataLog,$token]);
                return response()->json(['error' => 'Email / Password incorrect!'], 401);
            }

            return response()->json([
                'access_token' => $token,
                // 'user' => auth()->user(),
                'token_type' => 'bearer',
                'expires_in' => auth("api")->factory()->getTTL() * 60,
            ]);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[USER LOGIN]', [$dataLog,$e->getMessage()]);
            return response()->json(["message"=>"RC2"],500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/me",
     *     summary="Get current user",
     *     security={{"bearerAuth":{}}},
     *     tags={"User"},
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     )
     * )
     */
    public function me()
    {
        try{
            return response()->json(auth("api")->user());
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[TEST ACCESSING WIHTOUT OR WRONG BEARER]', [$e->getMessage()]);
            return response()->json(["message"=>"RC3"],401);   
        }
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return response()->json([
            'access_token' => auth()->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
