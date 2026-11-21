@extends('errors.layout')
@section('code', '419')
@section('title', 'Page expired')
@section('heading', 'This page has expired.')
@section('message', 'Your session timed out to keep things secure. Refresh the page and try again.')
@section('actions')
    <button type="button" class="btn btn-primary" onclick="location.reload()">Refresh the page</button>
    <a href="/" class="btn btn-ghost">Back to the Korner</a>
@endsection
