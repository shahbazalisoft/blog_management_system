@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Blogs') }}

                    </div>

                    <div class="card-body">
                        <div class="col-md-12 p-3 border">
                            <div>
                                <p>By: {{ $post->user->name }} , {{ date('dM-Y', strtotime($post->created_at)) }} </p>
                            </div>
                            
                            <b>{{ $post->title }}</b>
                            <p> {{ $post->content }} </p>
                            @if (count($post->comments))
                                @foreach ($post->comments as $comment)
                                    <b>{{ $comment->comment_by }}</b> <span> {{ $comment->comment }}</span> <br>
                                @endforeach
                            @endif

                            <form action="{{ route('add_comment', $post->id) }}" method="post" class="">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br>
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
