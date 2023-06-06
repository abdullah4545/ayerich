<?php

namespace App\Http\Controllers;

use App\Models\Tikit;
use App\Models\Replay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmintikitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tikits=Tikit::where('from_id',Auth::user()->id)->get()->reverse();
        return view('admin.tikit.index',['tikits'=>$tikits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tikit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tts=Tikit::where('from_id',Auth::user()->id)->get();
        foreach($tts as $tt){
            $t=Tikit::where('id',$tt->id)->first();
            $t->status='Closed';
            $t->update();
        }
        $tikit=new Tikit();
        $tikit->from_id=Auth::user()->id;
        $tikit->name=Auth::user()->name;
        $tikit->email=Auth::user()->email;
        $tikit->subject=$request->subject;
        $tikit->department=$request->department;
        $tikit->priority=$request->priority;
        $tikit->message=$request->message;

        $time = microtime('.') * 10000;
        $productImg = $request->file('attachment');
        if($productImg){
            $imgname = $time . $productImg->getClientOriginalName();
            $imguploadPath = ('public/images/tikit/');
            $productImg->move($imguploadPath, $imgname);
            $productImgUrl = $imguploadPath . $imgname;
            $tikit->attachment = $productImgUrl;
        }
        $tikit->save();
        return redirect()->back()->with('message','Tikit submit successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tikit  $tikit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tikit=Tikit::findOrfail($id);
        $replays=Replay::with('users')->where('tikit_id',$id)->get();
        return view('admin.tikit.show',['tikit'=>$tikit,'replays'=>$replays]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tikit  $tikit
     * @return \Illuminate\Http\Response
     */

    public function admindex()
    {
        $tikits=Tikit::get()->reverse();
        return view('admin.tikit.index',['tikits'=>$tikits]);
    }

    public function edit($id)
    {
        $tikit=Tikit::findOrfail($id);
        $replays=Replay::with('users')->where('tikit_id',$id)->get();
        return view('admin.tikit.edit',['tikit'=>$tikit,'replays'=>$replays]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tikit  $tikit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tikit=Tikit::where('id',$id)->first();
        $tikit->status=$request->department;
        $tikit->save();
        return redirect()->back()->with('message','Status Changed Successfully');
    }

    public function replay(Request $request, $id)
    {
        $tikit=Tikit::where('id',$id)->first();
        if($request->type=='User'){
            $tikit->status='Customer-Replay';
            $tikit->update();
        }else{
            $tikit->status='Answered';
            $tikit->update();
        }
        $replay=new Replay();
        $replay->tikit_id=$id;
        $replay->replay=$request->replay;
        if($request->type=='User'){
            $replay->type ='User';
            $replay->from_user_id=Auth::user()->id;
            $replay->status='Customer-Replay';
        }else{
            $replay->type='Admin';
            $replay->status='Answered';
        }
        $time = microtime('.') * 10000;
        $productImg = $request->file('replayatt');
        if($productImg){
            $imgname = $time . $productImg->getClientOriginalName();
            $imguploadPath = ('public/images/tikit/');
            $productImg->move($imguploadPath, $imgname);
            $productImgUrl = $imguploadPath . $imgname;
            $replay->replayatt = $productImgUrl;
        }

        $replay->save();
        return redirect()->back()->with('message','Tikit replay send successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tikit  $tikit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tikit $tikit)
    {
        //
    }
}