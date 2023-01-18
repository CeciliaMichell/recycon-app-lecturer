@extends('_shared/layout')

@section('title', 'My Transaction History')
@section('main')

<x-main>

  <header class="text-center">
    <x-title-section>{{ __("message.My Transaction History") }}</x-title-section>
  </header>


        @if(count($transactions)==0)
        <p class="text-center">{{ __("message.History is empty") }}</p>
        @else
            @foreach ($transactions as $transactionHeader)
                <x-list-transaction :transactionHeader="$transactionHeader"/>
            @endforeach
            @endif
</x-main>
@endsection
