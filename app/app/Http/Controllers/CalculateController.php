<?php

namespace App\Http\Controllers;

use App\Http\Contracts\ICalculateService;
use App\Http\Controllers\Controller;
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


    public function sumDistance(Request $request)
    {
        $validator = $this->validatesumDistanceRequest($request);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 403);
        }

        return number_format(
            $this->calculateService->sumDistance(
                $request->get('firstDistance'),
                $request->get('firstType'),
                $request->get('secondDistance'),
                $request->get('secondType'),
                $request->get('returnType')
            ), 2
        );

    }

    protected function validatesumDistanceRequest(Request $request)
    {
        return Validator::make($request->all(), [
            'firstDistance' => 'required|numeric',
            'firstType' => 'required|in:meters,yards',
            'secondDistance' => 'required|numeric',
            'secondType' => 'required|in:meters,yards',
            'returnType' => 'required|in:meters,yards',
        ]);
    }

}
