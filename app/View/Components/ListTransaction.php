<?php

namespace App\View\Components;

use App\Models\TransactionHeader;
use Illuminate\View\Component;

class ListTransaction extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $transactionHeader;

    public function __construct(TransactionHeader $transactionHeader)
    {
        //
        $this->transactionHeader=$transactionHeader;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-transaction');
    }
}
