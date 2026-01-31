<x-app-layout>
    <div class="flex justify-between items-center my-4 text-white   ">
        <h1 class="text-2xl font-bold">Wedding Package Bonuses</h1>
        <a href="{{ route('wedding-bonuses.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Bonus</a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">Bonus Name</th>
                <th class="py-2 px-4 border">Package</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bonuses as $bonus)
                <tr>
                    <td class="py-2 px-4 border">{{ $bonus->bonus_name }}</td>
                    <td class="py-2 px-4 border">{{ $bonus->weddingPackage->name }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('wedding-bonuses.edit', $bonus->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                        <form action="{{ route('wedding-bonuses.destroy', $bonus->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
