@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form method="post" action="{{ route('update', $blogItem->id) }}">
                @csrf
                @method('PATCH')
                <div>
                    <label for="full_name">Full Name:</label>
                    <input type="text" name="full_name" value="{{ $blogItem->full_name }}"/>
                </div>
                <select name="category">
                    @foreach($cat as $c)
                        <option value="{{$c->id}}" name="{{$c->name}}" @if($c->id == $blogItem->category_id) selected @endif>{{$c->name}}</option>
                    @endforeach
                </select>
                <div>
                    <label for="workout_title">Workout Title:</label>
                    <input type="text" name="blog_title" value="{{ $blogItem->blog_title }}"/>
                </div><br>
                <label>Blog Content:</label><br>
                <textarea name="blog_text" rows="5" cols="40" required >{{ $blogItem->blog_text }}</textarea><br>
                <button type="submit">Save Blog</button>
            </form>
        </div>
    </div>
@endsection
