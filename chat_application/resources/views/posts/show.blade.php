@extends('layouts.app')
@section('content')
<a href="{{ url('/posts')}}" class="btn btn-primary">Back<a>
        <h1>This is single Post page</h1>

        <div class="card">
            <ul class="list-group list-group-flush">
                <div class="row">
                    <div class="col-md-12">
                        <img style="width:100%" src="{{ url('/')}}/storage/cover_images/{{$post->cover_image}}" alt="desert">
                    </div>
                </div>
                <li class="list-group-item">
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->body}}</p>
                    <small>Written at {{$post->created_at}}</small>
                    <hr>
                    @if(!Auth::guest())
                        @if(Auth::user()->id==$post->user_id)
                            <a href="{{ url('/posts')}}/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                            <hr>
                            {{ Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) }}
                            {{ Form::hidden('_method','DELETE')}}
                            {{ Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {{ Form::close() }}
                        @endif
                    @endif    
                </li>


            </ul>
        </div>

        @endsection
