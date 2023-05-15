<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-disc">
                        @foreach ($list as $product)
                            <li>
                                <a href="/products/{{$product['id']}}">{{ $product['name'] }}</a>
                                <span>Цена: {{ $product['price'] }}</span>
                                @if($product['image'])
                                    <img src="/{{ $product['image'] }}" width="350">
                                @endif
                                <a href="route('products.page')" :active="request()->routeIs('products.page'')">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
