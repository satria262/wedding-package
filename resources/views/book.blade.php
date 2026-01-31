<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 dark:text-gray-200 leading-tight">
            {{ __($package->name . ' Book') }}
        </h2>
    </x-slot>
    <form action="{{ route('packages.bookStore', $package->id) }}" method="POST">
        @csrf
        <div class="flex justify-center items-center mt-8">
            <div class="text-white font-xl font-light bg-[#09637E] rounded-md p-4 border">
                <p>Name: {{ $package->name }}</p>
                <p>Price: {{ $package->price }}</p>
                <p>Category {{ $package->category->name }}</p>
                <p>Description: <br> {{ $package->description }}</p>
                <button type="submit" onclick="return confirm('Confirm')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Confirm Order</button>
            </div>
        </div>
    </form>
</x-app-layout>
