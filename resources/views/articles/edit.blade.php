@extends('layouts.app')

@section('content')

@include('includes.errors')


<div class="card">
    <div class="card-header">
             Edit Article: {{ $article->title }}
        </div>

      <div class="card-body">
            <form action="{{ route('article.update',['id' => $article->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $article->title }}">
                </div>

                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" name="featured" class="form-control" value="">
                </div>

                 <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" class="form-control" value="{{ $article->author }}">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                   <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ $article->content }}</textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Article</button>
                    </div>
                </div>


         </div>            

@stop
