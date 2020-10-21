@extends('layouts.admin')

@section('title', 'Связующая таблица')

@section('content')
    <div class="col-md-12">
        <h1>Связующая таблица</h1>
        <table class="table">
            <tr>
                <th>
                    #
                </th>
                <th>
                    Изображение
                </th>
                <th>
                    Товар
                </th>
                <th>
                    Действие
                </th>
            </tr>
            @foreach($productImages as $productImage)
                <tr>
                    <td>{{$productImage->id}}</td>
                    <td>{{$productImage->img}}</td>
                    <td>{{$productImage->product->name}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{route('product-images.destroy', $productImage)}}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{route('product-images.show', $productImage)}}">Открыть
                                </a>
                                <a class="btn btn-warning" type="button"
                                   href="{{route('product-images.edit', $productImage)}}">Редактировать
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
        <a class="btn btn-success" type="button" href="{{route('product-images.create')}}">Добавить изображение товару</a>
        {{$productImages->links()}}
    </div>
@endsection
