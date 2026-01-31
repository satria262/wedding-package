<x-app-layout>
    @if (session('success'))
        <script>
            alert{{ session('success') }}
        </script>
    @endif
    <div class="flex justify-between items-center my-4">
        <h1 class="text-2xl font-bold">Wedding Testimonials</h1>
        <a href="{{ route('wedding-testimonials.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Testimonial</a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">Testimonial</th>
                <th class="py-2 px-4 border">Package</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weddingTestimonials as $testimonial)
                <tr>
                    <td class="py-2 px-4 border">{{ $testimonial->testimonial }}</td>
                    <td class="py-2 px-4 border">{{ $testimonial->weddingPackage->name }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('wedding-testimonials.edit', $testimonial->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                        <form action="{{ route('wedding-testimonials.destroy', $testimonial) }}" method="POST"
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
