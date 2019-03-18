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
        <div class="col-sm">
            <table class="table">
                <thead class="thead-dark">
                <th>#</th>
                <th scope="col">タイトル</th>
                <th scope="col">操作</th>
                </thead>
                <tbody>
                @foreach ($scenarios as $scenario)
                    <tr>
                        <td>{{ $scenario->updated_at }}</td>
                        <td><a href="/scenarios/{{ $scenario->id }}/edit/">{{ $scenario->title }}</a></td>
                        <td>
                            <div class="row">
                                <div class="col-sm">
                                    <button class="btn btn-sm btn-outline-primary btn-block">読む</button>
                                </div>
                                <div class="col-sm">
                                    <button class="btn btn-sm btn-outline-success btn-block">編集</button>
                                </div>
                                <div class="col-sm">
                                    <button class="btn btn-sm btn-outline-danger btn-block">削除</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
