<?php

namespace App\Http\Controllers\Ktx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    public function index()
	{
		return view('manager_ktx.index');
	}
}
