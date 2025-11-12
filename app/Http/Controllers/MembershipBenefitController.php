<?php

namespace App\Http\Controllers;

use App\Helpers\Pagination;
use App\Models\MembershipBenefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Storage;

class MembershipBenefitController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/membership-benefits/{page}",
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
            $page = $page?$page:1;

            $membershipBenefit = MembershipBenefit::orderBy("created_at","desc")->paginate(10, ["*"], "page", $page)->toArray();

            $membershipBenefit = Pagination::ClearObject($membershipBenefit);

            Log::channel('activity')->warning('[LOAD MEMBERSHIP BENEFIT]', ["page"=>$page]);

            return response()->json(["message"=>"ok","data"=>$membershipBenefit],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[LOAD MEMBERSHIP BENEFIT]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC1"],500);;
        }
    }

    public function store(Request $request)
    {
    }

    /**
     * @OA\Get(
     *      path="/api/membership-benefits-detail/{name}",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\Parameter(
     *          name="name",
     *          in="path",
     *          description="Name Membership Benefit",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function show($name)
    {
        try{
            $membership_benefit = MembershipBenefit::where(DB::raw("LOWER(name)"),strtolower($name))->first();
            return response()->json(["message"=>"ok","data"=>$membership_benefit],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[LOAD MEMBERSHIP BENEFIT DETAIL]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC3"],500);;
        }
    }

    /**
     * @OA\Post(
     *      path="/api/update-membership-benefits/",
     *      security={{"bearerAuth":{}}},
     *      tags={"Dashboard"}, 
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"membership_benefits","description"},
     *                  @OA\Property(
     *                      property="membership_benefits",
     *                      type="string",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                      example="Membership Benefits Description"
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
                'membership_benefits' => 'required|int',
                'description' => 'required|string'
            ]);
            if ($validated->fails()) {
                Log::channel('activity')->warning('[UPDATE MEMBERSHIP BENEFIT]', [$validated->errors(),$request->all()]);
                return response()->json(["message" => "RC2.1"], 422);
            }

            $membership_benefit = MembershipBenefit::where("id",$request->membership_benefits);
            $membership_benefit_data = $membership_benefit->first();
            if(!$membership_benefit_data){
                Log::channel('activity')->warning('[UPDATE MEMBERSHIP BENEFIT]', ["Data not found with id",$request->membership_benefits]);
                return response()->json(["message" => "RC2.2"], 422);
            }

            $data = $request->all();
            $data["id"] = $request->membership_benefits;
            $data["modified_by"] = auth("api")->user()->email;
            Log::channel('activity')->info('[UPDATE MEMBERSHIP BENEFIT][DATA]', $data);


            unset($data["membership_benefits"]);
            $store = $membership_benefit->update($data);

            return response()->json(["message"=>"ok"],200);
        }
        catch(\Exception $e){
            Log::channel('errorlog')->error('[UPDATE MEMBERSHIP BENEFIT]', ["message"=>$e->getMessage()]);
            return response()->json(["message"=>"RC2.3"],500);;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }
}
