<div class="mb-3">
    <p>
        <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target={{"#Tran".strval($transactionHeader->id)}} aria-expanded="false" aria-controls="collapseExample">
            {{$transactionHeader->created_at}}
        </button>
    </p>
    <div class="collapse" id={{"Tran".strval($transactionHeader->id)}}>
        <div class="card card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center">{{ __("message.No") }}</th>
                    <th scope="col" class="text-center">{{ __("message.Image") }}</th>
                    <th scope="col" class="text-center">{{ __("message.Item Name") }}</th>
                    <th scope="col" class="text-center">{{ __("message.Item Price") }}</th>
                    <th scope="col" class="text-center">{{ __("message.Quantity") }}</th>
                    <th scope="col" class="text-center">{{ __("message.Total Price") }}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($transactionHeader->detail as $detail)
                    <x-list-transaction-detail :detail="$detail" :index="$loop->index"/>
                    <div class="d-none">{{$total += $detail->product->price*$detail->quantity}}</div>
                @endforeach
                <tr>
                    <td colspan="6" class="text-center">{{ __("message.Grand Total") }} : {{$total}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
