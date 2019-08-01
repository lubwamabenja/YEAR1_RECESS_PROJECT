@extends('header')
@section('content') 
  
 <center> <h2 id="headline"><b>Statistics </b></h2> </center>

 <div class="container">
    <h2 style="text-align: center;">Monthly Enrollment</h2>
    <br>
    {!! $chart->html() !!}
</div>

<div class="container">
    <h2 style="text-align: center;">Percentage change</h2>
    <br>
    {!! $chart2b->html() !!}
</div>

<div class="container">
    <h2 style="text-align: center;">Received Donations</h2>
    <br>
    {!! $chart3->html() !!}
</div> 


{!! Charts::scripts() !!} 
{!! $chart3->script() !!}
{!! $chart2b->script() !!}
{!! $chart->script() !!}



@endsection
