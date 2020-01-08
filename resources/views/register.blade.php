@extends('layout.master')
@section('title','Register')

@section('content')
<div class="card card-body bg-light container mt-5 col-md-offset-2 col-md-8">
<div class="container">
<div class="row">
<div class="col-md-12 col-mt-12 col-md-offset-2 col-md-12">
<div class="panel panel-default">
<legend>Register</legend>
<div class="panel-body">
<br><br>
<button type="button" class="btn btn-outline-success btn-block"><a href="/TravelAndTour/public/UserRegister" style="color: #000000;">Register as a User</a></button>
<br>
<button type="button" class="btn btn-outline-success btn-block"><a href="/TravelAndTour/public/OrgRegister" style="color: #000000;">Register as an Organization</a></button>

</div>
</div>
</div>
</div>
</div>
</div>
@endsection