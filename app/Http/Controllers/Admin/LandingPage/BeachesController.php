<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeachesController extends Controller
{
    public function index(){
        return view('landing.beaches');
    }
}
