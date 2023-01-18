<tr>
    <td class="text-center" style="width: 10%">{{$index+1}}</td>
    <td class="img-view-item">{{$product->product_id}}</td>
    <td class="text-center"><img src="{{asset($product->image)}}" class="card-img-top"></td>
    <td class="text-center">{{$product->name}}</td>
    <td class="text-center">{{$product->description}}</td>
    <td class="text-center">{{$product->price}}</td>
    <td class="text-center">{{$product->category->category_name}}</td>
    <td class="text-center">
        <div class="d-flex justify-content-between">
            <button type="submit" class="bg-warning btn text-white rounded py-2 px-3" style="width: 140px;" onclick="window.location='/update-product/{{$product->product_id}}'">
                {{ __("message.Update") }}
            </button>
            <form action="delete-product" method="post">
                @csrf
                <input type="hidden" value="{{$product->product_id}}" name="id">
                <button type="submit" class="bg-danger btn text-white rounded py-2 px-3" style="width: 140px;">
                    {{ __("message.Delete") }}
                </button>
            </form></div>
    </td>
</tr>
