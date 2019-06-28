<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\donations;
use App\agents;

class paymentsController extends Controller
{
    public function show()
		{ 	$ddata = new donations;
			$adata = new agents;
			$thismonth = date('m'); //eg. thismonth = 6     //for june.
		    $don_total=0; 
		    
		     
		    $maxmembers = DB::table('districts')->max('no_of_members');
		    $maxmemberdist_row = DB::table('districts')->where('no_of_members','=',$maxmembers)->first();
		    $mxdistrname = $maxmemberdist_row->districtName;  
    		$affectd = DB::table('agents')->where([['wageUnits',7],['districtName',$mxdistrname]])->update(['wageUnits'=>14]);
    		$affectd = DB::table('agents')->where([['wageUnits',4],['districtName',$mxdistrname]])->update(['wageUnits'=>8]);
    		$affectd = DB::table('agents')->where([['wageUnits',14],['districtName','<>',$mxdistrname]])->update(['wageUnits'=>7]);
    		$affectd = DB::table('agents')->where([['wageUnits',8],['districtName','<>',$mxdistrname]])->update(['wageUnits'=>4]);
  
		    
		    $don_total = DB::table('donations')->where('month','=',$thismonth)->sum('amountdonated'); 
		    $wage_units_agents = DB::table('agents')->sum('wageUnits');
		    $wage_units_total = $wage_units_agents+2;  //the 2 units are for the admin, half of 4 which is for the common agent
		    $amount_for_treasury = 0;
		    $don_for_share = 0;  
		    
		    if($don_total > 2000000 ){ $don_for_share= $don_total-2000000; $amount_for_treasury=2000000; }else{$amount_for_treasury =$don_total; }
		     if($wage_units_total!=0){$amont_per_unit = $don_for_share/$wage_units_total; }else{$amont_per_unit =0; }
		    $agt_data = $adata::all(); 
		    
		    $other = ['don_total'=>$don_total,'amont_per_unit'=>$amont_per_unit,'amount_for_treasury'=>$amount_for_treasury,'isAgentHead'=>'false'];       
		    $boolean = $adata->agentHead;
		    if($boolean=="1"){$other['isAgentHead']='true';}
			return view('payments')->with('agent_data',$agt_data)->with('other_data',$other);
		} 
}




