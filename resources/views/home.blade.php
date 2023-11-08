@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a style="text-align: right" href="{{ route('posts.index') }}" class="btn btn-primary">Post Management</a><br>
                <div class="card">
                    <div class="card-header">{{ __('Blogs') }}

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (count($posts))
                            @foreach ($posts as $post)
                                <div class="col-md-12 p-3 border">
                                 
                                        <b>{{$post->title}}</b>
                                    <a href="{{ route('post_detail', $post->id) }}">
                                        <p>
                                            {{ \Illuminate\Support\Str::limit($post->content, 600, $end=' ...') }}
                                            
                                        </p>
                                    </a>
                                    <div><p>{{date('dM-Y', strtotime($post->created_at))}} , By: {{$post->user->name}}</p></div>
                                    <span> {{ count($post->comments) }} comments</span>
                                </div>
                            @endforeach
                            
                        @else
                            <h3>No Post Uploaded..</h3>
                        @endif

                        <div class="d-flex justify-content-center">
                            {!! $posts->links() !!}
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    @endsection
