@extends('layouts.app')

@section('content')

            @foreach($articles as $article)

            <div class="card">
                <div class="card-header"><b>{{ $article->title }}</b></div>

                <div class="card-body">
                <img src="{{ $article->featured }}" alt="{{ $article->title }}" width="200px"; height="150px" style="border-radius:15px">
                </div>

                <div class="card-body">
                {{ $article->content }}
                </div>

                <div class="card-body">
                <em>{{ $article->author }}</em>
                </div>

            </div>
            @endforeach
            
 
@endsection