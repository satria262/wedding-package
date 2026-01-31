<x-app-layout>
    <h1 class="text-2xl font-bold my-4 text-white">Edit Wedding Package</h1>

    <form action="{{ route('wedding-packages.update', $package->id) }}" method="POST"
        class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Name:</label>
            <input type="text" name="name" value="{{ $package->name }}" class="w-full px-3 py-2 border rounded-lg"
                required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Price:</label>
            <input type="text" name="price" value="{{ $package->price }}"
                class="w-full px-3 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Category:</label>
            <select name="category_id" class="w-full px-3 py-2 border rounded-lg">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $package->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description:</label>
            <textarea name="description" class="w-full px-3 py-2 border rounded-lg" required>{{ $package->description }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update
            Package</button>
    </form>
</x-app-layout>
