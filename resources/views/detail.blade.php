<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<table class="table table-striped table-bordered">
    <tr>
        <th>Naam</th>
        <th>Title</th>
        <th>Text</th>
    </tr>
    @foreach($blogItems as $blogItem)
        <tr>
            <td>{{$blogItem->full_name}}</td>
            <td>{{$blogItem->blog_title}}</td>
            <td>{{$blogItem->blog_text}}</td>
        </tr>
    @endforeach

</table>
</body>
</html>
