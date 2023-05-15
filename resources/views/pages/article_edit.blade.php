@extends('templates.main')
@section('main')
    <div class="row my-4">
        <h3 class="mt-3">Update "{{$article->title}}" article</h3>
        <form action="{{route('articles.update', ['article'=>$article->id])}}" method="post"
              enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="{{old('title', $article->title)}}"
                       class="form-control @error('title') is-invalid @enderror" id="title">
                @error('title')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea name="body" class="form-control @error('body') is-invalid @enderror"
                          id="body">{{old('body', $article->body)}}</textarea>
                @error('body')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <img class="d-block mb-3" height="100" src="{{$article->preview_image}}" alt="">
                <label for="preview" class="form-label">Preview</label>
                <input class="form-control @error('preview') is-invalid @enderror" name="preview" type="file"
                       id="preview">
                @error('preview')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" name="is_public" type="checkbox"
                       id="is-public" {{(bool)$article->is_public === true ? 'checked': ''}}>
                <label class="form-check-label" for="is-public">
                    Is public
                </label>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection

