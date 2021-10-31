@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <h2>Welcome {{Auth::user()->name}}
            @if($blogs->count() > 3)
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                </svg>
            @endif
        </h2>
        <div>
            <a href="{{ url('create') }}">Create new Blog</a>
        </div>
        @if($role == 1)
        <a href="{{route('admin')}}">Go to admin panel</a>
        @endif
        <table class="table table-striped table-bordered">
            <tr>
                <th>Title</th>
                <th>Blog Content</th>
            </tr>
            @foreach($blogs as $blogItem)
            <tr>
                <td>{{$blogItem->blog_title}}</td>
                <td>{{$blogItem->blog_text}}</td>
                <td><a href="{{ route('edit',$blogItem->id)}}">Edit</a></td>
                <td>
                    <form method="post" action="{{ route('destroy', $blogItem->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
