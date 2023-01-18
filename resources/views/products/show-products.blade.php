@extends('_shared/layout')

@section('title', 'Show Product')
@section('main')

<x-main>

  <header class="text-center">
    <x-title-section>{{ __("message.Our Products") }}</x-title-section>
  </header>

   @unless(count($products) == 0)
    <div class="row">
    @foreach($products as $product)
        <x-card :product="$product"/>
    @endforeach
    </div>
   @else
   <p class="text-center">{{ __("message.No Product") }}</p>
   @endunless
    <div class="d-flex justify-content-center m-4">
        {{ $products->links() }}
    </div>

</x-main>
@endsection
