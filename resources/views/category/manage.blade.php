@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($datas as $data)
                <div class="col-md-4">
                    <div class="bg-color-card p-3">
                        <img src="{{$data->image}}" alt="{{$data->id}}" class="w-100"/>
                        <div class="mt-2 font-weight-bold text-center">
                            <div class="text-dark py-2">{{$data->name}}</div>
                            <div class="btn-group">
                                <form action="{{route('categoryDelete', $data->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete Category</button>
                                </form>
                                <a href="{{route('categoryEdit', $data->id)}}" class="btn btn-info">Update Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if (session('success'))
        <div class="container position-fixed fixed-bottom" id="notification">
            <div role="alert" class="alert alert-success alert-dismissible fade @if(session('success')) show @endif">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>
        </div>
    @endif
@endsection