@extends('layouts.admin')

@section('title', 'Товар ' . $product->name)


@section('content')

    <div class="col-md-12">
        <h1>Товар <b>{{$product->name}}</b></h1>
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
                <td>{{$product->id}}</td>
            </tr>
            <tr>
                <td>Алиас</td>
                <td>{{$product->alias}}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{$product->name}}</td>
            </tr>
            <tr>
                <td>Производитель</td>
                <td>{{$product->manufacturer}}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{$product->price}}</td>
            </tr>
            <tr>
                <td>Старая цена</td>
                <td>{{$product->old_price}}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{$product->description}}</td>
            </tr>
            <tr>
                <td>Описание en</td>
                <td>{{$product->description_en}}</td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{$product->category->name}}</td>
            </tr>
            <tr>
                <td>Количество</td>
                <td>{{$product->count}}</td>
            </tr>
        </table>


        @foreach($product->images as $prodImage)
            <div class="btn-group col-md-12" role="group">
                <img class="d-sm-inline" style="width: 200px" src="{{Storage::url($prodImage->img)}}">
                <a target="_blank" href="{{route('product-images.edit', $prodImage)}}"><button class="btn btn-warning">Редактировать</button></a>
                <form style="display: inline-block" method="post" action="{{route('product-images.destroy', $prodImage)}}">
                    <a href="#"><button class="btn btn-danger" type="submit">Удалить</button></a>
                    @csrf
                    @method('delete')
                </form>
                <hr>
            </div>
        @endforeach
    </div>




@endsection
