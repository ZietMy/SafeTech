<?php

namespace App\View\Components;

use App\Models\Cart;
use Illuminate\View\Component;

class CountCart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $countCart;
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->countCart = Cart::with('product')
        ->where(['user_id'=>auth()->user()->id])->count();
        return view('components.count-cart');
    }
}
