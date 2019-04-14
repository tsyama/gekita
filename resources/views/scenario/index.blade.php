@extends('layouts.app')

@section('head_form')
@endsection

@section('head_button')
    @if ($user)
            <a href="/login" id="loginUser" class="nav-item nav-link" data-user-id="{{ $user->id }}" data-token="{{ $user->access_token }}">
                {{ $user->name }}さん
            </a>
    @else
        <li>
            <a href="/login" class="btn btn-outline-primary">ログイン</a>
        </li>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-sm" id="scenarioTable">
        </div>
    </div>
@endsection
