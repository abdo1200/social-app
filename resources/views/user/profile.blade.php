@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="container">
        <div class="row mt-5 ml-4 bg-white p-5">
            <div class="col-4">
                <img src=" {{ url('img',$user->image) }} " class="img-thumbnail" width="300" alt="">
            </div>
            <div class="col-2 mt-5">
                <div class="mt-5 ml-5 pt-3" style="height: 150px;width: 5px; background-color: green"></div>
            </div>
            <div class="col-4 ml-4">
                <div class="row">
                    <h1 class="text-success">{{ $user->name }}</h1>
                </div>
                <div class="row mt-3">
                    <p class="">Your Email :<br><span class="text-success">{{ $user->email }}</span></p>
                </div>
                <div class="row">
                    <p class="">Phone number :<br><span class="text-success">{{ $user->phone}}</span></p>
                </div>
                <div class="row">
                    <p class="">Address :<br><span class="text-success">{{ $user->address}}</span></p>
                </div>
                <div class="row">
                    <p class="">Created at :<br><span class="text-success">{{ $user->created_at}}</span></p>
                </div>
                <div class="row">
                    @if(Auth()->user()->id==$user->id)
                    <a href=" {{ route('editprofile') }} "><button class="btn btn-success mr-4">Edit profile</button></a>
                    @endif
                    @if(Auth()->user()->id!=$user->id)
                    <button class="btn btn-success"><i class="fas fa-user-plus"></i> Add friend</button>
                    @endif

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse($user->posts as $post)
            <div class="col-10">
                <div class="col-12">
                    <div class="card mt-4" style="border-top:2px green solid;border-bottom:2px green solid;">
                        <div class="card-body">
                            <div class="card-title row">
                                <div class="col-10 row">
                                    <div class="col-1"><img src=" {{ url('img',$post->user->image) }}" width="50" height="50" class="rounded-circle" ></div>
                                    <div class="col-3 ml-3">
                                    <div class="row ">
                                        {{$post->user->name}}
                                    </div>
                                    <div class="row">
                                       <small class="text-muted">{{ $post->created_at }}</small> <br>
                                    </div>
                                </div>
                                </div>
                                <div class="dropdown col-1 ml-auto">
                                    <button class="btn text-success" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#">Edit</a>
                                      <form action=" {{ route('deletepost',$post->id) }} " method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="dropdown-item" href="#">Delete</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text">{{$post->content}}</p>
                            <small class="text-success m-0">
                                {{ $post->likes->count().' friends like your post' }}
                            </small>
                            <hr>
                            <form action=" {{ route('Addlike',$post->id) }} " method="post">
                                @csrf
                                @method('put')
                                <button href="#" type="submit" class="btn card-link text-success"><i class="fas fa-thumbs-up"></i></button>
                            </form>
                            <form action=" {{ route('Addcomment',$post->id) }} " method="post">
                                @csrf
                                @method('put')
                                <div class="input-group mt-3">
                                    <input type="text" class="form-control" name="content" placeholder="Add Comment" aria-label="Recipient's username"
                                     aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                      <button class="btn btn-success btn-outline-success" type="submit"><i class="fas fa-paper-plane text-light"></i>
                                    </button>
                                    </div>
                                  </div>
                            </form>
                            <ul class="list-group mt-2 rounded">
                                @forelse($post->comments as $comment)
                                    <li class="list-group-item mt-3 " style="border-left:2px green solid;">
                                        <div class="row">
                                            <div class="col-1">
                                                <img src=" {{ url('img',$comment->user->image) }}" width="40" height="40" class="rounded-circle mt-2" >
                                            </div>
                                            <div class="col-11">
                                            <div class="row">
                                                <div class="col-3">
                                                    {{ $comment->user->name }}
                                                </div>
                                                <div class="col-3 text-end ml-auto">
                                                    <small class="text-muted">{{ $comment->created_at }}</small>
                                                </div>
                                            </div>
                                            <div class="row ml-1 text-success">
                                               <p>{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                        </div>
                                       {{-- <br> <span class="text-muted"> {{ $comment->created_at }} </span> --}}
                                    </li>
                                @empty
                                    <li class="list-group-item mt-3" style="border-left:2px green solid;">No Comments</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-10">
                <div class="col-12 text-center">
                    <div class="card mt-4" style="border-top:2px green solid;border-bottom:2px green solid;">
                        <div class="card-body">
                            <h1>No posts</h1>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>

@endsection
