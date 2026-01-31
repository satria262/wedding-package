<?php

namespace App\Http\Controllers;

use App\Models\WeddingPackageTestimonial as Testimonial;
use App\Models\WeddingPackage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Traits\HasRoles;

class WeddingTestimonialController extends Controller
{
    public function __construct()
    {
        // Hanya admin yang dapat mengelola CRUD testimonial
        $this->middleware('role:admin')->except(['index']);
        $this->middleware('permission:view testimonials')->only('index');
        $this->middleware('permission:create testimonials')->only(['create', 'store']);
        $this->middleware('permission:edit testimonials')->only(['edit', 'update']);
        $this->middleware('permission:delete testimonials')->only('destroy');
    }

    public function index()
    {
        $weddingTestimonials = Testimonial::with('weddingPackage')->get();
        return view('wedding_testimonials.index', compact('weddingTestimonials'));
    }

    public function create()
    {
        $weddingPackages = WeddingPackage::all();
        return view('wedding_testimonials.create', compact('weddingPackages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'testimonial' => 'required',
            'wedding_package_id' => 'required|exists:wedding_packages,id',
        ]);

        Testimonial::create($request->all());
        return redirect()->route('wedding-testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $weddingTestimonial)
    {
        $weddingPackages = WeddingPackage::all();
        return view('wedding_testimonials.edit', compact('weddingTestimonial', 'weddingPackages'));
    }

    public function update(Request $request, Testimonial $weddingTestimonial)
    {
        $request->validate([
            'testimonial' => 'required',
            'wedding_package_id' => 'required|exists:wedding_packages,id',
        ]);

        $weddingTestimonial->update($request->all());
        return redirect()->route('wedding-testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $weddingTestimonial)
    {
        $weddingTestimonial->delete();
        return redirect()->route('wedding-testimonials.index')->withSuccess('Testimonial deleted successfully.');
    }
}
