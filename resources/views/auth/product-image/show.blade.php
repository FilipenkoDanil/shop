@extends('layouts.admin')

@section('title', 'Запись')


@section('content')

    <div class="col-md-12">
        <h1>Связующая запись <b>{{$productImage->name}}</b></h1>
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
                <td>{{$productImage->id}}</td>
            </tr>
            <tr>
                <td>Путь</td>
                <td>{{$productImage->img}}</td>
            </tr>
            <tr>
                <td>Изображение</td>
                <td><img style="width: 200px" src="{{Storage::url($productImage->img)}}"></td>
            </tr>
            <tr>
                <td>Товар</td>
                <td>{{$productImage->product->name}}</td>
            </tr>
        </table>
    </div>




@endsection
