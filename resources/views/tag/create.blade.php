@extends('layouts.home')




@section('content')
<div class="container">
    <div class="row justify">
         <div class="col-md-8">
        
            <div class="card card-default">
                <div class="card-header">
                       {{isset($tag)? 'Edit Tag': 'Add Tag'}} 
                </div>
                <div class="card-body">
                    @include('partials.flash')

                    <form action="{{ isset($tag)? route('tags.update', $tag->id): route('tags.store')}}" method="POST">
                        @csrf
                        @if (isset($tag))
                            @method('PUT')
                        @endif
                        <input type="text" name="name" class="list-group" placeholder="Tag name" value="{{ isset($tag)? $tag->name: ''}}">
                        <button type="submit" class="btn btn-success btn-sm">{{isset($tag)? 'Update': 'Create'}} </button>
                    
                    </form>
                </div>
                        
                
                </ul>
             </div>
        </div>

        </div> 

    </div>
@endsection