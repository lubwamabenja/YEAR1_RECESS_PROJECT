<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\members;

class membersController extends Controller
{
    public function show()
		{ 	$data = new members;
		    $member_data = $data::all();
		    
		    $recommenders = DB::table('members')->select('memberRecommender')->get(); 
		    $rowzaffected=0; 
		    foreach($recommenders as $recommender){
		    	$rcm = $recommender->memberRecommender;
		    	$recommendedMembers = $recommendedMembers;
		    	$rowzaffected = DB::table('members')->where('memberName','like',($rcm."%"))->increment('recommendedMembers',1);
		    } 
		    $qualified = DB::table('members')->select('memberName','recommendedMembers')->where('recommendedMembers','>=',40)->get();	     
		    
			return view('members')->with('member_data',$member_data)->with('recommenders',$qualified);
		} 
}
