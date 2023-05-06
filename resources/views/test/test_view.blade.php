@extends('layout')
@section('title', 'ブログ一覧')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <h2>ブログ記事一覧</h2>
            @if (session('err_msg'))
            <p class="text-danger">
                {{ session('err_msg') }}
            </p>
            @endif
            <table class="table table-striped">
                <tr>
                    <th>記事番号</th>
                    <th>タイトル</th>
                    <th>日付</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="/testuser/{{$user->id}}"> {{$user->title}} </a></td>
                    <td>{{$user->updated_at}}</td>
                    <td><button type="button" class="btn-primary" onclick="location.href='/testuser/edit/{{$user->id}}'">編集</button></td>
                    <form method="POST" action="{{ route('delete', $user->id) }}" onSubmit="return checkDelete()">
                    @csrf
                    <td><button type="submit" class="btn-primary" onclick=>削除</button></td>
                    </form>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        function checkDelete(){
        if(window.confirm('削除してよろしいですか？')){
            return true;
        } else {
            return false;
        }
        }
        </script>
@endsection