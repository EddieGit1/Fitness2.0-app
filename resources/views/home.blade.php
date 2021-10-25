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
        <table class="table table-striped table-bordered">
            <tr>
                <th>Naam</th>
                <th>Title</th>
            </tr>
            @foreach($blogs as $blogItem)
            <tr>
                <td>{{$blogItem->blog_title}}</td>
                <td>{{$blogItem->blog_text}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
