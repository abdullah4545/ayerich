<?php

namespace App\Http\Controllers;

use App\Models\Recharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DataTables;

class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('webview.user.withdrew.recharge');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rechargedata(Request $request)
    {
        $recharges = Recharge::where('user_id',Auth::guard('web')->user()->id)->get()->reverse();
        return Datatables::of($recharges)
            ->addColumn('info', function ($transfer) {
                return $transfer->oparator.'<br>'.$transfer->number;
            })
            ->escapeColumns([])->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=User::where('id',Auth::guard('web')->user()->id)->first();
        if(!Hash::check($request->password, $user->password)){
            return response()->json('error',200);
        }else{
            $amountdeduct=intVal($request->amount)*(\App\Models\Basicinfo::first()->charge_withdrew/100);
            $amount=$request->amount+$amountdeduct;
            if($user->main_balance>=$amount){
                $transfer =new Recharge();
                $transfer->user_id=Auth::guard('web')->user()->id;
                $transfer->amount=$request->amount;
                $transfer->coments=Auth::guard('web')->user()->name . ' keep a mobile recharge request for '. $request->amount;
                $transfer->number=$request->number;
                $transfer->oparator=$request->oparator;
                $transfer->status='Pending';
                $transfer->date=date('Y-m-d');
                $result=$transfer->save();
                return $result;
                if($result){
                    $user->main_balance= $user->main_balance-$amount;
                    $user->pending= $user->pending+$amount;
                    $user->update();
                }
            }else{
                return response()->json('lessblance', 200);
            }

        }
        return response()->json('success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function show(Recharge $recharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function edit(Recharge $recharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recharge $recharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recharge $recharge)
    {
        //
    }
}