@extends('layouts.app')

@section('head_form')
@endsection

@section('head_button')
    <li>
        <input type="button" class="btn btn-outline-primary" value="テスト" />
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm" id="scenarioTable">
        </div>
    </div>
@endsection
