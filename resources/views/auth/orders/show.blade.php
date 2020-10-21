@extends('layouts.admin')

@section('title', 'Заказ: ' . $order->id)

@section('content')
    <div class="justify-content-center">
        <div class="panel">
            <h1>Заказ #{{$order->id}}</h1>
            <p>Заказчик: <b>{{$order->name}}</b></p>
            <p>Номер телефона: <b>{{$order->phone}}</b></p>
            <p>Город: <b>{{$order->city}}</b></p>
            <p>Адрес: <b>{{$order->address}}</b></p>
            <table class="table table-striped">
                <tr>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{route('product', [$product->category->alias, $product->alias])}}"><img height="56px" src="@if(count($product->images) > 0) {{Storage::url($product->images[0]['img'])}} @else /img/product/small/no_image.png @endif ">{{$product->name}}</a>
                        </td>
                        <td><span class="bade">{{$product->pivot->count}}</span></td>
                        <td>{{$product->pivot->price}} {{$order->currency->symbol}}</td>
                        <td>{{$product->getPriceForCount()}} {{$order->currency->symbol}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость: </td>
                    <td>{{$order->sum}} {{$order->currency->symbol}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
