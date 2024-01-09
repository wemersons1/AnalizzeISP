<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function states() {
        $states = new State();
        return $states->get();
    }

    public function cities(Request $request) {
        $cities = new City();
  
        if($request->state_id) {      
            $cities = $cities->where('estado_id', $request->state_id);
        }

        return $cities->get();
    }
}
