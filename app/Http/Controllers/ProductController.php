<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\ProductImport;
use App\Models\Export\ProductExport;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|unique:products', 
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'descriptions' => 'nullable',
            'thumbnail' => 'required|image|max:2048', 
            'image' => 'nullable|image|max:5120', 
            'stock' => 'required|integer|min:0', 
            'option_ids' => 'nullable|array', 
        ]);

        $validatedData = $request->all();

        if ($request->hasFile('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('public/products/thumbnails'); 
        }
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('public/products/images');
        }

        $product = new Product();
        $product->sku=$validatedData['sku'];
        $product->name=$validatedData['name'];
        $product->price=$validatedData['price'];
        $product->weight=$validatedData['weight'];
        $product->descriptions=$validatedData['descriptions'];
        $product->thumbnail=$validatedData['thumbnail'];
        $product->image=$validatedData['image'];
        $product->stock=$validatedData['stock'];
        $product->category=$validatedData['category'];
        $product->create_date=now();
        $product->save();

        // Attach Categories and Options (if applicable)
        if (isset($validatedData['category_id'])) {
            $product->categories()->attach($validatedData['category_id']);
        }

        if (isset($validatedData['option_ids']) && is_array($validatedData['option_ids'])) {
            $product->options()->attach($validatedData['option_ids']);
        }

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product=Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);
        return response()->json(null,204);
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt,xlsx|max:2048',
        ]);

        Excel::import(new ProductImport, $request->file('file'));

        return back()->with('success', 'Products imported successfully.');
    }
    public function export()
    {
        return Excel::download(new ProductExport,'products.xls');
    }
}