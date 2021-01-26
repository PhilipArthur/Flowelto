@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class="w-100" src="{{$datas->image}}" alt="{{$datas->id}}">
            </div>
            <div class="col-md-9">
                <form action="{{route('categoryUpdate', $datas->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" name="categoryName" id="category_name"
                            value="{{old('categoryName') != null ? old('categoryName') : $datas->name}}">
                        @error('categoryName')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_image">Category Image</label>
                        <input type="file" class="form-control-file" name="categoryImage" id="category_image">
                        @error('categoryImage')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
