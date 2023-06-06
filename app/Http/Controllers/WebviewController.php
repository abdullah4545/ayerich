<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Bonusinfo;
use App\Models\User;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Attrvalue;
use App\Models\Basicinfo;
use App\Models\Order;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class WebviewController extends Controller
{
        public function transferfound($slug){
            if($slug =='referral'){
                return view('webview.user.transfer.referral');
            }elseif($slug =='teammate'){
                return view('webview.user.transfer.teammate');
            }elseif($slug =='global'){
                return view('webview.user.transfer.global');
            }elseif($slug =='group'){
                return view('webview.user.transfer.group');
            }elseif($slug =='leadership'){
                return view('webview.user.transfer.leadership');
            }elseif($slug =='purchase'){
                return view('webview.user.transfer.purchase');
            }elseif($slug =='royalty'){
                return view('webview.user.transfer.royalty');
            }elseif($slug =='main'){
                return view('webview.user.transfer.main');
            }else{

            }
        }

        public function wallets(){
            return view('auth.wallets');
        }

        public function trincome(){
            return view('auth.trincome');
        }

        public function genology($id){
            $bonusinfos=Bonusinfo::where('order_id',$id)->get();
            return view('auth.genology',['bonusinfos'=>$bonusinfos]);
        }

        public function trleader(){
            return view('auth.trleader');
        }

        public function trgroup(){
            return view('auth.trgroup');
        }

        public function referraluser(){
            $referid=Auth::guard('web')->user()->my_referral_id;
            $myreferusers=User::where('referral_by',$referid)->get();
            return view('auth.referraluser',['myreferusers'=>$myreferusers]);
        }

        public function generationuser(){
            return view('auth.genuser');
        }

        public function updaterankreq(){
            $id=Auth::user()->id;
            $userprofile=User::findOrfail($id);
            $userprofile->profile_update_request=1;
            $userprofile->update();
            return redirect()->back()->with('success','Update Request Send.....');
        }

        public function profile(){
            $id=Auth::user()->id;
            $userprofile=User::findOrfail($id);
            return view('auth.profile',['userprofile'=>$userprofile]);
        }

        public function userorderdetails($id){
            $orders=Order::with(['customers','orderproducts','couriers','cities','zones','admins'])->where('invoiceID',$id)->first();
            return view('webview.content.cart.details',['orders'=>$orders]);
        }

        public function updateprofile(Request $request){
            $time = microtime('.') * 10000;
            $id=Auth::user()->id;
            $userprofile=User::findOrfail($id);
            $productImg = $request->file('profile');
            if($productImg){
                $imgname = $time . $productImg->getClientOriginalName();
                $imguploadPath = ('public/images/user/profile/');
                $productImg->move($imguploadPath, $imgname);
                $productImgUrl = $imguploadPath . $imgname;
                $userprofile->profile = $productImgUrl;
            }

            $productImgnid = $request->file('nid_font');
            if($productImgnid){
                $imgnamenid = $time . $productImgnid->getClientOriginalName();
                $imguploadPathnid = ('public/images/user/nid/');
                $productImgnid->move($imguploadPathnid, $imgnamenid);
                $productImgUrlnid = $imguploadPathnid . $imgnamenid;
                $userprofile->nid_font = $productImgUrlnid;
            }

            $userprofile->save();
            return redirect()->back()->with('message','Profile update successfully');
        }

        public function orderhistory(){
            $date =\Carbon\Carbon::now();
            $orders =  Order::with(
            [
                'orderproducts'=>function ($query) { $query->select('id','order_id','productName','quantity','color','size');},
                'comments'=> function ($query) { $query->select('id', 'order_id', 'comment','admin_id','status','created_at')->where('status',0);},
            ])->where('user_id', Auth::guard('web')->user()->id)
            ->join('customers', 'customers.order_id', '=', 'orders.id')
            ->select('orders.*', 'customers.customerPhone', 'customers.customerName', 'customers.customerAddress')
            ->get()->reverse();
            return view('auth.orderhistory',['date'=>$date,'orders'=>$orders]);
        }
        public function index($slug){
            if($slug=='investor_relation'){
                $title='Investor Relation';
            }else{

            }

            $value=Information::where('key',$slug)->first();
            return view('webview.content.information.info',['title'=>$title,'slug'=>$slug,'value'=>$value]);
        }

        public function company(){
            $title='Company';
            $value=Information::where('key','company')->first();
            return view('webview.content.information.company',['title'=>$title,'value'=>$value]);
        }

        public function about_us(){
            $title='About US';
            $value=Information::where('key','about_us')->first();
            return view('webview.content.information.about_us',['title'=>$title,'value'=>$value]);
        }

        public function help_center(){
            $title='Help Center';
            $value=Information::where('key','help_center')->first();
            return view('webview.content.information.help_center',['title'=>$title,'value'=>$value]);
        }

        public function customer_service(){
            $title='Customer Service';
            $value=Information::where('key','customer_service')->first();
            return view('webview.content.information.customer_service',['title'=>$title,'value'=>$value]);
        }

        public function shopping_guide(){
            $title='Shopping Guide';
            $value=Information::where('key','shipping_guide')->first();
            return view('webview.content.information.shopping_guide',['title'=>$title,'value'=>$value]);
        }

        public function contact_us(){
            $title='Contact US';
            $value=Information::where('key','contact_us')->first();
            return view('webview.content.information.contact_us',['title'=>$title,'value'=>$value]);
        }

        public function faq(){
            $title='FAQ';
            $value=Information::where('key','faq')->first();
            return view('webview.content.information.faq',['title'=>$title,'value'=>$value]);
        }

        public function terms_codition(){
            $title='TERMS & CONDITIONS';
            $value=Information::where('key','terms_codition')->first();
            return view('webview.content.information.terms_codition',['title'=>$title,'value'=>$value]);
        }


         public function whatWeOffer(){
          return view('webview.content.information.whatoffer');
        }




        public function shops()
        {
            $shops=Admin::where('type','Shop')->get();
            return view('webview.content.shop.shops',['shops'=>$shops]);
        }

        public function shopproduct($shopid)
        {
            $shopproducts=Product::where('shop_id',$shopid)->get();
            return view('webview.content.shop.shopproduct',['shopproducts'=>$shopproducts]);
        }

        public function productdetails($slug){
            $shipping =Basicinfo::first();
            $productdetails=Product::where('ProductSlug',$slug)->first();
            $relatedproducts=Product::where('subcategory_id',$productdetails->subcategory_id)->inRandomOrder()->limit(15)->get();
            $hotproducts=Product::where('status','Active')->where('category_id',$productdetails->category_id)->where('Discount','>=','20')->select('id','ProductName','ProductSlug','ProductSku','ProductRegularPrice','ProductSalePrice','Discount','ProductImage')->inRandomOrder()->limit(4)->get();
            return view('webview.content.product.details',['shipping'=>$shipping,'hotproducts'=>$hotproducts,'relatedproducts'=>$relatedproducts,'productdetails'=>$productdetails]);
        }

        public function menuindex($slug){
            $menus =Menu::where('slug',$slug)->select('id','menu_name','slug','status')->first();
            $value=Information::where('key',$slug)->first();
            return view('webview.content.information.menuinfo',['menus'=>$menus,'value'=>$value]);
        }

        public function categoryproduct($slug){
            $sizes=Attrvalue::where('attribute_id',2)->where('status','Active')->get();
            $colors=Attrvalue::where('attribute_id',3)->where('status','Active')->get();
            $weights=Attrvalue::where('attribute_id',1)->where('status','Active')->get();
            $categories =Category::with(['subcategories'=>function ($query) { $query->select('id','sub_category_name','slug','category_id')->where('status','Active');},])->where('status','Active')->select('id','category_name','slug')->get();
            $categorysingle=Category::where('slug',$slug)->select('id','category_name','slug','status')->first();
            $categoryproducts=Product::where('category_id',$categorysingle->id)->get();
            return view('webview.content.product.category',['weights'=>$weights,'colors'=>$colors,'sizes'=>$sizes,'categories'=>$categories,'categorysingle'=>$categorysingle]);
        }

        public function getcategoryproduct(Request $request){
            $category=Category::where('slug',$request->category)->select('id','category_name','slug','status')->first();
            if(isset($request->price_range)){
                $num=preg_split("/[,]/",$request->price_range);
                $categoryproducts=Product::where('category_id',$category->id)->whereBetween('ProductSalePrice',$num)->get();
            }else{
                $categoryproducts=Product::where('category_id',$category->id)->get();
            }
            return view('webview.content.product.view',['categoryproducts'=>$categoryproducts,'category'=>$category]);
        }

        public function getsubcategoryproduct(Request $request){
            $subcategory=Subcategory::where('slug',$request->subcategory)->select('id','sub_category_name','slug','status')->first();
            if(isset($request->price_range)){
                $num=preg_split("/[,]/",$request->price_range);
                $subcategoryproducts=Product::where('subcategory_id',$subcategory->id)->whereBetween('ProductSalePrice',$num)->get();
            }else{
                $subcategoryproducts=Product::where('subcategory_id',$subcategory->id)->get();
            }
            return view('webview.content.product.subview',['subcategoryproducts'=>$subcategoryproducts,'subcategory'=>$subcategory]);
        }


        public function subcategoryproduct($slug){
            $sizes=Attrvalue::where('attribute_id',2)->where('status','Active')->get();
            $colors=Attrvalue::where('attribute_id',3)->where('status','Active')->get();
            $weights=Attrvalue::where('attribute_id',1)->where('status','Active')->get();
            $categories =Category::with(['subcategories'=>function ($query) { $query->select('id','sub_category_name','slug','category_id')->where('status','Active');},])->where('status','Active')->select('id','category_name','slug')->get();
            $subcategorysingle=Subcategory::where('slug',$slug)->select('id','sub_category_name','slug','category_id','status')->first();
            return view('webview.content.product.subcategory',['categories'=>$categories,'weights'=>$weights,'colors'=>$colors,'sizes'=>$sizes,'subcategorysingle'=>$subcategorysingle]);
        }


        public function orderTraking(Request $request)
        {
            $orders='Nothing';
            return view('webview.content.cart.trackorder',['orders'=>$orders]);
        }

        public function orderTrakingNow(Request $request)
        {
            $orders=Order::with(['customers','orderproducts','couriers','cities','zones','admins'])->where('invoiceID',$request->invoiceID)->first();
            return view('webview.content.cart.trackorder',['orders'=>$orders]);
        }


        public function Tms(){
            $tms=Basicinfo::first();
            return view('webview.content.information.tms',['tms'=>$tms]);
        }

        public function affiliate(){
            $affiliate=Basicinfo::first();
            return view('webview.content.information.affiliate',['affiliate'=>$affiliate]);
        }

        public function teamWork(){
            $teamWork=Basicinfo::first();
            return view('webview.content.information.teamwork',['teamWork'=>$teamWork]);
        }


        public function UserShop(){
            $product=Product::where('status','Active')->get();
            return view('webview.user.shop', ['product'=>$product]);
        }

}