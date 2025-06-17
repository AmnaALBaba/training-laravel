<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

        <div class="mb-3">
            <label for="title">title</label>
            <input type="text" name ="title" id ="title" placeholder="Enter title"
                class ="form-control @error('title')is-invalid @enderror" value={{ old('title', $post->title) }}>

            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" name ="image" id ="image" placeholder="Enter image"
                class ="form-control @error('image')is-invalid @enderror">


            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
             @if ($post->image)
            <img src="{{ asset($post->image) }}"width="100" alt="">
        @endif

        </div>
        <div class="mb-3">
            <label for="content">Content</label>
            <input type="text" name ="content" id ="content" placeholder="Enter content"
                class ="form-control @error('content')is-invalid @enderror" value={{ old('content', $post->content) }}>

            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        @if ($post->title)
            <button>Update</button>
        @else
            <button>Create</button>
        @endif

    </form>






</body>

</html>
