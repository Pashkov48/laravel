@extends('templates.main')

@section('main')
    <div class="d-flex">
        @foreach($articles as $article)
            <div class="col">
                <div class="card">
                    <img
                        src="{{$article->preview_image ?? 'https://coldwaterchamberofcommerce.com/wp-content/uploads/2018/01/iStock-182875971.jpg'}}"
                        class="card-img-top"
                        width="100"
                        alt="{{$article->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title ?? NULL}}</h5>
                        <p class="card-text"><small class="text-muted">{{$article->created_at}}</small></p>
                        <p class="card-text">{{substr($article->body, 0, 100) . "..." ?? NULL}}</p>
                        <a href="{{route('article', ['article'=> $article->id])}}" class="btn btn-primary">Go
                            somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
