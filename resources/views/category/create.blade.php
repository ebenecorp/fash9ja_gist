@extends('layouts.home')




@section('content')
    <div class="row justify text-center">
       <div class="container">
         <div class="col-md-8">
        
            <div class="card card-default">
                <div class="card-header">
                        Add Category
                </div>
                <div class="card-body">
                    <div class="alert-danger">
                        @foreach ($errors->all() as $error)
                        <ul>
                            <li>
                                {{$error}}
                            </li>
                        </ul>
                        @endforeach
                    </div>
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

    </div>
@endsection