<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Banktype;
use Illuminate\Http\Request;
use DataTables;

class BankController extends Controller
{
    public function index()
    {
        return view('admin.content.bank.bank');
    }

    public function bankdata()
    {
        $banks = Bank::all();
        return Datatables::of($banks)
            ->addColumn('action', function ($banks) {
                return '<a href="#" type="button" id="editBankBtn" data-id="' . $banks->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainBanks" ><i class="bi bi-pencil-square"></i></a>';
            })

            ->make(true);
    }

    public function store(Request $request)
    {
        $bank = Bank::create($request->all());
        return response()->json($bank, 200);
    }


    public function edit($id)
    {
        $bank = Bank::findOrfail($id);
        return response()->json($bank, 200);
    }

    public function update(Request $request, $id)
    {
        $bank = Bank::findOrfail($id);
        $bank->bank_name = $request->bank_name;
        $bank->account_number = $request->account_number;
        $bank->branch = $request->branch;
        $bank->save();
        return response()->json($bank, 200);
    }


    public function destroy($id)
    {
        $bank = Bank::findOrfail($id);
        $bank->delete();
        return response()->json('delete success', 200);
    }

    public function updatestatus(Request $request)
    {

        $bank = Bank::Where('id', $request->bank_id)->first();
        $bank->status = $request->status;
        $bank->save();

        return response()->json($bank, 200);
    }


}