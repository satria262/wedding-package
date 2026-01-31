<x-app-layout>
@if (session('success'))
    <script>
        alert{{ session('success') }}
    </script>
@endif
<div class="flex justify-between items-center my-4">
    <h1 class="text-2xl font-bold text-white">Wedding Packages</h1>
    <div>
        <a href="{{ route('wedding-packages.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Package</a>
        <a href="{{ route('category.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Category</a>
    </div>
</div>

<table class="min-w-full bg-white border">
    <thead>
        <tr class="bg-gray-200">
            <th class="py-2 px-4 border">Name</th>
            <th class="py-2 px-4 border">Price</th>
            <th class="py-2 px-4 border">Category</th>
            <th class="py-2 px-4 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($weddingPackages as $package)
        <tr>
            <td class="py-2 px-4 border">{{ $package->name }}</td>
            <td class="py-2 px-4 border">{{ $package->price }}</td>
            <td class="py-2 px-4 border">{{ $package->category->name }}</td>
            <td class="py-2 px-4 border">
                <a href="{{ route('wedding-packages.edit', $package->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                <form action="{{ route('wedding-packages.destroy', $package->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" onclick="return confirm('Are you sure you want to delete ' . $package->name)">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <p class="text-white text-center text-2xl font-semibold">You haven't add any product</p>
        @endforelse
    </tbody>
</table>
</x-app-layout>
