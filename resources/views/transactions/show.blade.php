<x-app-layout>
    <h1 class="text-2xl font-bold my-4">Transaction Details</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <p class="mb-4"><strong>User:</strong> {{ $transaction->user->name }}</p>
        <p class="mb-4"><strong>Wedding Package:</strong> {{ $transaction->weddingPackage->name }}</p>
        <p class="mb-4"><strong>Total Price:</strong> {{ $transaction->total_price }}</p>
    </div>
</x-app-layout>
