@extends('layouts.app')


@section('content')

<div class="card">
<div class="card-header">
        Published Articles
    </div>

    <div class="card-body">
    <table class="table table-hover">
    
        <thead>
            <th>
                Image
            </th>

            <th>
                Title
            </th>

            <th>
                Author
            </th>

           <th>
                show
            </th>

            <th>
                Edit
            </th>

            <th>
                Delete
            </th>
        </thead>

        <tbody>
        @if($articles->count() > 0)
            @foreach($articles as $article)

                <tr>
                   <td><img src="{{ $article->featured }}" alt="{{ $article->title }}" width="70px"; height="50px"></td>

                   <td>{{ $article->title }}</td>
                   
                   <td>{{ $article->author }}</td>

                   <td><a href="{{ route('article.show', ['id' => $article->id]) }}" class="btn btn-xs btn-secondary">view</a></td>

                   <td><a href="{{ route('article.edit', ['id' => $article->id]) }}" class="btn btn-xs btn-info">Edit</a></td>
                   
                   <td>
                   <a href="{{ route('article.delete', ['id' => $article->id]) }}" class="btn btn-xs btn-danger">Delete</a>
                   </td>
                
                </tr>

            @endforeach

          @else 
                <tr>
                    <th colspan="5" class="text-center">No published Article</th>
                </tr>
          @endif 
        </tbody>
    
    </table>
    </div>

</div>

@stop