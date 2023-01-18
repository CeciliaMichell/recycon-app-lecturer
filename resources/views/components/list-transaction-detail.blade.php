<tr>
    <td class="text-center" style="width: 10%">{{$index+1}}</td>
    <td class="img-view-item"><img src="{{asset($detail->product->image)}}" class="card-img-top"></td>
    <td class="text-center">{{$detail->product->name}}</td>
    <td class="text-center">{{$detail->product->price}}</td>
    <td class="text-center">{{$detail->quantity}}</td>
    <td class="text-center">{{$detail->product->price*$detail->quantity}}</td>
</tr>
