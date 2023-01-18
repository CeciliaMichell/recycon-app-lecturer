@extends('_shared/layout')

@section('title', 'Change Password')
@section('main')

<x-main>

  <header class="text-center">
    <x-title-section>{{ __("message.ChangePassword") }}</x-title-section>
  </header>

  <x-form-section>
    <form action="/change-password" method="POST">

      @csrf
      <div class="mb-3">
        <label for="old-password" class="form-label">{{ __("message.Old Password") }}</label>
        <input type="password" id="old-password" class="form-control" name="old_password">
        @error('old_password')
        <p class="text-danger mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label for="new-password" class="form-label">{{ __("message.New Password") }}</label>
        <input type="password" id="new-password" class="form-control" name="password">
        @error('password')
        <p class="text-danger mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label for="confirm-password" class="form-label">{{ __("message.Confirm New Password") }}</label>
        <input type="password" id="confirm-password" class="form-control" name="password_confirmation">
        @error('password_confirmation')
        <p class="text-danger mt-1">{{$message}}</p>
        @enderror
          @error('error_change')
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
