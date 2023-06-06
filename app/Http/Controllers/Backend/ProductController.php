<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Attrvalue;
use App\Models\Attribute;
use App\Models\Subcategory;
use App\Models\Stock;
use App\Models\Purchase;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes=Attrvalue::where('attribute_id',2)->where('status','Active')->get();
        $colors=Attrvalue::where('attribute_id',3)->where('status','Active')->get();
        $weights=Attrvalue::where('attribute_id',1)->where('status','Active')->get();
        $categories =Category::where('status','Active')->select('id','category_name','status')->get();
        $subcategories =Subcategory::where('status','Active')->select('id','sub_category_name')->get();
        return view('backend.content.product.index',['weights'=>$weights,'colors'=>$colors,'sizes'=>$sizes,'categories'=>$categories,'subcategories'=>$subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusupdate(Request $request)
    {
        $product=Product::where('id',$request->product_id)->first();
        $product->status=$request->status;
        $product->update();
        return response()->json($product, 200);
    }

    public function featurestatusupdate(Request $request)
    {
        $product=Product::where('id',$request->product_id)->first();
        $product->frature=$request->frature;
        $product->update();
        return response()->json($product, 200);
    }

    public function ratedstatusupdate(Request $request)
    {
        $product=Product::where('id',$request->product_id)->first();
        $product->top_rated=$request->top_rated;
        $product->update();
        return response()->json($product, 200);
    }

    public function beststatusupdate(Request $request)
    {
        $product=Product::where('id',$request->product_id)->first();
        $product->best_selling=$request->best;
        $product->update();
        return response()->json($product, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->ProductName = $request->ProductName;
        $product->ProductBreaf = $request->ProductBreaf;
        $product->ProductDetails = $request->ProductDetails;
        $product->ProductSku = $this->sku();
        $product->ProductRegularPrice = $request->ProductRegularPrice;
        $product->bonus_point=$request->bonus_point;
        $product->Discount=$request->Discount;
        $percent=($request->Discount/100);
        $discountamount =($request->ProductRegularPrice*$percent);
        $product->ProductSalePrice=($request->ProductRegularPrice-$discountamount);
        $product->category_id= $request->category_id;
        $product->subcategory_id= $request->subcategory_id;
        $product->shop_id= Auth::guard('admin')->user()->id;

        if ($request->color) {
            $product->color = json_encode($request->color);
        }
        if ($request->size) {
            $product->size = json_encode($request->size);
        }
        if ($request->weight) {
            $product->weight = json_encode($request->weight);
        }

        $time = microtime('.') * 10000;

        $productImg = $request->file('ProductImage');
        if($productImg){
            $imgname = $time . $productImg->getClientOriginalName();
            $imguploadPath = ('public/images/product/image/');
            $productImg->move($imguploadPath, $imgname);
            $productImgUrl = $imguploadPath . $imgname;
            $product->ProductImage = $productImgUrl;
            $webp = $productImgUrl;
            $im = imagecreatefromstring(file_get_contents($webp));
            $new_webp = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $webp);
            imagewebp($im, $new_webp, 50);
            $product->ViewProductImage = $new_webp;
        }

        if ($request->hasFile('PostImage')) {
            foreach ($request->file('PostImage') as $imgfiles) {
                $name = time() . "_" . $imgfiles->getClientOriginalName();
                $imgfiles->move(public_path() . '/images/product/slider/', $name);
                $imageData[] = $name;
            }
            $product->PostImage = json_encode($imageData);
        };

        $result=$product->save();

        if ($result) {
            $latestStock = new Stock();
            $latestStock->product_id = $product->id;
            $latestStock->purchase = 0;
            $latestStock->stock = 100;
            $latestStock->save();
            $purchase = new Purchase();
            $purchase->date = date('Y-m-d');
            $purchase->invoiceID = date('Y-m-d');
            $purchase->product_id = $product->id;
            $purchase->supplier_id = 1;
            $purchase->quantity = 100;
            $purchase->save();
        }

        return redirect()->back()->with('message','Product save successfully');
    }

    public function sku()
    {
        $lastProduct = Product::latest('id')->first();
        if ($lastProduct) {
            $ProductID = $lastProduct->id + 1;
        } else {
            $ProductID = 1;
        }

        return 'AB#000' . $ProductID;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productdata()
    {
        $products = Product::where('shop_id',Auth::guard('admin')->user()->id)->get();
        return Datatables::of($products)
            ->addColumn('action', function ($products) {
                return '<a href="#" type="button" id="editProductBtn" data-id="' . $products->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainProduct" style="margin-bottom:2px;"><i class="bi bi-pencil-square"></i></a>
                <a href="#" type="button" style="margin-bottom:2px;" id="deleteProductBtn" data-id="' . $products->id . '" class="btn btn-danger btn-sm" ><i class="bi bi-archive" ></i></a>';
            })

            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::where('id',$id)->first();
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id',$id)->first();
        $product->ProductName = $request->ProductName;
        $product->ProductBreaf = $request->ProductBreaf;
        $product->ProductDetails = $request->ProductDetails;
        $product->bonus_point=$request->bonus_point;
        $product->ProductRegularPrice = $request->ProductRegularPrice;
        $product->Discount=$request->Discount;
        $percent=($request->Discount/100);
        $discountamount =($request->ProductRegularPrice*$percent);
        $product->ProductSalePrice=($request->ProductRegularPrice-$discountamount);
        $product->category_id= $request->category_id;
        $product->subcategory_id= $request->subcategory_id;
        $product->shop_id= Auth::guard('admin')->user()->id;

        if ($request->color) {
            $product->color = json_encode($request->color);
        }
        if ($request->size) {
            $product->size = json_encode($request->size);
        }
        if ($request->weight) {
            $product->weight = json_encode($request->weight);
        }

        $time = microtime('.') * 10000;

        $productImg = $request->file('ProductImage');

        if($productImg){
           // unlink($product->ProductImage);
            //unlink($product->ViewProductImage);
            $imgname = $time . $productImg->getClientOriginalName();
            $imguploadPath = ('public/images/product/image/');
            $productImg->move($imguploadPath, $imgname);
            $productImgUrl = $imguploadPath . $imgname;
            $product->ProductImage = $productImgUrl;
            $webp = $productImgUrl;
            $im = imagecreatefromstring(file_get_contents($webp));
            $new_webp = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $webp);
            imagewebp($im, $new_webp, 50);
            $product->ViewProductImage = $new_webp;
        }

        if ($request->hasFile('PostImage')) {
            if($product->PostImage){
                foreach (json_decode($product->PostImage) as $postimg) {
                   // unlink('public/images/product/slider/' . $postimg);
                }
            }
            foreach ($request->file('PostImage') as $imgfiles) {
                $name = time() . "_" . $imgfiles->getClientOriginalName();
                $imgfiles->move(public_path() . '/images/product/slider/', $name);
                $imageData[] = $name;
            }
            $product->PostImage = json_encode($imageData);
        }

        $product->save();

        if($product){
            return response()->json($product, 200);
        }else{
            return response()->json('error', 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function create()
    {
        $sizes=Attrvalue::where('attribute_id',2)->where('status','Active')->get();
        $colors=Attrvalue::where('attribute_id',3)->where('status','Active')->get();
        $weights=Attrvalue::where('attribute_id',1)->where('status','Active')->get();
        $categories =Category::where('status','Active')->select('id','category_name','status')->get();
        $subcategories =Subcategory::where('status','Active')->select('id','sub_category_name')->get();
        return view('backend.content.product.create',['weights'=>$weights,'colors'=>$colors,'sizes'=>$sizes,'categories'=>$categories,'subcategories'=>$subcategories]);
    }
}