<?php

namespace App\Http\Controllers;

use App\Models\Foundtransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Bonusinfo;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use DataTables;
use PDF;

class FoundtransferController extends Controller
{
    // Referral Wallet
    public function viewreport(){
        return view('webview.user.transfer.viewreport');
    }

    public function downloadreport(Request $request){

        $transfers = Foundtransfer::where('from',$request['wallet'])->where('user_id',Auth::user()->id)->whereBetween('foundtransfers.created_at',[$request['startDate'] . ' 00:00:00', $request['endDate'] . ' 23:59:59'])->get();
        $data = [
            'transfers' => $transfers,
            'request' =>$request
        ];

        $pdf = PDF::loadView('foundtransferdatapdf', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }

    public function viewreportdata(Request $request){
        $transfer = Foundtransfer::where('from',$request['wallet'])->where('user_id',Auth::user()->id)->whereBetween('foundtransfers.created_at',[$request['startDate'] . ' 00:00:00', $request['endDate'] . ' 23:59:59'])->get()->reverse();
        return Datatables::of($transfer)
            ->addColumn('date', function ($transfer) {
                return $transfer->created_at->format('Y-m-d');;
            })
            ->make(true);
    }

    public function viewincomereport(){
        return view('webview.user.transfer.viewincomereport');
    }

    public function viewincomereportdata(Request $request){

        $bonusinfos = Bonusinfo::where('bonus_name',$request['income_type'])->where('user_id',Auth::user()->id)->whereBetween('bonusinfos.created_at',[$request['startDate'] . ' 00:00:00', $request['endDate'] . ' 23:59:59'])->get();
        return Datatables::of($bonusinfos)
            ->addColumn('date', function ($bonusinfos) {
                return $bonusinfos->created_at->format('Y-m-d');
            })
            ->addColumn('orderid', function ($bonusinfos) {
                return $bonusinfos->id.' <br> Invoice : '.Order::where('id',$bonusinfos->order_id)->first()->invoiceID;
            })
            ->escapeColumns([])->make(true);
    }

    public function downloadincomereport(Request $request){

        $bonusinfos = Bonusinfo::where('bonus_name',$request['income_type'])->where('user_id',Auth::user()->id)->whereBetween('bonusinfos.created_at',[$request['startDate'] . ' 00:00:00', $request['endDate'] . ' 23:59:59'])->get();
        $data = [
            'bonusinfos' => $bonusinfos,
            'request' =>$request
        ];

        $pdf = PDF::loadView('incomedatapdf', $data);

        return $pdf->download('incomereport.pdf');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function main(Request $request)
    {
         $user=User::where('id',Auth::guard('web')->user()->id)->first();
        if(!Hash::check($request->password, $user->password)){
            return response()->json('error',200);
        }else{
            if($user->main_balance>=$request->amount){
                $transfer =new Foundtransfer();
                $transfer->user_id=Auth::guard('web')->user()->id;
                $transfer->amount=$request->transfer_amount;
                $transfer->from='Main Balance';
                $transfer->to=$request->to;
                $result=$transfer->save();
                if($result){
                    $user->main_balance= $user->main_balance-$request->transfer_amount;
                    $amountdeduct=intVal($request->transfer_amount)*(\App\Models\Basicinfo::first()->convert_bonus/100);
                    $amount=$request->transfer_amount+$amountdeduct;
                    $user->my_balance= $user->my_balance+$amount;
                    $user->update();
                }
            }else{
                return response()->json('lessblance', 200);
            }

        }
        return response()->json('success', 200);
    }

    public function maindata(Request $request)
    {
        $transfer = Foundtransfer::where('from','Main Balance')->where('user_id',Auth::user()->id)->get()->reverse();
        return Datatables::of($transfer)
            ->addColumn('date', function ($transfer) {
                return $transfer->created_at->format('Y-m-d');;
            })
            ->make(true);
    }

    public function referral(Request $request)
    {
         $user=User::where('id',Auth::guard('web')->user()->id)->first();
        if(!Hash::check($request->password, $user->password)){
            return response()->json('error',200);
        }else{
            if($user->referal_bonus>=$request->amount){
                $transfer =new Foundtransfer();
                $transfer->user_id=Auth::guard('web')->user()->id;
                $transfer->amount=$request->transfer_amount;
                $transfer->from='Referral Wallet';
                $transfer->to=$request->to;
                $result=$transfer->save();
                if($result){
                    $user->referal_bonus= $user->referal_bonus-$request->transfer_amount;
                    $amountdeduct=intVal($request->transfer_amount)*(\App\Models\Basicinfo::first()->charge_convert/100);
                    $amount=$request->transfer_amount-$amountdeduct;
                    if($request->to=='Main Balance'){
                        $user->main_balance= $user->main_balance+$amount;
                    }else{
                        $user->my_balance= $user->my_balance+$amount;
                    }
                    $user->update();
                }
            }else{
                return response()->json('lessblance', 200);
            }

        }
        return response()->json('success', 200);
    }

    public function referraldata(Request $request)
    {
        $transfer = Foundtransfer::where('from','Teammate Wallet')->where('user_id',Auth::user()->id)->get()->reverse();
        return Datatables::of($transfer)
            ->addColumn('date', function ($transfer) {
                return $transfer->created_at->format('Y-m-d');;
            })
            ->make(true);
    }

    public function teammate(Request $request)
    {
        $user=User::where('id',Auth::guard('web')->user()->id)->first();
        if(!Hash::check($request->password, $user->password)){
            return response()->json('error',200);
        }else{
            if($user->generation_bonus>=$request->amount){
                $transfer =new Foundtransfer();
                $transfer->user_id=Auth::guard('web')->user()->id;
                $transfer->amount=$request->transfer_amount;
                $transfer->from='Teammate Wallet';
                $transfer->to=$request->to;
                $result=$transfer->save();
                if($result){
                    $user->generation_bonus= $user->generation_bonus-$request->transfer_amount;
                    $amountdeduct=intVal($request->transfer_amount)*(\App\Models\Basicinfo::first()->charge_convert/100);
                    $amount=$request->transfer_amount-$amountdeduct;
                    if($request->to=='Main Balance'){
                        $user->main_balance= $user->main_balance+$amount;
                    }else{
                        $user->my_balance= $user->my_balance+$amount;
                    }
                    $user->update();
                }
            }else{
                return response()->json('lessblance', 200);
            }

        }
        return response()->json('success', 200);
    }

    public function teammatedata(Request $request)
    {
        $transfer = Foundtransfer::where('from','Teammate Wallet')->where('user_id',Auth::user()->id)->get()->reverse();
        return Datatables::of($transfer)
            ->addColumn('date', function ($transfer) {
                return $transfer->created_at->format('Y-m-d');;
            })
            ->make(true);
    }

    public function global(Request $request)
    {
         $user=User::where('id',Auth::guard('web')->user()->id)->first();
        if(!Hash::check($request->password, $user->password)){
            return response()->json('error',200);
        }else{
            if($user->global_salse_commission>=$request->amount){
                $transfer =new Foundtransfer();
                $transfer->user_id=Auth::guard('web')->user()->id;
                $transfer->amount=$request->transfer_amount;
                $transfer->from='Global Wallet';
                $transfer->to=$request->to;
                $result=$transfer->save();
                if($result){
                    $user->global_salse_commission= $user->global_salse_commission-$request->transfer_amount;
                    $amountdeduct=intVal($request->transfer_amount)*(\App\Models\Basicinfo::first()->charge_convert/100);
                    $amount=$request->transfer_amount-$amountdeduct;
                    if($request->to=='Main Balance'){
                        $user->main_balance= $user->main_balance+$amount;
                    }else{
                        $user->my_balance= $user->my_balance+$amount;
                    }
                    $user->update();
                }
            }else{
                return response()->json('lessblance', 200);
            }

        }
        return response()->json('success', 200);
    }

    public function globaldata(Request $request)
    {
        $transfer = Foundtransfer::where('from','Global Wallet')->where('user_id',Auth::user()->id)->get()->reverse();
        return Datatables::of($transfer)
            ->addColumn('date', function ($transfer) {
                return $transfer->created_at->format('Y-m-d');;
            })
            ->make(true);
    }

    public function group(Request $request)
    {
         $user=User::where('id',Auth::guard('web')->user()->id)->first();
        if(!Hash::check($request->password, $user->password)){
            return response()->json('error',200);
        }else{
            if($user->group_bonus>=$request->amount){
                $transfer =new Foundtransfer();
                $transfer->user_id=Auth::guard('web')->user()->id;
                $transfer->amount=$request->transfer_amount;
                $transfer->from='Group Wallet';
                $transfer->to=$request->to;
                $result=$transfer->save();
                if($result){
                    $user->group_bonus= $user->group_bonus-$request->transfer_amount;
                    $amountdeduct=intVal($request->transfer_amount)*(\App\Models\Basicinfo::first()->charge_convert/100);
                    $amount=$request->transfer_amount-$amountdeduct;
                    if($request->to=='Main Balance'){
                        $user->main_balance= $user->main_balance+$amount;
                    }else{
                        $user->my_balance= $user->my_balance+$amount;
                    }
                    $user->update();
                }
            }else{
                return response()->json('lessblance', 200);
            }

        }
        return response()->json('success', 200);
    }

    public function groupdata(Request $request)
    {
        $transfer = Foundtransfer::where('from','Group Wallet')->where('user_id',Auth::user()->id)->get()->reverse();
        return Datatables::of($transfer)
            ->addColumn('date', function ($transfer) {
                return $transfer->created_at->format('Y-m-d');;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchase(Request $request)
    {
        $user=User::where('id',Auth::guard('web')->user()->id)->first();
        if(!Hash::check($request->password, $user->password)){
            return response()->json('error',200);
        }else{
            if($user->purchase_bonus>=$request->amount){
                $transfer =new Foundtransfer();
                $transfer->user_id=Auth::guard('web')->user()->id;
                $transfer->amount=$request->transfer_amount;
                $transfer->from='Purchase Wallet';
                $transfer->to=$request->to;
                $result=$transfer->save();
                if($result){
                    $user->purchase_bonus= $user->purchase_bonus-$request->transfer_amount;
                    $amountdeduct=intVal($request->transfer_amount)*(\App\Models\Basicinfo::first()->charge_convert/100);
                    $amount=$request->transfer_amount-$amountdeduct;
                    if($request->to=='Main Balance'){
                        $user->main_balance= $user->main_balance+$amount;
                    }else{
                        $user->my_balance= $user->my_balance+$amount;
                    }
                    $user->update();
                }
            }else{
                return response()->json('lessblance', 200);
            }

        }
        return response()->json('success', 200);
    }

    public function purchasedata(Request $request)
    {
        $transfer = Foundtransfer::where('from','Purchase Wallet')->where('user_id',Auth::user()->id)->get()->reverse();
        return Datatables::of($transfer)
            ->addColumn('date', function ($transfer) {
                return $transfer->created_at->format('Y-m-d');;
            })
            ->make(true);
    }


    public function leadership(Request $request)
    {
        $user=User::where('id',Auth::guard('web')->user()->id)->first();
        if(!Hash::check($request->password, $user->password)){
            return response()->json('error',200);
        }else{
            if($user->leadership_bonus>=$request->amount){
                $transfer =new Foundtransfer();
                $transfer->user_id=Auth::guard('web')->user()->id;
                $transfer->amount=$request->transfer_amount;
                $transfer->from='Leadership Wallet';
                $transfer->to=$request->to;
                $result=$transfer->save();
                if($result){
                    $user->leadership_bonus=$user->leadership_bonus-$request->transfer_amount;
                    $amountdeduct=intVal($request->transfer_amount)*(\App\Models\Basicinfo::first()->charge_convert/100);
                    $amount=$request->transfer_amount-$amountdeduct;
                    if($request->to=='Main Balance'){
                        $user->main_balance= $user->main_balance+$amount;
                    }else{
                        $user->my_balance= $user->my_balance+$amount;
                    }
                    $user->update();
                }
            }else{
                return response()->json('lessblance', 200);
            }

        }
        return response()->json('success', 200);
    }

    public function leadershipdata(Request $request)
    {
        $transfer = Foundtransfer::where('from','Leadership Wallet')->where('user_id',Auth::user()->id)->get()->reverse();
        return Datatables::of($transfer)
            ->addColumn('date', function ($transfer) {
                return $transfer->created_at->format('Y-m-d');;
            })
            ->make(true);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foundtransfer  $foundtransfer
     * @return \Illuminate\Http\Response
     */
    public function show(Foundtransfer $foundtransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foundtransfer  $foundtransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Foundtransfer $foundtransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foundtransfer  $foundtransfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foundtransfer $foundtransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foundtransfer  $foundtransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foundtransfer $foundtransfer)
    {
        //
    }
}