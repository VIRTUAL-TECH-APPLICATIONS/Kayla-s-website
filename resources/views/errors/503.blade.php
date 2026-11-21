@extends('errors.layout')
@section('code', '503')
@section('title', 'Back soon')
@section('heading', "We're tidying up the Korner.")
@section('message', "The site is down for some quick maintenance. We'll be back shortly with more good finds.")
@section('actions')
    <button type="button" class="btn btn-primary" onclick="location.reload()">Check again</button>
@endsection
