<?php

namespace App\Http\Controllers;

use App\Events\test;
use App\Friend;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $friends=Friend::where([
                ['user_id','=', Auth()->user()->id],
                ['status','=','friends'],
            ])
            ->orwhere('to_user_id','=', Auth()->user()->id)
            ->where('status','=','friends')
            ->with("user1")->get();

            for ($i = 0, $c = count($friends); $i < $c; ++$i) {
                if($friends[$i]->user2->id==Auth()->user()->id)
                $array[$i] = $friends[$i]->user1->id;
                else
                $array[$i] = $friends[$i]->user2->id;
            }
            $users=user::
            wherein('id', $array)->
            orwhere('id',Auth()->user()->id)
            ->with("posts")->
            get();
            $j=0;
            for ($i = 0, $c = count($users); $i < $c; ++$i){
                foreach ($users[$i]->posts as $post) {
                    $posts[$j]=$post;
                    $j++;
                }
            }
            $posts = collect($posts)->sortBy('created_at')->all();
            $posts =array_reverse($posts);
        return view('welcome',compact('posts'));
    }
    public function test()
    {
        return view('test');
    }
    public function view($id){
        $user=User::find($id);
        return view('user.profile',compact('user'));
    }
    public function edit(){
        $user=Auth::user();
        return view('user.edit',compact('user'));
    }
    public function update(Request $request)
    {
        $this->validate($request,[
        'content'=>'required',
        ]);
        $user=Auth::user();
        $user->name=$request['name'];
        $user->name=$request['email'];
        $user->name=$request['phone'];
        $user->name=$request['address'];
        $user->save();
        return redirect('/profile');

    }
}
