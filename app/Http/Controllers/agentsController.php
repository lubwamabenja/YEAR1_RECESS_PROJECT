<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\agents;
use App\districts;

class agentsController extends Controller
{
    public function show()
			{ 	$data = new agents;
			    $agent_data = $data::all();
				return view('agents')->with('agent_data',$agent_data);
			} 
	public function agent_insert(Request $request)
			{ 	$agtable = new agents; 
				$distable = new districts;   
				
				//determine district with minimum number of agents
				    $minagents = DB::table('districts')->min('no_of_agents');  
				    $newagentdistrict = DB::table('districts')->where('no_of_agents','=',$minagents)->first();
				    $distr_name = $newagentdistrict->districtName;
				    $agents_at_dist = $newagentdistrict->no_of_agents;
				    
				    $uname = $request->input('agentUsername'); 
					$agtable->agentName = $request->input('agentname'); 
					$agtable->agentUsername = $request->input('agentUsername');		
					$agtable->signatre = $request->input('signature');
					$agtable->districtName=$distr_name ;	
				    
				    if($agents_at_dist <= 0){ $agtable->agentHead=true ; $agtable->wageUnits=7;  
               		}else{$agtable->agentHead=false; $agtable->wageUnits=4; } 
				    
			     $agtable->save(); 
			     	if($agtable->agentHead==true){$rowaffected = DB::table('districts')->where('districtName',$distr_name)->update(['headAgent'=>$uname]);}       
               		$rowaffected = DB::table('districts')->where('districtName',$distr_name)->update(['no_of_agents'=>($agents_at_dist+1)]);  
               		
			  echo '<center><p>agent :  '.$agtable->agentName.' saved</p></center>'; 
			  echo '<hr/>';
			  echo "<center><p>record inserted successfully</p></center>";
			  echo '<center><p><a href="/agent_form"><b>Click here</b> </a> to go back.</p></center>';	
			}  
			
			
}
