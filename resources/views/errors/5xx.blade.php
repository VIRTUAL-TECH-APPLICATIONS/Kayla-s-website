@extends('errors.layout')
@section('code', $exception->getStatusCode())
@section('title', 'Something went wrong')
@section('heading', 'Something went wrong on our end.')
@section('message', "We hit an unexpected snag. It's not you. Please try again in a moment.")
@section('actions')
    <button type="button" class="btn btn-primary" onclick="location.reload()">Try again</button>
    <a href="/" class="btn btn-ghost">Back to the Korner</a>
@endsection
