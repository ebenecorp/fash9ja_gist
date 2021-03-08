@extends('layouts.home')




@section('content')
    <div class="row justify text-center">
        <div class="col-md-8">
        
            <div class="card card-default">
                <div class="card-header">
                        Add Category
                </div>
                <div class="card-body">
                    <form action="/categories/create" method="POST">
                        @csrf
                        <input type="text" name="name" class="list-group" placeholder="Category name">
                        <button type="submit" class="btn btn-success btn-sm">Create Category </button>
                    
                    </form>
                </div>
                        
                
                </ul>
             </div>
        </div>

    </div>
@endsection