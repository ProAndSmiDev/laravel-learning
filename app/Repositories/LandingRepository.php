<?php

namespace App\Repositories;

use App\Models\Landing;
use Illuminate\Support\Collection;

class LandingRepository {
    function index(): Collection {
        return Landing::query()->with('category')->get();
    }
}
