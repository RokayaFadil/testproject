@extends('layouts.app')

@section('title') Edit @endsection

@section('body')

<form class="d-grid gap-2 col-8 mx-auto mt-5", method="POST", action="{{route('posts.update', $post-> id)}}">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @method('PUT')
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Title</label>
        <input name="title" type="text" id="disabledTextInput" class="form-control" value={{$post->title}}>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
      </div>
      <div class="mb-3">
        <label  class="form-label">Post Creater</label>
        <select name="post_creater" class="form-control">
          @foreach ($users as $user)
          <option @selected($post->user_id == $user->id) value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
          
        </select>
      </div>
      
      <div >
        <button type="submit" class="btn btn-primary">update</button>
      </div>
     
  </form>
   
@endsection