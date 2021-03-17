@extends('layouts.home')




@section('content')
    <div class="container">
    <div class="row justify">
        <div class="col-md-8">
        
            <div class="card card-default">
                <div class="card-header">
                        User Profile
                </div>
                <div class="card-body">
                    
                    <form action="{{route('user.update-profile')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label" >Name</label>
                            <input type="text" value="{{$user->name}}" name="name" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="about" class="form-label">About</label>
                            <textarea name="about" id="about" class="form-control" cols="5" rows="5">{{$user->about}}</textarea>
                            
                        </div>


                        <button type="submit" class="btn btn-success btn-sm">Update Profile </button>
                    
                    </form>
                </div>
                        
                
                </ul>
             </div>
            </div>
        </div>

    </div>
@endsection