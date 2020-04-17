@extends('layouts.app')
       @section('content')

        <h1>This is Post page</h1>
        @if(count($posts)>0)
        <div class="card">
            <ul class="list-group list-group-flush">
             @foreach($posts as $post)
                <div class="row">
                    <div class="col-md-4">
                        <img style="width:100%" src="{{ url('/')}}/storage/cover_images/{{$post->cover_image}}" alt="desert">
                    </div> 
                    <div class="col-md-8">
                        <li class="list-group-item">
                            <h3><a href="{{ url('/')}}/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>Written at {{$post->created_at}}</small>
                        </li>
                    </div>
                </div> 
             @endforeach
            </ul>
        </div>    
             @else

        @endif
       @endsection