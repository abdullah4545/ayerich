<?php

namespace App\Http\Controllers;

use App\Models\Withdrew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DataTables;

class WithdrewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('webview.user.withdrew.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function withdrewdata(Request $request)
    {
        $withdrews = Withdrew::where('user_id',Auth::guard('web')->user()->id)->get()->reverse();
        return Datatables::of($withdrews)
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
        $user=User::where('id',Auth::guard('web')->user()->id)->first();
        if(!Hash::check($request->password, $user->password)){
            return response()->json('error',200);
        }else{
            $amountdeduct=intVal($request->amount)*(\App\Models\Basicinfo::first()->charge_withdrew/100);
            $amount=$request->amount+$amountdeduct;
            if($user->main_balance>=$amount){
                $transfer =new Withdrew();
                $transfer->user_id=Auth::guard('web')->user()->id;
                $transfer->amount=$request->amount;
                $transfer->coments=Auth::guard('web')->user()->name . ' keep a withdrew request for '. $request->amount;
                $transfer->status='Pending';
                $transfer->date=date('Y-m-d');
                $result=$transfer->save();
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
     * @param  \App\Models\Withdrew  $withdrew
     * @return \Illuminate\Http\Response
     */
    public function show(Withdrew $withdrew)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdrew  $withdrew
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdrew $withdrew)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdrew  $withdrew
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdrew $withdrew)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdrew  $withdrew
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdrew $withdrew)
    {
        //
    }
}