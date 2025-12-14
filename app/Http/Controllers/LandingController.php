<?php

namespace App\Http\Controllers;

use App\Http\Resources\LandingResource;
use App\Services\LandingService;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request) {
        $service = new LandingService();
        $landingsWithPrice = $service->indexWithPrice();
        return LandingResource::collection($landingsWithPrice);
    }
}
