<?php

namespace App\Http\Controllers;

use App\Models\Leadershiprank;
use Illuminate\Http\Request;
use DataTables;

class LeadershiprankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.rank.leindex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function leadershiprankdata()
    {
        $ranks = Leadershiprank::get()->reverse();

        return Datatables::of($ranks)
            ->addColumn('action', function ($ranks) {
                return '<button class="btn btn-danger ms-2"  type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editmainRank" data-id="'.$ranks->id.'" id="editRankBtn"> Edit </button>';
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
        $ranks =new Leadershiprank();
        $ranks-> name=$request->name ;
        $ranks-> amount_range=$request->amount_range ;
        $ranks-> account_limit=$request->account_limit ;
        $ranks-> bonus_amount=$request->bonus_amount ;
        $ranks->save();
        return response()->json($ranks ,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leadershiprank  $rank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rank =Leadershiprank::findOrfail($id);
        return response()->json($rank ,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leadershiprank  $rank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ranks =Leadershiprank::findOrfail($id);
        $ranks-> name=$request->name ;
        $ranks-> amount_range=$request->amount_range ;
        $ranks-> account_limit=$request->account_limit ;
        $ranks-> bonus_amount=$request->bonus_amount ;
        $ranks->save();
        return response()->json($ranks ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leadershiprank  $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leadershiprank $rank)
    {
        //
    }

    public function statusupdate(Request $request)
    {
        $rank=Leadershiprank::where('id',$request->rank_id)->first();
        $rank->status=$request->status;
        $rank->save();
        return response()->json($rank, 200);
    }

}
