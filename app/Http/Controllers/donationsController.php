<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\donations;

class donationsController extends Controller
{
    public function show()
			{ 	$data = new donations;
			    $donation_data = $data::all();
				return view('donations')->with('donation_data',$donation_data);
			} 
			
	public function don_insert(Request $request)
		{ 	$dontable = new donations;      
			      
				$dontable->amountdonated = $request->input('amount');
				$dontable->month = date('m'); 		
				$dontable->donatedBy = $request->input('donor');  
		     $dontable->save(); 
		      
		  echo '<center><p>Donation by :  '.$dontable->donatedBy.' saved</p></center>'; 
		  echo '<hr/>';
		  echo "<center><p>record inserted successfully</p></center>";
		  echo '<center><p><a href="/donation_form"><b>Click here</b> </a> to go back.</p></center>';	
		}  
		
}







