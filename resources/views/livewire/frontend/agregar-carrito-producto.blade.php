<div x-data>
    <p>PRODUCTO SOLO</p>
    <div>
        <span>{{ $cantidadCarrito }} </span>
        <p>Stock disponible: {{ $stockProducto }} </p>
        <x-jet-secondary-button disabled x-bind:disabled="$wire.cantidadCarrito <= 1" wire:loading.attr="disabled"
            wire:target="disminuir" wire:click="disminuir">-
        </x-jet-secondary-button>
        ||
        <x-jet-secondary-button x-bind:disabled="$wire.cantidadCarrito >= $wire.stockProducto"
            wire:loading.attr="disabled" wire:target="aumentar" wire:click="aumentar">+
        </x-jet-secondary-button>
    </div>
    <div>
        <x-boton-agregar color="orange" x-bind:disabled="$wire.cantidadCarrito > $wire.stockProducto" wire:click="agregarProducto" wire:loading.attr="disabled"
            wire:target="agregarProducto">
            Agregar al carrito
        </x-boton-agregar>
    </div>
</div>
