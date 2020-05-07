@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="container pt-5" style="padding-bottom:85px">
        <div class="row mt-5 ml-4 bg-white p-5">
            <div class="col-4">
                <img src=" {{ url('img',$user->image) }} " class="img-thumbnail" width="300" alt="">
            </div>
            <div class="col-2 mt-5">
                <div class="mt-5 ml-5 pt-3" style="height: 150px;width: 5px; background-color: green"></div>
            </div>
            <div class="col-4 ml-4">
                <form action=" {{ route('updateprofile') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mt-3">
                        <p class="">Your Name :<br>
                            <input type="text" value="{{ $user->name }}" class="form-control mt-2">
                        </p>
                    </div>
                    <div class="row mt-3">
                        <p class="">Your Email :<br>
                            <input type="text" value="{{ $user->email }}" class="form-control mt-2">
                        </p>
                    </div>
                    <div class="row">
                        <p class="">Phone number :<br>
                            <input type="text" value="{{ $user->phone}}" class="form-control mt-2">
                    </div>
                    <div class="row">
                        <p class="">Address :<br>
                            <input type="text" value="{{ $user->address}}" class="form-control mt-2">
                            <span class="text-success">{{ $user->address}}</span></p>
                    </div>
                    <div class="row mt-3">
                        <button type="submit"  class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
