<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AgregarCarritoProducto extends Component
{
    public $producto, $stockProducto;
    public $cantidadCarrito = 1;
    public $opciones = ['color_id' => null, 'medida_id' => null];

    public function mount()
    {
        //$this->stockProducto = $this->producto->cantidad;
        $this->stockProducto = calculandoProductosDisponibles($this->producto->id);
        $this->opciones["imagen"] = Storage::url($this->producto->imagenes->first()->url);
    }

    public function render()
    {
        return view('livewire.frontend.agregar-carrito-producto');
    }


    public function disminuir()
    {
        $this->cantidadCarrito = $this->cantidadCarrito - 1;
    }
    public function aumentar()
    {
        $this->cantidadCarrito = $this->cantidadCarrito + 1;
    }

    public function agregarProducto()
    {
        Cart::add(
            [
                'id' => $this->producto->id,
                'name' => $this->producto->nombre,
                'qty' => $this->cantidadCarrito,
                'price' => $this->producto->precio,
                'weight' => 550,
                'options' => $this->opciones,
            ]
        );
        $this->stockProducto = calculandoProductosDisponibles($this->producto->id);

        $this->reset('cantidadCarrito');

        $this->emitTo('frontend.menu-carrrito', 'render');
    }
}
