<?php

namespace App\Http\Controllers;

use App\Condition;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // Show all products
    public function index(Request $request) {
        $filters = $request->all(); // Retrieve all GET parameters

        $products = Product::latest()->filter(
            request([
                'current_min_bid', 'current_max_bid', 'auction_status', 'condition', 'search'
            ]))

            ->paginate(6);

        return view('products.index', [
            'products' => $products,
            'filters' => $filters
        ]);
    }

    // Show single product
    public function show(Product $product) {
        return view('products.show', [
            'product' => $product
        ]);
    }

    // Show create form
    public function create() {
        return view('products.create');
    }

    // Store new product
    public function store(Request $request) {
        // dd($request->file('photo'));
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'min_bid' => ['required', 'integer'],
            'bid_step' => 'integer',
            'location' => 'required',
            'condition' => ['required', Rule::enum(Condition::class)],
            'starting_datetime' => ['required', 'date', 'after_or_equal:now'],
            'ending_datetime' => ['required', 'date', 'after:starting_datetime'],
        ]);


        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('product-photos', 'public');
        }

        Product::create($formFields);

        return redirect('/')->with('message', 'Product created successfully');
    }

    // Show edit form
    public function edit(Product $product) {
        return view('products.edit', ['product' => $product]);
    }

    // Update product
    public function update(Request $request, Product $product) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'min_bid' => ['required', 'integer'],
            'bid_step' => 'integer',
            'location' => 'required',
            'condition' => ['required', Rule::enum(Condition::class)],
            'starting_datetime' => ['required', 'date'],
            'ending_datetime' => ['required', 'date', 'after:starting_datetime'],
        ]);


        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('product-photos', 'public');
        }

        $product->update($formFields);

        return back()->with('message', 'Product updated successfully');
    }

    // Delete product
    public function delete(Product $product) {
        $product->delete();
        return redirect('/')->with('message', 'Product deleted successfully');
    }
}
