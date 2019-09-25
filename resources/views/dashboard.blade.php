@extends('layouts.dashboard')
@section('name', 'Dashboard')

@section('content')
<div class="card p-4">

  <h4>Welcome {{Auth::user()->name}}</h4>
  <hr />
  <p>Make use of links in the side navigation</p>
</div>

@endsection