@extends('_shared/layout')

@section('title', 'My Cart')
@section('main')

<x-main>

  <header class="text-center">
    <x-title-section>{{ __("message.My Cart") }}</x-title-section>
  </header>

    @if(count($carts)==0)

        <p class="text-center">{{ __("message.Cart is empty") }}</p>

    @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="text-center" >{{ __("message.No") }}</th>
                <th scope="col" class="text-center" style="width: 200px;">{{ __("message.Item Image") }}</th>
                <th scope="col" class="text-center" style="width: 200px;">{{ __("message.Item Name") }}</th>
                <th scope="col" class="text-center">{{ __("message.Quantity") }}</th>
                <th scope="col" class="text-center" style="width: 130px;">{{ __("message.Price") }}</th>
                <th scope="col" class="text-center" style="width: 350px;">{{ __("message.Action") }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carts as $cart)
                <x-list-cart-item :cart="$cart" :index="$loop->index"/>
            @endforeach
            </tbody>
        </table>

        <div class="fw-bold mt-2 mb-3">
            {{ __("message.Grand Total") }} : {{ __("message.IDR") }}. {{$total}}
        </div>

        <form action="/transaction" method="POST">
            @csrf
            <div class="mb-3">
                <div class="display-6">{{ __("message.Receiver") }}</div>
            </div>
            <div class="mb-3">
                <label for="receiverName" class="form-label">{{ __("message.Receiver Name") }}</label>
                <input type="text" id="receiverName" class="form-control" name="receiverName" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
            </div>
            @error('receiverName')
            <p class="text-danger mt-1">{{$message}}</p>
            @enderror
            <div class="mb-3">
                <label for="receiverAddress" class="form-label">{{ __("message.Receiver Address") }}</label>
                <textarea class="border rounded p-2 w-100" id="receiverAddress" name="receiverAddress" rows="2"></textarea>
            </div>
            @error('receiverAddress')
            <p class="text-danger mt-1">{{$message}}</p>
            @enderror
            <input type="hidden" name="carts" value="{{$carts}}">
            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="bg-primary btn text-white rounded py-2 px-4">
                    {{ __("message.Checkout", [ 'count' => ({{@count($carts)}})]) }}
                    {{-- Checkout ({{@count($carts)}}) --}}
                </button>
            </div>

        </form>
        @endif





</x-main>
@endsection
