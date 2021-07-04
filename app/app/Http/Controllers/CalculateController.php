<?php

namespace App\Http\Controllers;

use App\Http\Contracts\ICalculateService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CalculateController extends Controller
{
    /**
     * CalculateController constructor.
     * @param ICalculateService $calculateService
     */
    public function __construct(
        protected ICalculateService $calculateService)
    {
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sumDistance(Request $request) : JsonResponse
    {
        $validator = $this->validateSumDistanceRequest($request);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        try{
            return response()->json([
                    'data' => number_format(
                        $this->calculateService->sumDistance(
                            $request->get('first_distance'),
                            $request->get('first_type'),
                            $request->get('second_distance'),
                            $request->get('second_type'),
                            $request->get('return_type')
                        ), 2
                    )
                ]);
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }


    }

    protected function validateSumDistanceRequest(Request $request)
    {
        return Validator::make($request->all(), [
            'first_distance' => 'required|numeric',
            'first_type' => 'required|in:meters,yards',
            'second_distance' => 'required|numeric',
            'second_type' => 'required|in:meters,yards',
            'return_type' => 'required|in:meters,yards',
        ]);
    }

}
