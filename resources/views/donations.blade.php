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
		  <tr> <td colspan="5">
				  <a href="/donation_form"><div id="add-more-container">
				 	<center>
				 	<div id="add-more-button">+</div>
				 	</center>
				 	<p><center>Receive a donation</center></p>
				 </div></a> 
			   </td>
		   </tr>
			 
	   @endif
	   </tbody></tabl>
	<!--============================================-->
 
@endsection








