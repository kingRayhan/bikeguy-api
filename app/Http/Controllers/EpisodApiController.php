<?php

namespace App\Http\Controllers;

use App\Http\Resources\Episods;
use App\Radio;
use Illuminate\Http\Request;

class EpisodApiController extends Controller
{
    public function index()
    {
        return Episods::collection(Radio::latest()->get());
    }
    public function show($episod_no)
    {
    	$episod = Radio::where('episod_no' , $episod_no)->get();
    	return new Episods($episod);
    }

}
