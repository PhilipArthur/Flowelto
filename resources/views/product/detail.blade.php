@extends('layouts.app')
@section('title','Flower')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="d-flex w-50">
                <img src="{{$data->image}}" width="400px"/>
            </div>
            <div class="d-flex flex-column w-50">
                <h1 class="font-weight-bold">{{$data->name}}</h1>
                <div style="color: rgb(255, 150, 52)" class="my-2 font-weight-bold fa-2x">Rp {{$data->price}}</div>
                <div>
                    {{$data->description}}
                </div>
                @if(!Auth::user() || Auth::user()->role != "manager")
                    @if ($inCart)
                    <div class="alert alert-danger">
                        <div>This product has been added to the cart</div>
                    </div>
                    @else
                        <form action="{{route('addToCart', $data->id)}}" enctype="multipart/form-data" method="post" class="w-50 mt-5">
                            @csrf

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="d-flex justify-content-between align-items-center form-group" >
                                <label for="quantity">Quantity : </label>
                                <div class="w-50">
                                    <input required class="form-control w-100" type="number" name="quantity" id="quantity"/>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary w-50">Add to cart</button>
                            </div>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
