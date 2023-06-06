<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Basicinfo;
use Illuminate\Http\Request;

class BasicinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinfo =Basicinfo::first();
        return view('backend.content.basicinfo.index',['webinfo'=>$webinfo]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basicinfo  $basicinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $webinfo =Basicinfo::where('id',$id)->first();
        $webinfo->email=$request-> email;
        $webinfo->usd_rate=$request-> usd_rate;
        $webinfo->phone_one=$request-> phone_one;
        $webinfo->phone_two=$request-> phone_two;
        $webinfo->address=$request-> address;
        if($request->logo){
            if($webinfo->logo =='public/webview/assets/images/logo.png'){
            }else{
                unlink($webinfo->logo);
            }
            $logo = $request->file('logo');
            $name = time() . "_" . $logo->getClientOriginalName();
            $uploadPath = ('public/images/categorybanner/');
            $logo->move($uploadPath, $name);
            $logoImgUrl = $uploadPath . $name;
            $webinfo->logo = $logoImgUrl;
        }
        $webinfo->save();
        return redirect()->back()->with('message','Info updated successfully');
    }

    public function pixelanalytics(Request $request, $id)
    {
        $webinfo =Basicinfo::where('id',$id)->first();
        $webinfo->facebook_pixel=$request->facebook_pixel;
        $webinfo->google_analytics=$request->google_analytics;
        $webinfo->update();
        return redirect()->back()->with('message','Pixel & Analytics updated successfully');
    }
    public function referalinfo(Request $request, $id)
    {
        $webinfo =Basicinfo::where('id',$id)->first();

        if(isset($request->cashback)){
            $webinfo->cashback=$request->cashback;
        }else{
            $webinfo->cashback=0;
        }
        if(isset($request->futurefund)){
            $webinfo->futurefund=$request->futurefund;
        }else{
            $webinfo->futurefund=0;
        }
        if(isset($request->netprofit)){
            $webinfo->netprofit=$request->netprofit;
        }else{
            $webinfo->netprofit=0;
        }
        if(isset($request->globalsales)){
            $webinfo->globalsales=$request->globalsales;
        }else{
            $webinfo->globalsales=0;
        }
        if(isset($request->leadership)){
            $webinfo->leadership=$request->leadership;
        }else{
            $webinfo->leadership=0;
        }
        if(isset($request->office_per)){
            $webinfo->office_per=$request->office_per;
        }else{
            $webinfo->office_per=0;
        }
        if(isset($request->royalty)){
            $webinfo->royalty=$request->royalty;
        }else{
            $webinfo->royalty=0;
        }
        if(isset($request->min_withdrew)){
            $webinfo->min_withdrew=$request->min_withdrew;
        }else{
            $webinfo->min_withdrew=0;
        }
        if(isset($request->referal_percent)){
            $webinfo->referal_percent=$request->referal_percent;
        }else{
            $webinfo->referal_percent=0;
        }

        if(isset($request->charge_convert)){
            $webinfo->charge_convert=$request->charge_convert;
        }else{
            $webinfo->charge_convert=0;
        }

        if(isset($request->charge_withdrew)){
            $webinfo->charge_withdrew=$request->charge_withdrew;
        }else{
            $webinfo->charge_withdrew=0;
        }

        if(isset($request->convert_bonus)){
            $webinfo->convert_bonus=$request->convert_bonus;
        }else{
            $webinfo->convert_bonus=0;
        }

        if(isset($request->first_gen)){
            $webinfo->first_gen=$request->first_gen;
        }else{
            $webinfo->first_gen=0;
        }
        if(isset($request->secound_gen)){
            $webinfo->secound_gen=$request->secound_gen;
        }else{
            $webinfo->secound_gen=0;
        }
        if(isset($request->third_gen)){
            $webinfo->third_gen=$request->third_gen;
        }else{
            $webinfo->third_gen=0;
        }
        if(isset($request->four_gen)){
            $webinfo->four_gen=$request->four_gen;
        }else{
            $webinfo->four_gen=0;
        }
        if(isset($request->fifth_gen)){
            $webinfo->fifth_gen=$request->fifth_gen;
        }else{
            $webinfo->fifth_gen=0;
        }

        if(isset($request->six_gen)){
            $webinfo->six_gen=$request->six_gen;
        }else{
            $webinfo->six_gen=0;
        }
        if(isset($request->seven_gen)){
            $webinfo->seven_gen=$request->seven_gen;
        }else{
            $webinfo->seven_gen=0;
        }
        if(isset($request->eight_gen)){
            $webinfo->eight_gen=$request->eight_gen;
        }else{
            $webinfo->eight_gen=0;
        }
        if(isset($request->nine_gen)){
            $webinfo->nine_gen=$request->nine_gen;
        }else{
            $webinfo->nine_gen=0;
        }
        if(isset($request->point_rate)){
            $webinfo->point_rate=$request->point_rate;
        }else{
            $webinfo->point_rate=0;
        }
        if(isset($request->ten_gen)){
            $webinfo->ten_gen=$request->ten_gen;
        }else{
            $webinfo->ten_gen=0;
        }
        $webinfo->update();
        return redirect()->back()->with('message','Referal & Generation updated successfully');
    }

    public function sociallink(Request $request, $id)
    {
        $webinfo =Basicinfo::where('id',$id)->first();
        if(isset($request->facebook)){
            $webinfo->facebook=$request->facebook;
        }else{
            $webinfo->facebook=null;
        }
        if(isset($request->twitter)){
            $webinfo->twitter=$request->twitter;
        }else{
            $webinfo->twitter=null;
        }
        if(isset($request->google)){
            $webinfo->google=$request->google;
        }else{
            $webinfo->google=null;
        }
        if(isset($request->rss)){
            $webinfo->rss=$request->rss;
        }else{
            $webinfo->rss=null;
        }
        if(isset($request->pinterest)){
            $webinfo->pinterest=$request->pinterest;
        }else{
            $webinfo->pinterest=null;
        }
        if(isset($request->linkedin)){
            $webinfo->linkedin=$request->linkedin;
        }else{
            $webinfo->linkedin=null;
        }
        if(isset($request->youtube)){
            $webinfo->youtube=$request->youtube;
        }else{
            $webinfo->youtube=null;
        }
        $webinfo->update();
        return redirect()->back()->with('message','Social Links updated successfully');
    }

     public function shippinginfo(Request $request, $id)
    {
        $webinfo =Basicinfo::where('id',$id)->first();
        if(isset($request->inside_dhaka_charge)){
            $webinfo->inside_dhaka_charge=$request->inside_dhaka_charge;
        }else{
            $webinfo->inside_dhaka_charge=null;
        }
        if(isset($request->outside_dhaka_charge)){
            $webinfo->outside_dhaka_charge=$request->outside_dhaka_charge;
        }else{
            $webinfo->outside_dhaka_charge=null;
        }
        if(isset($request->insie_dhaka)){
            $webinfo->insie_dhaka=$request->insie_dhaka;
        }else{
            $webinfo->insie_dhaka=null;
        }
        if(isset($request->outside_dhaka)){
            $webinfo->outside_dhaka=$request->outside_dhaka;
        }else{
            $webinfo->outside_dhaka=null;
        }
        if(isset($request->cash_on_delivery)){
            $webinfo->cash_on_delivery=$request->cash_on_delivery;
        }else{
            $webinfo->cash_on_delivery=null;
        }
        if(isset($request->refund_rule)){
            $webinfo->refund_rule=$request->refund_rule;
        }else{
            $webinfo->refund_rule=null;
        }
        if(isset($request->contact)){
            $webinfo->contact=$request->contact;
        }else{
            $webinfo->contact=null;
        }
        $webinfo->update();
        return redirect()->back()->with('message','Shipping info updated successfully');
    }


     public function tms(Request $request, $id)
    {
        $webinfo =Basicinfo::where('id',$id)->first();
        if(isset($request->tms)){
            $webinfo->tms=$request->tms;
        }else{
            $webinfo->tms=null;
        }
        $webinfo->update();
        return redirect()->back()->with('message','TMS info updated successfully');
    }

    public function affiliate(Request $request, $id)
    {
        $webinfo =Basicinfo::where('id',$id)->first();
        if(isset($request->affiliate)){
            $webinfo->affiliate=$request->affiliate;
        }else{
            $webinfo->affiliate=null;
        }
        $webinfo->update();
        return redirect()->back()->with('message','Affiliate info updated successfully');
    }
    public function TeamWork(Request $request, $id)
    {
        $webinfo =Basicinfo::where('id',$id)->first();
        if(isset($request->team_work)){
            $webinfo->team_work=$request->team_work;
        }else{
            $webinfo->team_work=null;
        }
        $webinfo->update();
        return redirect()->back()->with('message','Team Work info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basicinfo  $basicinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basicinfo $basicinfo)
    {
        //
    }
}