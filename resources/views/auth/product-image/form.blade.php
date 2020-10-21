@extends('layouts.admin')

@isset($productImage)
    @section('title', 'Редактирование записи')
@else
    @section('title', 'Добавление связующей записи')
@endisset


@section('content')


    <div class="col-md-12">
        @isset($productImage)
            <h1>Редактирование связующей записи</h1>
        @else
            <h1>Добавление связующей записи</h1>
        @endisset
        <form method="POST" @isset($productImage)
        action="{{route('product-images.update', $productImage)}}"
              @else
              action="{{route('product-images.store')}}"
            @endisset
              enctype = "multipart/form-data"
        >
            @isset($productImage)
            <div class="input-group row">
                <label for="img" class="col-sm-2 col-form-label">Текущее изображение: </label>
                <div class="col-sm-10">
                    <img style="width: 200px" src="{{Storage::url($productImage->img)}}">
                </div>

            </div>
            <br>
            @endisset
            <div class="input-group row">
                <label for="img" class="col-sm-2 col-form-label">Картинка (при загрузке заменяет старую): </label>
                <div class="col-sm-10">
                    <label class="btn btn-default btn-file"><input type="file" name="img" id="img"></label>
                </div>
            </div>
            <br>
            <div class="input-group row">
                <label for="product_id" class="col-sm-2 col-form-label">Товар: </label>
                <div class="col-sm-6">
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach($products as $products)
                            <option value="{{$products->id}}">{{$products->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            @isset($productImage)
                @method('PUT')
            @endisset
            @csrf
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>

@endsection
