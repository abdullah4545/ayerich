<?php

namespace App\Http\Controllers;

use App\Models\Fixeddeposit;
use App\Models\Bank;
use App\Models\Basicinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class FixeddepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depositss = Fixeddeposit::where('user_id',Auth::user()->id)->first();
        return view('webview.user.fixed.fixeddeposit',['depositss'=>$depositss]);
    }

    public function depositByStatus ($status)
    {
        $deposits = Fixeddeposit::where('status',$status)->get();
        return view('backend.content.fixed.datalist',['status'=>$status,'deposits'=>$deposits]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getdata($id)
    {
        $bank=Bank::findOrfail($id);
        return view('webview.user.fixed.add',['bank'=>$bank]);
    }

    public function fixeddepositdata(Request $request){
        $deposit = Fixeddeposit::where('user_id',Auth::user()->id)->get();
        return Datatables::of($deposit)
            ->addColumn('status', function ($deposit) {
                return '<a href="#" type="button" class="btn btn-success">' . $deposit->status . '</a>';
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
        $bank=new Fixeddeposit();
        $bank->bank_id=$request->bank_id;
        $b=Bank::where('id',$request->bank_id)->first();
        $bank->amount=$request->amount;
        $bank->trx_id=$request->trx_id;
        $bank->date=date('Y-m-d');
        $bank->bank_name=$b->bank_name;
        $bank->account_number=$b->account_number;
        $bank->user_id=Auth::user()->id;
        $bank->save();
        return response()->json($bank, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fixeddeposit  $fixeddeposit
     * @return \Illuminate\Http\Response
     */
    public function show(Fixeddeposit $fixeddeposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fixeddeposit  $fixeddeposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Fixeddeposit $fixeddeposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fixeddeposit  $fixeddeposit
     * @return \Illuminate\Http\Response
     */
    public function changestatus(Request $request)
    {
        $bank=Fixeddeposit::where('id',$request->deposit_id)->first();
        $bank->status=$request->status;
        $bank->update();
        return response()->json('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fixeddeposit  $fixeddeposit
     * @return \Illuminate\Http\Response
     */
    public function payinterest()
    {
        $deposits=Fixeddeposit::where('status','Active')->get();
        foreach($deposits as $depo){
            $bank=Fixeddeposit::where('id',$depo->id)->first();
            $basic=Basicinfo::first();
            $ipc=$basic->fixed_deposit_interest/365;
            $inte=$bank->amount*$ipc;
            $bank->monthly_interest=$bank->monthly_interest+number_format((float) $inte, 2, '.', '');
            $bank->total_interest=$bank->total_interest+number_format((float) $inte, 2, '.', '');
            $bank->update();
        }
        return response()->json('success', 200);
    }
}