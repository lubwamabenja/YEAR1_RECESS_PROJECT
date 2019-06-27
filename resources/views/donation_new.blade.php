@extends('header')
@section('content') 

 <center> <h2 ><b>Register new agent</b></h2> </center> 
  <center>
  <form action="/donation_insert">
 <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
	<thead>
        <tr colspan="2">   <th> Enter new donation details </th>   </tr> 

    <tbody> 
    	<tr>  <td><label for="donor"> Name of donor</label></td> <td> <input type="text" name="donor"> </td>  </tr>
    	<tr>  <td><label for="amount"> Amount </label></td> <td> <input type="text" name="amount"> </td>  </tr>  
    	<tr>  <td>   </td> <td> <input type="submit" value="Save"> </td>  </tr>
    	<tr><td colspan="2">
    		<a href="/donations"><div id="add-more-container">
			 	<center> <div id="add-more-button"><<</div> </center>
			 	<p><center>See all donations</center></p>
			 </div></a>
    	</td></tr>
	</tbody>
</table>
</form>
</center>
 
@endsection
