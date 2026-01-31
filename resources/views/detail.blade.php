<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 dark:text-gray-200 leading-tight">
            {{ __('The ' . $package->name . ' Wedding Package | Info') }}
        </h2>
    </x-slot>
    <div class="flex justify-center items-center mt-8">
        <div class="text-white font-xl font-light bg-[#09637E] rounded-md p-4 border">
            <p>Name: {{ $package->name }}</p>
            <p>Price: {{ $package->price }}</p>
            <p>Category {{ $package->category->name }}</p>
            <p>Description: <br> {{ $package->description }}</p>
        </div>
    </div>
</x-app-layout>
