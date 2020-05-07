@extends('layouts.master')
@section('title', 'home')
@section('content')

<div class="container-fluid" id="app">
    <div class="row justify-content-center">
        <div class="col-10 mt-5">
            <form action=" {{ route('creatpost') }} " method="post">
                @csrf
                @method('put')
                <div class="form-group">
                  <textarea type="text" class="form-control" name="content" id="content" aria-describedby="emailHelpId"
                  placeholder="What's in your mind"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Create Post</button>
            </form>
        </div>
    </div>
    @forelse($posts as $post)
    <div class="row justify-content-center">
        <div class="col-10">
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
                        {{-- @forelse($post->likes as $like)
                            {{$like->user->name}}
                        @empty

                        @endforelse --}}
                    </small>
                    {{-- <a href="#" class="card-link text-success"><i class="fas fa-thumbs-down"></i></a> --}}
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
        <h1>No posts</h1>
    @endforelse
</div>
</div>
@endsection
