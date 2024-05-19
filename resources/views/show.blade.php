@extends('layouts.app')

@section('title') Show @endsection


@section('body')
      <div class="d-grid gap-2 col-8 mx-auto mt-5">
        <div class="card">
            <div class="card-header">
              post info
            </div>
            <div class="card-body">
              <h5 class="card-title">Title: {{$post->title}}</h5>
              <p class="card-text">Description: {{$post->description}}</p>
            </div>
          </div>
      </div>

      <div class="d-grid gap-2 col-8 mx-auto mt-5">
        <div class="card">
            <div class="card-header">
              post creater info
            </div>
            <div class="card-body">
              <h5 class="card-title">Name: {{$post->user ? $post->user->name : 'Not found'}}</h5>
              <p class="card-text">Email: {{$post->user ? $post->user->email : 'Not found'}}</p>
              <p class="card-text">Create At: {{$post->user ? $post->user->created_at : 'Not found'}}</p> 
            </div>
          </div>
      </div>
      
      @endsection