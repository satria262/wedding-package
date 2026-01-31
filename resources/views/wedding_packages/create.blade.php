<x-app-layout>
<h1 class="text-2xl font-bold my-4 text-white">Add New Wedding Package</h1>

<form action="{{ route('wedding-packages.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700">Name:</label>
        <input type="text" name="name" class="w-full px-3 py-2 border rounded-lg" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Price:</label>
        <input type="text" name="price" class="w-full px-3 py-2 border rounded-lg" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Category:</label>
        <select name="category_id" class="w-full px-3 py-2 border rounded-lg">
            <option value="">Please select one below</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Description:</label>
        <textarea name="description" class="w-full px-3 py-2 border rounded-lg" required></textarea>
    </div>

    <div class="flex justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Package</button>
        <a href="{{ route('category.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-8">Add a new category</a>
    </div>
</form>
</x-app-layout>
