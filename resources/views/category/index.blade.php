@extends('layouts.home')
@section('title')
    Fash9ja Gist categories
@endsection

@section('content')

    <div class="row justify text-center">
        <div class="col-md-8">
        
            <div class="card card-default">
                <div class="card-header">
                        Categories
                </div>
                <ul class="list-group list-group-flush">

                    @foreach ($categories as $category)
                        <li class="list-group-item">
                            {{$category->name}}
                            {{-- {{$category->id}} --}}

                            <a href="/categories/{{ $category->id }}/edit" class="btn btn-info btn-sm float-right">Edit</a>
                            <a href="/categories/{{ $category->id }}/delete" class="btn btn-danger btn-sm float-right">Delete</a>
                        </li>
                        @endforeach
                        
                
                </ul>
             </div>
        </div>

    </div>

@endsection
