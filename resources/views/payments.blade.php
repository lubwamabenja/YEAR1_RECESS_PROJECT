@extends('header')
@section('content')

 <center> <h2 ><b> Agents' payments </b></h2> </center>
 
 <div>
 	<center> 
	 <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
		<thead>
		    <tr>  <th colspan="2">Total donations : </th> <td> {{$other_data['don_total']}} </td>  </tr> 
		    <tr>  <td></td> <td> </td> <td></td> <td></td> <td></td>  </tr>
		    <tr>  <th colspan="2">Treasury amount : </th> <td> {{$other_data['amount_for_treasury']}} </td>  </tr> 
			<tr>  <td></td> <td> </td> <td></td> <td></td> <td></td>  </tr> 
			<tr>  <th></th><th colspan="2">Admin's wage : </th> <td> {{ceil($other_data['amont_per_unit']*2)}} </td> <td></td>   </tr> 
		    <tr > <th> Agent name</th> <th> Username</th> <th> District</th> <th> Is Head?</th> <th> Amount</th>   </tr> 
		</thead>
		<tbody>  
			<!--============================================--> 			
		@if(count($agent_data) > 0)
		  @foreach($agent_data as $d_data)
			<tr class="odd gradeX">  
				<td class="left">{{$d_data->agentName}}</td>  
				<td class="left">{{$d_data->agentUsername}}</td> 
				<td class="left">{{$d_data->districtName}}</td> 
				<td class="left">{{$d_data->agentHead}}</td> 
				<td class="left">{{ceil($other_data['amont_per_unit']*$d_data->wageUnits)}}</td>  <!-- amont_per_unit * wageUnits-->
			</tr>
		  @endforeach
	   @endif
	<!--============================================-->
		</tbody>
		
	</table> 
</center>
 </div>

@endsection

@section('footer')
<footer class="footer">
			<div class="container">
				<div class="content has-text-centered">
					<p>
						Copyright &copy; 2019 <a href="home">The UFT management</a>. All rights reserved. With <i class="fa fa-heart" aria-hidden="true"></i> and <a href="#">Determination</a>.
					</p>
					<p>
						 Headed by <a href="#">Groupx</a>, <a href="#">Year 1</a>, <a href="#">Makerere</a>, and all of our supporters .
					</p>
					<p> 
						<a class="nav-link" href="http://localhost:8000" hreflang="en-us"></a> 
					</p>
				</div>
			</div>
</footer> 
@endsection



