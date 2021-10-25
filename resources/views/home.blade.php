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
        <div>
            <a href="{{ url('create') }}">Create new Blog</a>
        </div>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Title</th>
                <th>Blog Content</th>
            </tr>
            @foreach($blogs as $blogItem)
            <tr>
                <td>{{$blogItem->blog_title}}</td>
                <td>{{$blogItem->blog_text}}</td>
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
