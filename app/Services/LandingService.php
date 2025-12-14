<?php

namespace App\Services;

use App\Repositories\LandingRepository;
use Illuminate\Support\Collection;

class LandingService {
    function indexWithPrice(): Collection {
        $repository = new LandingRepository();
        $landings = $repository->index();
        return $landings->map(function ($landing) {
            $landing->sale_price = $this->calculatePrice($landing);
            return $landing;
        });
    }

    private function calculatePrice($landing): float {
        // if category null => normal price else category_id * 10%
        if (!$landing->category) {
            return $this->roundPrice($landing->price);
        }

        return $this->roundPrice($landing->price * (1 + $landing->category_id / 100));
    }

    private function roundPrice($price): float {
        return round($price, 2);
    }
}
