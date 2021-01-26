@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($datas) != 0)
            <h1 class="text-center">Your Cart</h1>
            @foreach ($datas as $data)
                <div class="d-flex justify-content-around align-items-center py-3" style="background-color: rgb(255, 150, 52);">
                    <img class="w-25" src="{{$data->image}}">
                    <span>{{$data->name}}</span>
                    <span>Rp {{$data->price * $data->pivot->quantity}}</span>
                    <form action="{{route('updateCartContent', $data->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                        @if($errors->any() && $data->id == session('productId'))
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" 
                            value="{{$data->pivot->quantity}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            @endforeach

            <form action="{{route('checkout')}}" method="POST" class="text-center my-3">
                @csrf
                <button type="submit" class="btn btn-danger">Checkout</button>
            </form>
        @else
            <h1 class="text-center">Your Cart is Empty</h1>
            <h5 class="text-center">Look Again and Buy Some Flower</h5>
        @endif
    </div>

    @error('quantity')
        <div class="container position-fixed fixed-bottom" id="notification">
            <div role="alert" class="alert alert-danger alert-dismissible fade @if(session('success')) show @endif">
                <strong>{{$message}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>
        </div>
    @enderror
@endsection