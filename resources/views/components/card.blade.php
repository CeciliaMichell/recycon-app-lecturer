
<div class="card m-2" style="width: 25rem;">
    <img src="{{asset($product->image)}}" class="card-img-top ">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h5 class="card-title">{{$product->name}}</h5>
            <div class="card-title">{{$product->category->category_name}}</div>
        </div>
        <p class="card-text text-secondary">{{$product->price}}</p>
        <a href="/detail-product/{{$product->product_id}}" class="btn btn-primary">{{ __("message.Detail Product") }}</a>
    </div>
</div>
