<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function main(Request $request)
    {
    	return view('admin.welcome');
    }
}
