@extends('_shared/layout')

@section('title', 'Register')
@section('main')

<x-main>

  <header class="text-center">
    <x-title-section>{{ __("message.Register Form") }}</x-title-section>
  </header>

  <x-form-section>
    <form method="POST" action="/register">

      @csrf
      <div class="mb-3">
        <input type="text" class="border rounded p-2 w-100" placeholder="{{ __("message.Full Name") }}" name="name" value="{{old('name')}}" />
        @error('name')
        <p class="text-danger mt-1">{{$message}}</p>
        @enderror
      </div>

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
        <input type="password" class="border rounded p-2 w-100" placeholder="{{ __("message.Confirm Password") }}" name="password_confirmation" value="{{old('confirm_password')}}" />
        @error('confirm_password')
        <p class="text-danger mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-3 d-flex justify-content-center">
        <button type="submit" class="bg-primary btn text-white rounded py-2 px-4">
          {{ __("message.Register Now") }}
        </button>
      </div>

    </form>
  </x-form-section>

</x-main>
@endsection
