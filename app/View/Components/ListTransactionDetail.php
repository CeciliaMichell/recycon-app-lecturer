<?php

namespace App\View\Components;

use App\Models\TransactionDetail;
use Illuminate\View\Component;

class ListTransactionDetail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $detail,$index;


    public function __construct(TransactionDetail $detail,$index)
    {
        //
        $this->detail=$detail;
        $this->index=$index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-transaction-detail');
    }
}
