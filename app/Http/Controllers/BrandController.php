<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search', '', true)->trim()->toString();

        $brands = Brand::query()
            ->search($search)
            ->latest()
            ->paginate(10);


        return view('brands.index', [
            'brands' => $brands,
            'search' => $search,
        ]);
    }

    public function create(): View
    {
        return view('brands.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('brands', 'slug')],
            'image' => ['required', 'string', 'max:255'],
        ]);

        Brand::create($validated);

        return redirect()->route('brands.index')->with('status', 'Brand created.');
    }

    public function edit(Brand $brand): View
    {
        return view('brands.edit', [
            'brand' => $brand,
        ]);
    }

    public function update(Request $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('brands', 'slug')->ignore($brand->getKey())],
            'image' => ['required', 'string', 'max:255'],
        ]);

        $brand->update($validated);

        return redirect()->route('brands.index')->with('status', 'Brand updated.');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()->route('brands.index')->with('status', 'Brand deleted.');
    }
}
