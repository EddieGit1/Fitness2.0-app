<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogs</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<a href="{{ route('home') }}">Profile</a>
<table class="table table-striped table-bordered">
    <ul>
        @foreach($blogItems as $blogItem)
            <li>Naam {{$blogItem->full_name}}</li>
            <li>Title {{$blogItem->blog_title}}</li>
            <li>Text {{$blogItem->blog_text}}</li>
        @endforeach
    </ul>
</table>
</body>
</html>
