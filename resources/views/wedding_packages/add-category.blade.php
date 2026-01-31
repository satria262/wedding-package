<x-app-layout>
    @if (session('success'))
        <script>
            alert{{ session('success') }}
        </script>
    @endif
    <h1 class="text-2xl font-bold my-4 text-white text-center">Add a new category</h1>
    <form action="{{ route('category.store') }}" method="POST" class="flex justify-center text-white">
        @csrf
        <div class="flex flex-col items-center bg-[#09637E] p-4 rounded-md border-1 space-y-2">
            <label>What should the category named?</label>
            <input type="text" name="name" placeholder="Type here"
                class="outline-none ring-none border-1 rounded-md p-2" required>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
        </div>
    </form>
    <div class="text-white container mx-auto px-4 mt-8">
        <div class="border-1 rounded-md py-4">
            <table class="w-full">
                <thead>
                    <td class="px-4">Category Name</td>
                    <td class="px-4">Action</td>
                </thead>
                @foreach ($categories as $category)
                    <tbody>
                        <td class="border-b p-4">{{ $category->name }}</td>
                        <td class="border-b p-4">
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('category.edit', $category) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit Name</a>
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>
