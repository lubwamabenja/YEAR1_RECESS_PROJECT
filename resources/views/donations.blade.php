@extends('header')
@section('content')  
 <center> <h2 ><b>Donations </b></h2> </center>  
 
  <center>
 <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
	<thead>
        <tr> 			 
            <th> Count </th>
            <th> Donor </th> 
            <th> Amount </th>
            <th> Month </th> 
            <th>  </th>
        </tr>
    </thead>
    <tbody>
 	<!--============================================-->   			 
		@if(count($donation_data) > 0)
		  @foreach($donation_data as $d_data)
			<tr class="odd gradeX">  
				<td class="left">{{$d_data->donationID}}</td>
				<td class="left">{{$d_data->donatedBy}}</td>
				<td class="left">{{$d_data->amountdonated}}</td> 
				<td class="left">{{$d_data->month}}</td> 
				<td></td> 
			</tr>
		  @endforeach 
	   @endif
	   <tr> 
	   <td colspan="5">
	      <a href="/donation_form"><div id="add-more-container">
			 	<center>
			 	<div id="add-more-button">+</div>
			 	</center>
			 	<p><center>Receive a donation</center></p>
			 </div></a> 
		   </td>
		  </tr>
	   </tbody></table>
	<!--============================================-->
 <div style="min-height:190px"></div>
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









