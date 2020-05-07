@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="container-fluid pt-5" >
        <div class="row ml-5">
           <div class="col-3 text-center">
               <h4 class="bg-success text-light p-3 rounded"> Your Friends ({{ $friends->count() }}) </h4>
           </div>
        </div>
        <div class="row mt-5 ml-5">
            @forelse($friends as $friend)
            <div class="col-3 row card rounded mr-5 ml-2  mb-5">
                <div class="row justify-content-center">
                    <div class="col-10 mt-4">
                        @if($friend->user2->id==Auth()->user()->id)
                        <img src=" {{ url('img',$friend->user1->image) }} " class="rounded-circle" height="200" width="200" alt="">
                        @else
                        <img src=" {{ url('img',$friend->user2->image) }} " class="rounded-circle" height="200" width="200" alt="">
                        @endif
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 mt-4">
                        @if($friend->user2->id==Auth()->user()->id)
                        <a href=" {{url('/profile/'.$friend->user1->id)}} "><h4 class="text-dark">  {{ $friend->user1->name }} </h4></a>
                        @else
                        <a href=" {{url('/profile/'.$friend->user2->id)}} "><h4 class="text-dark">  {{ $friend->user2->name }} </h4></a>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-12 text-center mb-3">
                        <form action=" {{ route('accept',$friend->id) }} " method="post">
                            @csrf
                            @method('put')
                            <button class="btn btn-success" id="add" type="submit" style="font-size: 13px">
                                Friends <i class="fas fa-user-check"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            @empty
            <div class="row ml-2">
                <div class="col-12">
                    No Friends
                </div>
            </div>
            @endforelse
        </div>
    </div>
    <div class="container-fluid pt-5" >
        <div class="row ml-5">
           <div class="col-4 text-center">
               <h4 class="bg-success text-light p-3 rounded"> Your Friend Requests ({{ $pendingfriends->count() }}) </h4>
           </div>
        </div>
        <div class="row mt-5 ml-5">
            @forelse($pendingfriends as $friend)
            <div class="col-3 row card rounded mr-5 ml-2  mb-5">
                <div class="row justify-content-center">
                    <div class="col-10 mt-4">
                        @if($friend->user2->id==Auth()->user()->id)
                        <img src=" {{ url('img',$friend->user1->image) }} " class="rounded-circle" height="200" width="200" alt="">
                        @else
                        <img src=" {{ url('img',$friend->user2->image) }} " class="rounded-circle" height="200" width="200" alt="">
                        @endif
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 mt-4">
                        @if($friend->user2->id==Auth()->user()->id)
                        <a href=" {{url('/profile/'.$friend->user1->id)}} "><h4 class="text-dark">  {{ $friend->user1->name }} </h4></a>
                        @else
                        <a href=" {{url('/profile/'.$friend->user2->id)}} "><h4 class="text-dark">  {{ $friend->user2->name }} </h4></a>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-12 text-center mb-3">
                        <form action=" {{ route('accept',$friend->id) }} " method="post">
                            @csrf
                            @method('put')
                            <button class="btn btn-success" id="add" type="submit" style="font-size: 13px">
                                <i class="fas fa-check"></i> Confirm
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            @empty
            <div class="row ml-2">
                <div class="col-12">
                    No Friend requests
                </div>
            </div>
            @endforelse
        </div>

    </div>
    <div class="container-fluid pt-5" >
        <div class="row ml-5">
           <div class="col-4 text-center">
               <h4 class="bg-success text-light p-3 rounded"> Suggestion friends </h4>
           </div>
        </div>
        <div class="row mt-5 ml-5">
            @forelse($suggestion as $friend)
            <div class="col-3 row card rounded mr-5 ml-2 mb-5">
                <div class="row justify-content-center">
                    <div class="col-10 mt-4">
                        <img src=" {{ url('img',$friend->image) }} " class="rounded-circle" height="200" width="200" alt="">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 mt-4">
                        <a href=" {{url('/profile/'.$friend->id)}} "><h4 class="text-dark"> {{ $friend->name }} </h4></a>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-12 text-center mb-3">
                        <form action=" {{ route('addfriend',$friend->id) }} " method="post">
                            @csrf
                            @method('put')
                            <button class="btn btn-success" id="add" type="submit" style="font-size: 13px">
                                <i class="fas fa-user-plus"></i> Add friend
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            @empty
            <div class="row ml-2">
                <div class="col-12">
                    No suggestions requests
                </div>
            </div>
            @endforelse
        </div>

    </div>
@endsection
