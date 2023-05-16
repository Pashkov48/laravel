@extends('templates.main')

@section('main')
    <img src="{{$article->preview_image}}" width="300">
    <h1>{{$article->title}}</h1>
    <span class="badge text-bg-secondary mb-3">{{$article->created_at}}</span>
    <p>{{$article->body}}</p>
    <div class="btn-group">
        <a href="{{route('article.page.edit', ['article'=>$article->id])}}" class="btn btn-success">Edit</a>
        <form action="{{route('article.delete', ['article'=>$article->id])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <h3>Комментарии</h3>
    @foreach($article->comments as $comment)
        <div class="card mt-3" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">{{$comment->username}}</h5>
                <p class="card-text">{{$comment->body}}</p>
            </div>
    @endforeach
@endsection
