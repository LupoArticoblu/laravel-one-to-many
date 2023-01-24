<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){

        $Portfolio_all = Portfolio::count();

        return view('admin.home', compact('Portfolio_all'));
    }

}
