@extends('_shared/layout')

@section('title', 'Add New Item')
@section('main')

<x-main>

  <header class="text-center">
    <x-title-section>{{ __("message.Add New Item") }}</x-title-section>
  </header>

  <x-form-section>
    <form method="POST" action="/add-item" enctype="multipart/form-data">
        @csrf
        <div class="row g-3 mb-3 align-products-center">
            <div class="col-auto">
                <input type="text" class="border rounded p-2 w-100" placeholder="{{ __("message.Item ID") }}" name="productID" value="{{old('productID')}}" />
                @error('productID')
                <p class="text-danger mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="col-auto">
                <input type="number" class="border rounded p-2 w-100" placeholder="{{ __("message.Item Price") }}" name="productPrice" value="{{old('productPrice')}}" />
                @error('productPrice')
                <p class="text-danger mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="col-auto">
                <div class="dropdown">
                    <select name="category" class="border rounded p-2 w-100">
                        @foreach($categories as $category)
                            <option value={{$category->id}}>{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <input type="text" class="border rounded p-2 w-100" placeholder="{{ __("message.Item Name") }}" name="productName" value="{{old('productName')}}" />
            @error('productName')
            <p class="text-danger mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <textarea class="border rounded p-2 w-100" placeholder="{{ __("message.Item Description") }}" name="productDescription" value="{{old('productDescription')}}" rows="3"></textarea>
            @error('productDescription')
            <p class="text-danger mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="row g-3 mb-3 d-flex justify-content-around align-content-center">
            <div class="col-5">
                <input id="upload" name="image" type="file" onchange="readURL(this);" class="form-control border-0">
            </div>
            <div class="col-5">
                <div class="image-area">
                    <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                </div>
            </div>
        </div>

        <div class="mb-3 d-flex justify-content-center">
            <button type="submit" class="bg-primary btn text-white rounded py-2 px-4">
                {{ __("message.Add Item") }}
            </button>
        </div>

    </form>
  </x-form-section>

</x-main>
@endsection
