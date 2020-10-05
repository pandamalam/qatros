<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function loadData()
    {
        $product = Product::all();
        return response()->json($product);
    }

    public function search(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $products = Product::where('item_code', 'LIKE', '%'.$cari.'%')->orWhere('item_name', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($products);
        }
    }

    public function detail($item_code)
    {
            $product = Product::findOrFail($item_code);
            return response()->json($product);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|string|unique:products,item_name',
            ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'Failed to create product, item name cant be duplicate'
            ]);
        }else{
            $product = New Product;
            $product->item_code = Str::random(12);
            $product->item_name = $request->item_name;
            $product->item_description = $request->item_description;
            $product->save();
            if($product) {
                return response()->json([
                    'message' => 'Product created',
                    'data' => $product
                ], 200);
            }
        }
    }

    public function update(Request $request, $item_code){
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|string|unique:products,item_name',
            ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'Failed to create product, item name cant be duplicate'
            ]);
        }else{
            $product = Product::findOrFail($item_code);
            $product->item_name = $request->item_name;
            $product->item_description = $request->item_description;
            $product->save();
            if($product) {
                return response()->json([
                    'message' => 'Product Updated',
                    'data' => $product
                ], 200);
            }
        }
    }

    public function delete(Request $request){
        $product = Product::where('item_code', $request->item_code)->firstOrFail();
        $product->delete();

        if($product) {
            return response()->json([
                'message' => 'Product deleted',
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to delete product'
            ]);
        }
    }
}
