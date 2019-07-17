@extends('header')
@section('content') 

 <center> <h2 ><b>Register new agent</b></h2> </center> 
  <center>
  <form action="/register_agent" >
 <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
	<thead>
        <tr colspan="2">   <th> Enter new agent's details </th>   </tr> 

    <tbody> 
    	<tr>  <td><label for="agentname"> Name </label></td> <td> <input type="text" name="agentname"> </td>  </tr>
    	<tr>  <td><label for="agentUsername"> Username </label></td> <td> <input type="text" name="agentUsername"> </td>  </tr> 
    	<tr>  <td><label for="signature"> signatre </label></td> <td> <input type="text" name="signature"> </td>  </tr>
    	<tr>  <td>   </td> <td> <input type="submit" value="Register"> </td>  </tr>
    	<tr><td colspan="2">
    	<a href="/agents"><div id="add-more-container">
		 	<center>
		 	<div id="add-more-button"><<</div>
		 	</center>
		 	<p><center>See all agents</center></p>
		 </div></a>
 		</td></tr>
	</tbody>
</table>
</form>
</center>
 <div style="min-height:175px"></div>
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




