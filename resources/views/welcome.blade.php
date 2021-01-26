@extends('layouts.app')

@section('title',"Home")

@section('content')
<div class="container">
    <div class="d-flex justify-content-center flex-column text-center">
        <h1><i>Welcome to Flowelto Shop</i></h1>
        <p><b>The Best Flower Shop in Binus University</b></p>
        <div class="d-flex justify-content-center align-items-center">
            <div class="d-flex flex-wrap align-items-center w-50">
                @foreach($datas as $data)
                    <div class="bg-color-card m-3" >
                        <div class="pt-3 px-2">
                            <a href="{{route('home',$data->id)}}" >
                                <img src="{{$data->image}}" alt="{{$data->id}}" style="width: 200px"/>
                            </a>
                        </div>
                        <div class="my-3 font-weight-bold">
                            <a class="text-dark" href="{{route('home',$data->id)}}">
                                {{$data->name}}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
