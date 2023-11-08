<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <div class="container p-3">
        <div class="row d-flex justify-content-center">

            <div class="col-md-6 p-3 border">

                <h2>Edit post</h2>

                <form action="{{ route('posts.update', $post) }}" method="post">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required
                            value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <input type="text" name="content" id="content" class="form-control" required
                            value="{{ $post->content }}">
                    </div>
                  

                    <button type="submit" class="btn btn-primary">save</button>
                    <a href="{{route('posts.index')}}" class="btn btn-secondary">Back</a>

                </form>


            </div>
        </div>
    </div>

</body>

</html>