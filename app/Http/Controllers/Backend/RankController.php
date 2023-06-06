<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Rank;
use Illuminate\Http\Request;
use DataTables;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.rank.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function rankdata()
    {
        $ranks = Rank::get()->reverse();

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
        $ranks =new Rank();
        $ranks-> rank_name=$request->rank_name ;
        $ranks-> rank_user_range=$request->rank_user_range ;
        $ranks-> rank_bonus_point=$request->rank_bonus_point ;
        $ranks->save();
        return response()->json($ranks ,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rank =Rank::findOrfail($id);
        return response()->json($rank ,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ranks =Rank::findOrfail($id);
        $ranks-> rank_name=$request->rank_name ;
        $ranks-> rank_user_range=$request->rank_user_range ;
        $ranks-> rank_bonus_point=$request->rank_bonus_point ;
        $ranks->save();
        return response()->json($ranks ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rank $rank)
    {
        //
    }

    public function statusupdate(Request $request)
    {
        $rank=Rank::where('id',$request->rank_id)->first();
        $rank->status=$request->status;
        $rank->save();
        return response()->json($rank, 200);
    }

}