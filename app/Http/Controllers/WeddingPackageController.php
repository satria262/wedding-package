<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\WeddingPackage;
use Illuminate\Routing\Controller;
use Spatie\Permission\Traits\HasRoles;

class WeddingPackageController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('role:admin')->except(['forUser', 'show', 'book', 'bookStore']);
    }

    public function forUser()
    {
        $weddingPackages = WeddingPackage::all();
        return view('index', compact('weddingPackages'));
    }

    public function index()
    {
        $weddingPackages = WeddingPackage::with([
            'category',
            'bonuses',
            'testimonials'
    ])->latest()->paginate(10);
        return view('wedding_packages.index', compact('weddingPackages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('wedding_packages.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        WeddingPackage::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('wedding-packages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $package = WeddingPackage::findOrfail($id);
        return view('detail', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = WeddingPackage::findOrFail($id);
        $categories = Category::all();
        return view('wedding_packages.edit', compact(['package', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $wedding = WeddingPackage::findOrFail($id);
        $categories = Category::all();

        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $wedding->update($data);

        return redirect()->route('wedding-packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = WeddingPackage::findOrFail($id);
        $product->delete();
        return redirect()->route('wedding-packages.index')->withSuccess('Your product has been successfully deleted');
    }

    public function book(string $id) {
        $package = WeddingPackage::findOrfail($id);
        return view('book', compact('package'));
    }

    public function bookStore($id) {

        $package = WeddingPackage::findOrfail($id);
        Transaction::create([
            'user_id' => auth()->id(),
            'wedding_package_id' => $package->id,
            'total_price' => $package->price,
        ]);
        return redirect()->route('packages.forUser');
    }
}
