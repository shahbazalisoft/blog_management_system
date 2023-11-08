


@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">Home</a>
                    
                </div>
                
                <div class="card-body">
                    <a class="btn btn-primary btn-xs removeAll mb-3" href="{{ route('posts.create') }}">Add New Post</a>
                    <table class="table table-bordered">
                       <tr>
                          <th>Id</th>
                          <th>Category Name</th>
                          <th>Category Details</th>
                          <td>action</td>
                       </tr>
                       
                       @if(count($posts))
                       @foreach($posts as $key => $post)
                       <tr>
                          <td>{{ ++$key }}</td>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->content }}</td>
                          <td>
                           <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary me-3">edit</a>
                           <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                               class="">
                               @csrf
                               @method('DELETE')
                               <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger">delete</button>
                           </form>
                           </td>
                       </tr>
                       @endforeach
                       @endif
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $posts->links() !!}
                    </div>
                 </div>
                </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection