@extends('layouts.app')

@section('head_form')
@endsection

@section('head_button')
    <li>
        @if ($user)
            <a href="/login" class="btn btn-outline-primary">{{ $user->name }}さん</a>
        @else
            <a href="/login" class="btn btn-outline-primary">ログイン</a>
        @endif
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm" id="scenarioTable">
        </div>
    </div>
@endsection
