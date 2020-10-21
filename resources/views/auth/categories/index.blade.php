@extends('layouts.admin')

@section('title', 'Категории')

@section('content')
    <div class="col-md-12">
        <h1>Категория</h1>
        <table class="table">
            <tr>
                <th>
                    #
                </th>
                <th>
                    Алиас
                </th>
                <th>
                    Название
                </th>
                <th>
                    Действие
                </th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->alias}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{route('categories.destroy', $category)}}" method="POST">
                            <a class="btn btn-success" type="button"
                               href="{{route('categories.show', $category->id)}}">Открыть
                            </a>
                            <a class="btn btn-warning" type="button"
                               href="{{route('categories.edit', $category)}}">Редактировать
                            </a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <a class="btn btn-success" type="button" href="{{route('categories.create')}}">Добавить категорию</a>
        {{$categories->links()}}
    </div>
@endsection
