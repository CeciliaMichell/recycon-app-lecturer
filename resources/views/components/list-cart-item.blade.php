<tr>
    <td class="text-center">{{$index+1}}</td>
    <td class="text-center"><img src="{{asset($cart->product->image)}}" style="width: 200px;">
    <td class="img-view-item text-center">{{$cart->product->name}}</td>
    <td class="text-center">{{$cart->quantity}}</td>
    <td class="text-center">{{ __("message.IDR") }} {{$cart->product->price}}</td>
    <td>
        <div class="d-flex justify-content-between">
            <button type="submit" class="bg-warning btn text-white rounded py-2 px-3" style="width: 140px;" onclick="window.location='{{ url("/detail-product").'/'.$cart->product->product_id }}'">
                {{ __("message.Update") }}
            </button>
            <form action="delete-cart" method="post">
                @csrf
                <input type="hidden" value="{{$cart->id}}" name="id">
            <button type="submit" class="bg-danger btn text-white rounded py-2 px-3" style="width: 140px;">
                {{ __("message.Delete") }}
            </button>
        </form></div>

    </td>
</tr>

