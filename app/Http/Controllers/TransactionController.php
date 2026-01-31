<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\WeddingPackage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Traits\HasRoles;

class TransactionController extends Controller
{
        public function __construct()
        {
            // Hanya admin yang dapat mengelola transaksi
            $this->middleware('role:admin')->except(['index', 'show']);
            $this->middleware('permission:view transactions')->only(['index', 'show']);
            $this->middleware('permission:create transactions')->only(['create', 'store']);
            $this->middleware('permission:edit transactions')->only(['edit', 'update']);
            $this->middleware('permission:delete transactions')->only('destroy');
        }

    public function index()
    {
        $transactions = Transaction::with(['user', 'weddingPackage'])->get();
        return view('transactions.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function create()
    {
        $users = User::all();
        $weddingPackages = WeddingPackage::all();
        return view('transactions.create', compact('users', 'weddingPackages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'wedding_package_id' => 'required|exists:wedding_packages,id',
            'total_price' => 'required|numeric',
        ]);

        Transaction::create($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function edit(Transaction $transaction)
    {
        $users = User::all();
        $weddingPackages = WeddingPackage::all();
        return view('transactions.edit', compact('transaction', 'users', 'weddingPackages'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'wedding_package_id' => 'required|exists:wedding_packages,id',
            'total_price' => 'required|numeric',
        ]);

        $transaction->update($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
