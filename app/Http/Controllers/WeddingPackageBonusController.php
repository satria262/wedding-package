<?php

namespace App\Http\Controllers;

use App\Models\WeddingPackageBonus;
use App\Models\WeddingPackage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Traits\HasRoles;

class WeddingPackageBonusController extends Controller
{
    public function __construct()
    {
        // Hanya admin yang dapat mengelola bonus
        $this->middleware('role:admin')->except(['index']);
        $this->middleware('permission:view bonuses')->only('index');
        $this->middleware('permission:create bonuses')->only(['create', 'store']);
        $this->middleware('permission:edit bonuses')->only(['edit', 'update']);
        $this->middleware('permission:delete bonuses')->only('destroy');
    }

    public function index()
    {
        $bonuses = WeddingPackageBonus::with('weddingPackage')->get();
        return view('wedding_bonuses.index', compact('bonuses'));
    }

    public function create()
    {
        $weddingPackages = WeddingPackage::all();
        return view('wedding_bonuses.create', compact('weddingPackages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bonus_name' => 'required',
            'wedding_package_id' => 'required|exists:wedding_packages,id',
        ]);

        WeddingPackageBonus::create($request->all());
        return redirect()->route('wedding-bonuses.index')->with('success', 'Bonus created successfully.');
    }

    public function edit(WeddingPackageBonus $bonus)
    {
        $weddingPackages = WeddingPackage::all();
        return view('wedding_bonuses.edit', compact('bonus', 'weddingPackages'));
    }

    public function update(Request $request, WeddingPackageBonus $bonus)
    {
        $request->validate([
            'bonus_name' => 'required',
            'wedding_package_id' => 'required|exists:wedding_packages,id',
        ]);

        $bonus->update($request->all());
        return redirect()->route('wedding-bonuses.index')->with('success', 'Bonus updated successfully.');
    }

    public function destroy(WeddingPackageBonus $bonus)
    {
        $bonus->delete();
        return redirect()->route('wedding-bonuses.index')->with('success', 'Bonus deleted successfully.');
    }
}
