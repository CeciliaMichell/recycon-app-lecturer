@extends('_shared/layout')

@section('title', 'Edit Profile')
@section('main')

<x-main>

  <header class="text-center">
    <x-title-section>{{ __("message.Edit Profile") }}</x-title-section>
  </header>

  <x-form-section>
    <form action="/profile" method="POST">

      @csrf
      <div class="mb-3">
        <label for="username" class="form-label">{{ __("message.New Username") }}</label>
        <input type="text" id="username" class="form-control" name="username" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
        @error('username')
        <p class="text-danger mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">{{ __("message.New Email") }}</label>
        <input type="text" id="email" class="form-control" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
        @error('email')
        <p class="text-danger mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3 d-flex justify-content-center">
        <button type="submit" class="bg-primary btn text-white rounded py-2 px-4">
          {{ __("message.Save") }}
        </button>
      </div>

    </form>
  </x-form-section>

</x-main>
@endsection
