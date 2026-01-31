<x-app-layout>
    <h1 class="text-2xl font-bold my-4 text-white text-center">Edit</h1>
    <form action="{{ route('category.update', $category) }}" method="post" class="text-white flex flex-col w-full items-center">
        @csrf
        @method('PUT')

        <label class="w-fit -mb-3 z-10 bg-[#101828] px-[2px]">Current Name: {{ $category->name }}</label>
        <input type="text" name="name" value="{{ $category->name }}" placeholder="New Name" class="border-1 outline-none ring-none rounded-md p-1">
        <button type="submit">Submit</button>
    </form>
</x-app-layout>
