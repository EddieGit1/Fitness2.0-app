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
@if($role == 1)
    <h2>Welcome Admin!</h2>
@endif

<table class="table table-striped table-bordered">
    <ul>
        @foreach($blogItems as $blogItem)
            <li>Naam: {{$blogItem->full_name}}</li>
            <li>Title: {{$blogItem->blog_title}}</li>
            <li>Text: {{$blogItem->blog_text}}</li>

                <a href="{{route('postStatus', ['id' => $blogItem->id])}}">
                <button>
                    @if($blogItem->status == 1)
                    Active
                    @else
                        Inactive
                    @endif
                </button>
                </a>
        @endforeach
    </ul>
</table>
</body>
</html>
