@extends('layouts.admin')

@isset($category)
    @section('title', 'Редактирование категории ' . $category->name)
@else
    @section('title', 'Добавление категории')
@endisset


@section('content')


    <div class="col-md-12">
        @isset($category)
            <h1>Редактирование категории <b>{{$category->name}}</b></h1>
        @else
            <h1>Добавление категории</h1>
        @endisset
        <form method="POST" @isset($category)
                    action="{{route('categories.update', $category)}}"
                @else
                    action="{{route('categories.store')}}"
                @endisset
            >
            <div class="input-group row">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="name" class="col-sm-2 col-form-label">Название: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="name" value="@isset($category){{$category->name}}@endisset">
                </div>
            </div>
            <br>
            <div class="input-group row">
                @error('name_en')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="name_en" class="col-sm-2 col-form-label">Название en: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name_en" id="name_en" value="@isset($category){{$category->name_en}}@endisset">
                </div>
            </div>
            <br>
            <div class="input-group row ">
                @error('alias')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="alias" class="col-sm-2 col-form-label">Алиас: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alias" id="alias" value="@isset($category){{$category->alias}}@endisset">
                </div>
            </div>
            <br>
            @isset($category)
                @method('PUT')
            @endisset
            @csrf
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>

@endsection
