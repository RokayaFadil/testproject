@extends('layouts.app')

@section('title') Index @endsection

@section('body')
      <div class="mt-5">
        <div class="text-center">
            <a type="button" class="btn btn-success" href="{{route('posts.create')}}">Create Post</a>
        </div>
           <div class="d-grid gap-2 col-10 mx-auto">
        <table class="table mt-4", >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created_At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($posts as $post )
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name : 'Not found'}}</td>
                    <td>{{$post->created_at->format('Y-m-d')}}</td>
                    <td>
                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                        <form style="display: inline", method="POST", action="{{route('posts.destroy', $post['id'])}}">
                          @csrf
                          @method('DELETE')
                          <button  type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                    </td>
                  </tr>
                @endforeach
              
              
            </tbody>
          </table>
           </div>
      </div>
      
      
    @endsection