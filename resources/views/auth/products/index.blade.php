@extends('layouts.admin')

@section('title', 'Товары')

@section('content')
    <div class="col-md-12">
        <h1>Товар</h1>
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
                    Категория
                </th>
                <th>
                    Цена
                </th>
                <th>
                    Количество
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->alias}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{\App\Services\CurrencyConversion::getCurrencySymbol()}}{{$product->price}}</td>
                    <td>{{$product->count}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{route('products.destroy', $product)}}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{route('products.show', $product)}}">Открыть
                                </a>
                                <a class="btn btn-warning" type="button"
                                   href="{{route('products.edit', $product)}}">Редактировать
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
        <a class="btn btn-success" type="button" href="{{route('products.create')}}">Добавить товар</a>
        {{$products->links()}}
    </div>
@endsection
