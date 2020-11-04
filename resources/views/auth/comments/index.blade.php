@extends('layouts.admin')

@section('title', 'Комментарии на рассмотрении')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Комментарии на рассмотрении</h1>
            <table class="table">
                <tbody>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Пользоветаль
                    </th>
                    <th>
                        Комментарий
                    </th>
                    <th>
                        Товар
                    </th>
                    <th>
                        Действия
                    </th>
                </tr>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->product->name}}</td>
                        <td>
                            <div class="form-inline pull-left">
                                <form action="{{route('admin-publish-comment', $comment)}}" method="POST">
                                    <button class="btn btn-success">Опубликовать</button>
                                    @csrf
                                </form>
                                <form action="{{route('admin-delete-comment', $comment)}}" method="post">
                                    <button class="btn btn-danger">Удалить</button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$comments->links()}}
        </div>
    </div>
@endsection
