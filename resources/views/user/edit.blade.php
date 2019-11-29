@extends('layouts.app')
@section('content')
    <div class="container">
    <edit-user v-bind:userid="{{$user->id}}"></edit-user>
    </div>
@endsection