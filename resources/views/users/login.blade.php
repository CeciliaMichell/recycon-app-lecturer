@extends('_shared/layout')

@section('title', 'Login')
@section('main')

<x-main>

  <header class="text-center">
    <x-title-section>{{ __("message.Login Form") }}</x-title-section>
  </header>

  <x-form-section>
    <form method="POST" action="/login">

      @csrf
      <div class="mb-3">
        <input type="text" class="border rounded p-2 w-100" placeholder="{{ __("message.Email") }}" name="email" value="{{old('email')}}" />
        @error('email')
        <p class="text-danger mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-3">
        <input type="password" class="border rounded p-2 w-100" placeholder="{{ __("message.Password") }}" name="password" value="{{old('password')}}" />
        @error('password')
        <p class="text-danger mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-3">
        <input class="form-check-input" type="checkbox" name="remember_me" id="remember-me"/>
        <label class="form-check-label" for="remember-me">{{ __("message.Remember me") }}</label>
      </div>
        @error('login_failed')
        <p class="text-danger mt-1">{{$message}}</p>
        @enderror

      <div class="mb-3 d-flex justify-content-center">
        <button type="submit" class="bg-primary btn text-white rounded py-2 px-4">
          {{ __("message.Login") }}
        </button>
      </div>

    </form>
  </x-form-section>

</x-main>
@endsection
