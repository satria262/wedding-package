<x-app-layout>
    <h1 class="text-2xl font-bold my-4">Add New Wedding Package Bonus</h1>

    <form action="{{ route('wedding-bonuses.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Bonus Name:</label>
            <input type="text" name="bonus_name" class="w-full px-3 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Wedding Package:</label>
            <select name="wedding_package_id" class="w-full px-3 py-2 border rounded-lg">
                @foreach ($weddingPackages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save
            Bonus</button>
    </form>
</x-app-layout>
