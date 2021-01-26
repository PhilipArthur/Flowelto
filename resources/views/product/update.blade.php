@extends('layouts.app')

@section('title','Update Flower')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-around">
            <div class="">
                <img src="{{$data->image}}" id="displayed" width="400px"/>
            </div>
            <form action="{{route('productUpdate',$data->id)}}" enctype="multipart/form-data" class="w-50" method="post" >
                @csrf
                @method('patch')
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <div class="mb-4">
                        <label for="type">Category</label>
                    <div>
                        <select id="type" name="type" class="custom-select">
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Flower Name : </label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}"/>
                </div>
                <div class="form-group">
                    <label for="price">Flower Price : </label>
                    <input type="number" class="form-control" name="price" id="price" value="{{$data->price}}"/>
                </div>
                <div class="form-group">
                    <label for="description">Flower Description : </label>
                    <textarea class="form-control" name="description" >{{$data->description}}</textarea>
                </div>
                <div class="form-group">
                    <div>
                        <label for="image">Flower Image : </label>
                    </div>
                    <input type="file" name="image" id="image" />
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>


        </div>
    </div>
@endsection
