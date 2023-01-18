@extends('_shared/layout')

@section('title', 'Detail Product')
@section('main')

<x-main>

<div class="px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6"><img src="{{url('/assets/recycle-cans-recycled-old.jpg')}}" class="card-img-top"></div>
        <div class="col-md-6">
            <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
            <div class="fs-6 mb-5 d-flex flex-column">
              <span>{{ __("message.Price") }} : {{ __("message.IDR") }} {{$product->price}}</span>
              <span>{{ __("message.Category") }} : {{$product->category->category_name}}</span>
            </div>

            <p class="text-break">{{ __("message.Description") }}
            <br>
                <div>
                {{$product->description}}
            </div>
            </p>
            @if(\Illuminate\Support\Facades\Auth::check()&&\Illuminate\Support\Facades\Auth::user()->role == "customer")
            <form method="POST" action="/cart">
                @csrf
                <input name="product_id" type="hidden" value="{{$product->product_id}}">
            <div class="d-flex">
              <input class="form-control text-center me-3" id="quantity" name="quantity" type="num" value="1" style="max-width: 3rem" />
              <button class="btn text-white btn-primary" type="submit">{{ __("message.Add To Cart") }}</button>
            </div>
            </form>
            @endif
            @if(!\Illuminate\Support\Facades\Auth::check())
            <button class="btn text-white btn-primary" type="submit" onclick="window.location='{{ url("/login") }}'">{{ __("message.Login to buy") }}</button>
            @endif
            @error('quantity')
            <p class="text-danger mt-1">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>

</x-main>
@endsection
