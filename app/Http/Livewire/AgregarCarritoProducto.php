<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AgregarCarritoProducto extends Component
{
    public $producto, $cantidad; 
    public $stock = 1;
    public function render()
    {
        return view('livewire.agregar-carrito-producto');
    }
    public function disminuir()
    {
        $this->stock = $this->stock - 1;
    }
    public function aumentar()
    {
        $this->stock = $this->stock + 1;
    }
    public function mount(){
        $this->cantidad = $this->producto->cantidad;
    }
}
