<x-app-layout>
    <h1 class="text-2xl font-bold my-4 text-white">Transactions</h1>

    <table class="min-w-full bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">User</th>
                <th class="py-2 px-4 border">Wedding Package</th>
                <th class="py-2 px-4 border">Total Price</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td class="py-2 px-4 border">{{ $transaction->user->name }}</td>
                    <td class="py-2 px-4 border">{{ $transaction->weddingPackage->name }}</td>
                    <td class="py-2 px-4 border">{{ $transaction->total_price }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('transactions.show', $transaction->id) }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
