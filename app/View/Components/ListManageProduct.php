<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class ListManageProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $product,$index;

    public function __construct(Product $product,$index)
    {
        $this->product=$product;
        $this->index=$index;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-manage-product');
    }
}
