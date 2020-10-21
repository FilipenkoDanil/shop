@extends('layouts.admin')

@isset($product)
    @section('title', 'Редактирование товара ' . $product->name)
@else
    @section('title', 'Добавление товара')
@endisset


@section('content')


    <div class="col-md-12">
        @isset($product)
            <h1>Редактирование товара <b>{{$product->name}}</b></h1>
        @else
            <h1>Добавление товара</h1>
        @endisset
        <form method="POST" @isset($product)
        action="{{route('products.update', $product)}}"
              @else
              action="{{route('products.store')}}"
            @endisset
        >

            <div class="input-group row">
                @error('alias')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="alias" class="col-sm-2 col-form-label">Алиас: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alias" id="alias"
                           value="@isset($product){{$product->alias}}@endisset">
                </div>
            </div>
            <br>
            <div class="input-group row">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="name" class="col-sm-2 col-form-label">Название: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="name"
                           value="@isset($product){{$product->name}}@endisset">
                </div>
            </div>
            <br>
            <div class="input-group row">
                @error('manufacturer')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="name" class="col-sm-2 col-form-label">Производитель: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="manufacturer" id="manufacturer"
                           value="@isset($product){{$product->manufacturer}}@endisset">
                </div>
            </div>
            <br>
            <div class="input-group row">
                @error('price')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="name" class="col-sm-2 col-form-label">Цена: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" id="price"
                           value="@isset($product){{$product->price}}@endisset">
                </div>
            </div>
            <br>
            <div class="input-group row">
                @error('old_price')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="name" class="col-sm-2 col-form-label">Старая цена: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="old_price" id="old_price"
                           value="@isset($product){{$product->old_price}}@endisset">
                </div>
            </div>
            <br>
            <div class="input-group row">
                @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="name" class="col-sm-2 col-form-label">Описание: </label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="description" id="description">@isset($product){{$product->description}}@endisset</textarea>
                </div>
            </div>
            <br>
            <div class="input-group row">
                @error('description_en')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="description_en" class="col-sm-2 col-form-label">Описание en: </label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="description_en" id="description_en">@isset($product){{$product->description_en}}@endisset</textarea>
                </div>
            </div>
            <br>
            <div class="input-group row">
                @error('category_id')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="name" class="col-sm-2 col-form-label">Категория: </label>
                <div class="col-sm-6">
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @isset($product)
                                    @if($product->category_id == $category->id)
                                    selected
                                @endif
                                @endisset
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="input-group row">
                @error('count')
                     <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="count" class="col-sm-2 col-form-label">Количество: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="count" id="count"
                           value="@isset($product){{$product->count}}@endisset">
                </div>
            </div>
            <br>
            @isset($product)
                @method('PUT')
            @endisset
            @csrf
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>

@endsection
