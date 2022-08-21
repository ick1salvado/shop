<x-app-layout>
    <div class="grid grid-cols-5">
        <div>
            @foreach ($producto->imagenes as $imagen)
                <li>
                    <img src="{{ Storage::url($imagen->url) }}" alt="">

                </li>
            @endforeach
        </div>
        <div class="col-span-4">
            <h1>{{ $producto->nombre }} </h1>
            <p>Nombre: {{ $producto->marca->nombre }}</p>
            <p>Precio: {{ $producto->precio }}</p>
            <p>Recibelo el: {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>

            <div>
                @if ($producto->subcategoria->medida)
                    @livewire('agregar-carrito-producto-medida', ['producto' => $producto])
                @elseif($producto->subcategoria->color)
                    @livewire('agregar-carrito-producto-color', ['producto' => $producto])
                @else
                    @livewire('agregar-carrito-producto', ['producto' => $producto])
                @endif
            </div>
        </div>

    </div>
</x-app-layout>
