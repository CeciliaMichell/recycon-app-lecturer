<?php

namespace App\View\Components;

use App\Models\Cart;
use Illuminate\View\Component;

class ListCartItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $cart,$index;

    public function __construct(Cart $cart,$index)
    {
        $this->cart=$cart;
        $this->index=$index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-cart-item');
    }
}
