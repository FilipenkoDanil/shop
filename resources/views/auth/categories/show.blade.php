@extends('layouts.admin')

@section('title', 'Категория ' . $category->name)


@section('content')

    <div class="col-md-12">
        <h1>Категория <b>{{$category->name}}</b></h1>
        <table class="table">
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{$category->id}}</td>
            </tr>
            <tr>
                <td>Алиас</td>
                <td>{{$category->alias}}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{$category->name}}</td>
            </tr>
            <tr>
                <td>Название en</td>
                <td>{{$category->name_en}}</td>
            </tr>
            <tr>
                <td>Количество товаров</td>
                <td>{{$category->products->count()}}</td>
            </tr>
        </table>
    </div>




@endsection
