<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\brands;
use App\Models\categories;
use App\Models\products;
use App\Models\product_colors;
use App\Models\product_images;
use App\Models\product_prices;
use App\Models\product_sizes;
use App\Models\suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::with('Colors')->with('Images')->with('Price')->with('Categories')->with('Brands')->with('supplier')->where('is_active', 1)->get();
        $categories = categories::where('is_active', 1)->get();
        $brands = brands::where('is_active', 1)->get();
        $suppliers = suppliers::where('is_active', 1)->get();
        $colors = DB::table('product_colors')->select('product_colors.color')->distinct()->get();
        return ['products' => $products, 'categories' => $categories, 'brands' => $brands, 'colors' => $colors, 'suppliers' => $suppliers];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNew()
    {
        return products::with('Colors')->with('Images')->with('Price')->with('Categories')->with('Brands')->with('supplier')->where('is_active', 1)->orderBy('created_at', 'desc')->limit(10)->get();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSeller()
    {
        return products::with('Colors')->with('Images')->with('Price')->with('Categories')->with('Brands')->with('supplier')->join('order_details', 'order_details.product_id', '=', 'products.id')->where('is_active', 1)->limit(10)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function uploadFile(Request $request) {
        $type = $request->type;
        $data = $request->file('file');
        $filename = $request->file('file')->getClientOriginalName();
        $path = public_path('/assets/img/products/');
        $data->move($path, $filename);
        return response()->json([
            'success' => 'done',
            'valueimg'=>$data ]);
    }
    
    public function uploadFiles(Request $request) {
        $type = $request->type;
        $i = 0;
        $result = [];
        do{
            $data = $request->file('file' . $i);
            $filename = $request->file('file' . $i)->getClientOriginalName();
            $path = public_path('/assets/img/products/');
            $data->move($path, $filename);
            array_push($result, $data);
            $i++;
        }while($request->file('file' . $i));
        return response()->json([
            'success' => 'done',
            'valueimg'=>$result ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new products();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->brand_id = $request->brand_id;
        $product->made_in = $request->made_in;
        $product->gender = $request->gender;
        $product->save();

        $price = new product_prices();
        if($request->price)
            $price->insertPrice($request->price['price_origin'], $product->id);
        
        $color = new product_colors();
        $size = new product_sizes();
        $image = new product_images();
        $colors = $request->colors ?? [];
        foreach ($colors as $item) {
            $tmpColor = $color->insertColor($item, $product->id);
            // print_r($item);
            $sizes = $item['sizes'] ?? [];
            $images = $item['images'] ?? [];
            foreach ($sizes as $s) {
                $size->insertSize($s, $tmpColor->id);
            }
            foreach ($images as $i) {
                $image->insertImage($i, $tmpColor->id);
            }
        }

        return $this->show($product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return products::with('Colors')->with('Images')->with('Price')->with('Sizes')->with('Categories')->with('Brands')->with('supplier')->where('is_active', 1)->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = products::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->brand_id = $request->brand_id;
        $product->made_in = $request->made_in;
        $product->gender = $request->gender;
        $product->save();

        $price = new product_prices();
        $price_id = $request->price['id'] ?? null;
        if($price_id) $price->updatePrice($request->price, $price_id);
        else $price->insertPrice($request->price['price_origin'] ?? 0, $id);

        $color = new product_colors();
        $size = new product_sizes();
        $image = new product_images();

        $colors = $request->colors;
        foreach ($colors as $c) {
            $color_id = $c['id'] ?? null;
            if($color_id) {
                $color->updateColor($c, $color_id);
            }
            else {
                $color_id = $color->insertColor($c, $id)->id;
            }

            $sizes = $c['sizes'] ?? [];
            $images = $c['images'] ?? [];

            foreach ($sizes as $s) {
                $size_id = $s['id'] ?? null;
                if($size_id) 
                    $size->updateSize($s, $size_id);
                else
                    $size->insertSize($s, $color_id);
            }

            foreach ($images as $i) {
                $image_id = $i['id'] ?? null;
                if($image_id) 
                    $image->updateImage($i, $image_id);
                else
                    $image->insertImage($i, $color_id);
            }
        }

        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = products::findOrFail($id);
        $product->is_active = 0;
        $product->save();

        $price = product_prices::where('product_id', $id)->first();
        if($price) {
            (new product_prices())->destroyPrice($price->id);
            // $price->is_active = 0;
            // $price->save();
        }

        $colors = product_colors::where('product_id', $id)->get();
        if($colors) {
            foreach($colors as $color) {
                $color->is_active = 0;
                $color->save();

                $sizes = product_sizes::where('product_color_id', $color->id)->get();
                $images = product_images::where('product_color_id', $color->id)->get();
                if($sizes) {
                    foreach($sizes as $size) {
                        $size->is_active = 0;
                        $size->save();
                    }
                }

                if($images) {
                    foreach($images as $image) {
                        $image->is_active = 0;
                        $image->save();
                    }
                }
            }
        }


        return "Successfully deleted";
    }
}
