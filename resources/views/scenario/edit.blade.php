@extends('layouts.app')

@section('head_form')
    <form class="form-inline mr-auto col-sm-6" style="margin-top: 5px; margin-bottom: 5px;">
        <div id="titleInput" data-title="{{ $scenario->title ?? null }}"></div>
    </form>
@endsection

@section('head_button')
    <li id="saveButton" data-scenario-id="{{ $scenario->id ?? null }}"></li>
@endsection

@section('content')
    <div id="gekiEditor" data-body="{{ $scenario->body }}">
    </div>
@endsection
