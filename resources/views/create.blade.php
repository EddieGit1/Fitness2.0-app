<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New blog') }}</div>
                <form method="post" action="{{route('store')}}">
                    @csrf
                    <div>
                        <label for="full_name">Full Name:</label>
                        <input type="text" name="full_name"/>
                    </div>
                    <div>
                        <label for="workout_title">Blog Title:</label>
                        <input type="text" name="blog_title"/>
                    </div><br>
                    <label>Blog content:</label><br>
                    <textarea name="blog_text" rows="5" cols="40" required></textarea><br>

                    <button type="submit">Add Blog</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

