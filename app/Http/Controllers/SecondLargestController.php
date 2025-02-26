<?php

namespace App\Http\Controllers;

use App\Services\SecondLargestService;
use Illuminate\Http\Request;

class SecondLargestController extends Controller
{
    protected $secondLargestService;

    public function __construct(SecondLargestService $secondLargestService)
    {
        $this->secondLargestService = $secondLargestService;
    }

    /**
     * API endpoint to get the second largest number.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSecondLargest(Request $request)
    {
        $request->validate([
            'numbers' => 'required|array|min:2',
            'numbers.*' => 'integer',
        ]);

        $secondLargest = $this->secondLargestService->findSecondLargest($request->numbers);

        return response()->json(['second_largest' => $secondLargest]);
    }
}
