<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogs</title>
    <link rel="stylesheet" href="/app.css">
    <link rel="stylesheet" href="/css">
</head>
<body>
<a href="{{ route('home') }}">Login</a>

<h3>Categories:</h3>
@foreach($cat as $c)
    <a href="{{route('index', ['category' => $c->id])}}">{{$c->name}}</a>
    @endforeach
<a href="{{route('index')}}">reset</a>

<form method="get" role="search">
    @method('patch')
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="search">
        <span class="input-group-btn">
            <button type="submit" class="input-btn-default">
                Search
            </button>
        </span>
    </div>
</form>
<table class="table table-striped table-bordered">
    <ul>
        @foreach($blogItems as $blogItem)
            <li>Naam {{$blogItem->user_id}}</li>
            <li>Title {{$blogItem->blog_title}}</li>
            <li>Text {{$blogItem->blog_text}}</li>
        @endforeach
    </ul>
</table>
</body>
</html>
