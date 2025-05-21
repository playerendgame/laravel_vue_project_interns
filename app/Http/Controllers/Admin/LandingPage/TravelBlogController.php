<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelBlogController extends Controller
{
    public function index(){
        return view('LandingPageBlogSection');
    }
}
