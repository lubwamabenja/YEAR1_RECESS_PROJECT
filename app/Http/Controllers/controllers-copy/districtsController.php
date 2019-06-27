<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Http\Controllers\Controller;
use DB;
use App\districts;

class districtsController extends Controller
{ 
			public function show()
			{ 	$data = new districts;
			    $district_data = $data::all();
				return view('districts')->with('district_data',$district_data);
			} 
			
			  
}
