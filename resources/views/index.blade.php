<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 dark:text-gray-200 leading-tight">
            {{ __('Our Wedding Packages') }}
        </h2>
    </x-slot>
    <div class="text-white container mx-auto px-4 mt-8">
        <div class="border-1 rounded-md py-4">
            <table class="w-full">
                <thead>
                    <td class="px-4">Name</td>
                    <td class="px-4">Price</td>
                    <td class="px-4">Category</td>
                    <td class="px-4">Action</td>
                </thead>
                @foreach ($weddingPackages as $weddingPackage)
                    <tbody>
                        <td class="border-b p-4">{{ $weddingPackage->name }}</td>
                        <td class="border-b p-4">{{'Rp' . number_format($weddingPackage->price, 0, ',', '.') }}</td>
                        <td class="border-b p-4">{{ $weddingPackage->category->name }}</td>
                        <td class="border-b p-4">
                            <a href="{{ route('packages.show', $weddingPackage->id) }}"
                                class="text-blue-600 hover:text-blue-400">Detail</a>
                            <a href="{{ route('packages.book', ['id' => $weddingPackage->id]) }}"
                                class="text-green-600 hover:text-green-400">Book Now</a>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>
