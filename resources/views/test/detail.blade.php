@extends('layout')
@section('title', 'ブログ詳細')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{$user->title}}</h2>
            <span>作成日{{$user->created_at}}</span>
            <span>更新日{{$user->updated_at}}</span>
            <p>{{$user->content}}</p>
            
        </div>
    </div>
@endsection