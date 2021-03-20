@extends('layouts.home')




@section('content')
    <div class="container">
    <div class="row justify">
        <div class="col-md-8">
        
            <div class="card card-default">
                <div class="card-header">
                        Company Details
                </div>
                <div class="card-body">
                    
                    <form action="{{route('update-company')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label" >Company Name</label>
                            <input type="text" value="{{$company->name}}" name="name" class="form-control" >
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="5" rows="5">{{$company->about}}</textarea>
                            
                        </div>
                        <div class="mb-3">
                            <label for="about" class="form-label">About</label>
                            <textarea name="about" id="about" class="form-control" cols="5" rows="5">{{$company->about}}</textarea>
                            
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label" >Email</label>
                            <input type="email" value="{{$company->email}}" name="email" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label" >Phone</label>
                            <input type="tel" value="{{$company->phone}}" id="phone" name="phone" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label" >Address</label>
                            <input type="address" value="{{$company->address}}" name="address" class="form-control" >
                        </div>

                        <button type="submit" class="btn btn-success btn-sm">Update Company Details </button>
                    
                    </form>
                </div>
                        
                
                </ul>
             </div>
            </div>
        </div>

    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}">

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="{{asset('js/intlTelInput-jquery.min.js')}}"></script>
    <script>
        $("#phone").intlTelInput({
            allowDropdown:true,
        });
    </script>

@endsection