@extends('_shared/layout')

@section('title', 'View Item')
@section('main')

<x-main>

  <header class="text-center">
    <x-title-section>{{ __("message.ManageItem") }}</x-title-section>
  </header>

  <table class="table">
    <thead>
      <tr>
        <th scope="col" class="text-center">{{ __("message.No") }}</th>
        <th scope="col" class="text-center">{{ __("message.Item ID") }}</th>
        <th scope="col" class="text-center">{{ __("message.Item Image") }}</th>
        <th scope="col" class="text-center">{{ __("message.Item Name") }}</th>
        <th scope="col" class="text-center">{{ __("message.Item Description") }}</th>
        <th scope="col" class="text-center">{{ __("message.Item Price") }}</th>
        <th scope="col" class="text-center">{{ __("message.Item Category") }}</th>
        <th scope="col" class="text-center">{{ __("message.Action") }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <x-list-manage-product :product="$product" :index="$loop->index"/>
      @endforeach
    </tbody>
  </table>

</x-main>
@endsection
