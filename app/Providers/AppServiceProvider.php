<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Basicinfo;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Policymenu;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Addbanner;
use App\Models\Servicepackage;
use App\Models\Comment;
use App\Models\Order;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function($view) {
            if(Auth::id()){

                if (Auth::user()->country=='Bangladesh') {
                    $currency='BDT';
                } else {
                    $currency=Basicinfo::first()->usd_rate;
                }
            }else{
                // 103.217.111.140
                // 93.115.28.181
                $positions = Location::get('93.115.28.181');

			    if ($positions->countryName=='Bangladesh') {
                    $currency='BDT';
                } else {
                    $currency=Basicinfo::first()->usd_rate;
                }
            }


            $view->with('currency', $currency);
        });

        View()->composer('admin.content.adminmaincontent', function ($view) {

            $comments = Comment::join('admins', 'admins.id', '=', 'comments.admin_id')->select('comments.*','admins.name')->get()->reverse();
            $orders = DB::table('orders')->whereIn('orders.status', ['Pending Invoiced', 'Invoiced', 'Stock Out', 'Customer Confirm', 'Request to Return', 'Paid', 'Return','Lost', 'Completed','Delivered', 'Customer On Hold'])
                    ->join('orderproducts', 'orders.id', '=', 'orderproducts.order_id')
                    ->select('orders.status', 'orders.orderDate', 'orderproducts.*', DB::raw('SUM(quantity) as total_amount'))
                    ->groupBy('orderproducts.product_id')->orderBy('total_amount','desc')->get();
            $latestorders = DB::table('orders')->whereIn('orders.status', ['Completed','Pending Invoiced', 'Invoiced', 'Stock Out', 'Customer Confirm', 'Request to Return', 'Paid', 'Return', 'Lost', 'Completed', 'Delivered', 'Customer On Hold'])
                ->join('orderproducts', 'orders.id', '=', 'orderproducts.order_id')
                ->select('orders.status', 'orders.orderDate', 'orderproducts.*', DB::raw('SUM(quantity) as total_amount'))
                ->groupBy('orderproducts.product_id')->orderBy('total_amount', 'desc')->get();

            $view->with([
                'comments' => $comments,
                'orders' =>$orders,
                'latestorders' => $latestorders
            ]);
        });

        View()->composer('webview.partials.header', function ($view) {
            $basicinfo =Basicinfo::select('id','logo')->first();
            $categories =Category::with(['subcategories'=>function ($query) { $query->select('id','sub_category_name','slug','category_id')->where('status','Active');},])->where('status','Active')->select('id','category_name','slug')->get();
            $menus =Menu::where('status','Active')->select('id','menu_name','slug')->get();

            $view->with([
                'basicinfo' => $basicinfo,
                'categories'=>$categories,
                'menus'=>$menus,
            ]);
        });

        View()->composer('backend.partials.sidebar', function ($view) {
            $menus =Menu::select('id','menu_name','slug')->get();

            $view->with([
                'menus'=>$menus,
            ]);
        });

        View()->composer('webview.content.maincontent', function ($view) {

            $categories =Category::with(['subcategories'=>function ($query) { $query->select('id','sub_category_name','slug','category_id')->where('status','Active');},])->where('status','Active')->select('id','category_name','slug')->get();
            $policymenus =Policymenu::where('status','Active')->select('id','policy_menu_name','policy_text')->get();
            $bottombanners =Brand::where('status','Active')->select('id','brand_name','brand_icon')->get();
            $sliders =Slider::where('status','Active')->select('id','slider_small_title','slider_title','slider_text','slider_btn_name','slider_btn_link','slug','slider_image')->get();
            $servicepackages =Servicepackage::where('status','Active')->select('id','servicepackage_name','package_text','roles')->get();
            $topproducts =Product::where('status','Active')->where('top_rated','1')->select('id','ProductName','ProductSlug','ProductSku','ProductRegularPrice','ProductSalePrice','Discount','ProductImage')->latest()->take(20)->get();
            $newproducts =Product::where('status','Active')->select('id','ProductName','ProductSlug','ProductSku','ProductRegularPrice','ProductSalePrice','Discount','ProductImage')->latest()->take(20)->get();
            $adds =Addbanner::where('status','Active')->select('id','add_link','add_image','status')->get();
            $featuredproducts =Product::where('status','Active')->where('frature','0')->select('id','ProductName','ProductSlug','ProductSku','ProductRegularPrice','ProductSalePrice','Discount','ProductImage')->get()->reverse();
            $categoryproducts =Category::with(['products'=>function ($query) { $query->select('id','category_id','ProductName','ProductSlug','ProductSku','ProductRegularPrice','ProductSalePrice','Discount','ProductImage')->where('status','Active');},])->where('status','Active')->select('id','category_name','slug')->get();
            $countproduct=Product::where('status','Active')->select('id','status','ProductName')->get()->count();
            $number=$countproduct/2;
            $bestone=Product::where('status','Active')->select('id','ProductName','ProductSlug','ProductSku','ProductRegularPrice','ProductSalePrice','Discount','ProductImage')->get()->chunk(2);
            $specialdeals=Product::where('status','Active')->select('id','ProductName','ProductSlug','ProductSku','ProductRegularPrice','ProductSalePrice','Discount','ProductImage')->inRandomOrder()->limit(15)->get()->chunk(3);
            $specialoffers=Product::where('status','Active')->where('Discount','>=','10')->select('id','ProductName','ProductSlug','ProductSku','ProductRegularPrice','ProductSalePrice','Discount','ProductImage')->inRandomOrder()->limit(15)->get()->chunk(3);
            $hotoffers=Product::where('status','Active')->where('Discount','>=','20')->select('id','ProductName','ProductSlug','ProductSku','ProductRegularPrice','ProductSalePrice','Discount','ProductImage')->inRandomOrder()->limit(4)->get();

            $view->with([
                'categories'=>$categories,
                'policymenus'=>$policymenus,
                'bottombanners'=>$bottombanners,
                'sliders'=>$sliders,
                'servicepackages'=>$servicepackages,
                'newproducts'=>$newproducts,
                'adds'=>$adds,
                'featuredproducts'=>$featuredproducts,
                'topproducts'=>$topproducts,
                'categoryproducts'=>$categoryproducts,
                'bestone'=>$bestone,
                'specialdeals'=>$specialdeals,
                'specialoffers'=>$specialoffers,
                'hotoffers'=>$hotoffers,
            ]);

        });

        View()->composer('webview.partials.footer', function ($view) {
            $basicinfo =Basicinfo::first();
            $view->with([
                'basicinfo' => $basicinfo,
            ]);
        });



    }
}