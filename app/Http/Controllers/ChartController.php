<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use Illuminate\Http\Request;
use App\members;
use App\districts;
use App\donations;
use Charts;
use Illuminate\Support\Facades\DB; 

class ChartController extends Controller
{
    public function index()
    {
         $members = new members;
         $districts = new districts;
         $donations = new donations;
         
         
         //----------------------------------------------     
			$chart = Charts::database($members::all(),'bar', 'highcharts')
				->elementLabel("Total")
				->dimensions(1000, 300)
				->responsive(true)
				->groupByMonth(); 
				
			$chart2b = Charts::database($members::all(),'line', 'highcharts')
				->elementLabel("Variation")
				->dimensions(1000, 300)
				->responsive(true)
				->groupByMonth(); 
		//----------------------------------------------------------
			
         $chart2 = Charts::database($donations::all()->values('amountdonated'),'bar', 'highcharts')
				->elementLabel("Variation")
				->dimensions(1000, 300)
				->responsive(true)  
				->groupByMonth() ; 
				
		//---------------------------------------------  
		
		$resultset = DB::table('donations')->pluck('amountdonated')->toArray();	
		$months = DB::table('donations')->pluck('month')->toArray();
		$strmonths=array();
		$i=0;
		foreach($months as $month){
			if($month==1){$strmonths[$i]="Jan"; 
			}else if($month==2){ $strmonths[$i]="Feb"; 
			}else if($month==3){ $strmonths[$i]="Mar"; 
			}else if($month==4){ $strmonths[$i]="Apr"; 
			}else if($month==5){ $strmonths[$i]="May"; 
			}else if($month==6){ $strmonths[$i]="Jun"; 
			}else if($month==7){ $strmonths[$i]="Jul"; 
			}else{ $strmonths[$i]="Aug-Dec"; 
			}
		$i++;
		}
		
		$chart3 = Charts::multi('line', 'highcharts')
				->colors(['#ff0000', '#00ff00', '#0000ff'])
				->labels($strmonths)
				->dataset('Donations', $resultset); 
        return view('manual')->with('chart',$chart)->with('chart2',$chart2)->with('chart2b',$chart2b)->with('chart3',$chart3);
    }
}







