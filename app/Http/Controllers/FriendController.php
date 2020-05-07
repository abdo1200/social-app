<?php

namespace App\Http\Controllers;

use App\Friend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        $user=User::find(Auth()->user()->id);
        $pendingfriends=Friend::where([
                ['to_user_id','=', $user->id],
                ['status','=','pending'],
            ])->get();
        $friends=Friend::where([
                    ['user_id','=', $user->id],
                    ['status','=','friends'],
                ])
                ->orwhere('to_user_id','=', $user->id)
                ->where('status','=','friends')
                ->get();
        $array=[];
        $array2=[];
        for ($i = 0, $c = count($pendingfriends); $i < $c; ++$i) {
            $array[$i] = $pendingfriends[$i]->user2->id;
        }

        for ($i = 0, $c = count($friends); $i < $c; ++$i) {
            $array2[$i] = $friends[$i]->user2->id;
        }

        $suggestion=user::
        wherenotin('id', $array)->
        wherenotin('id', $array2)->
        where('id','!=', $user->id)->
        get();


        // // $suggest=User::where('to_user_id', $user->id)->exists();
        return view('user.friend',compact('friends','suggestion','pendingfriends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *8
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $user=Auth::user()->id;
        if (Friend::where('to_user_id', $id)->where('user_id',$user)->exists()) {
            return redirect()->back();
        }else{
            $request['user_id']=$user;
            $request['to_user_id']=$id;
            Friend::create($request->all());
        }
        return redirect()->back();

    }
    public function accept($id){
        $friend=Friend::find($id);
        $friend->status='friends';
        $friend->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
