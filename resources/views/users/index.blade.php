@extends('layouts.home')
@section('title')
    Fash9ja Gist: All Users
@endsection

@section('content')
   
    <div class="container">
        <div class="row justify-text-center">
            <div class="col-md-8">
            
                <div class="card card-default">
                    <div class="card-header">
                            Users
                    </div>
                    <div class="card-body">
                    @include('partials.flash')
                            
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                    <th scope="row"> <img src="{{Gravatar::src($user->email)}}" style="height:40px; width:40px; radius:50%;" alt=""> </th>
                                    <td scope="row">{{$user->name}}</td>

                                    <td>{{$user->email}}</td>
                                    {{-- <td>0</td> --}}
                                    <td> 
                                        <form action="{{route('user.make-admin', $user->id)}}" method="POST">
                                            @csrf
                                            {{-- @if(!$user->isAdmin()) --}}

                                                <button type="submit" class="btn btn-info btn-sm float-right">
                                                    {{ $user->isAdmin()? 'Make Writer':'Make Admin'}}
                                                </button>

                                            {{-- @endif --}}
                                        </form>
                                        {{-- <a href="" class="btn btn-info btn-sm float-right">Make Admin</a> --}}
                                    </td>
                                    <td>
                                        {{-- <a  class="btn btn-danger btn-sm float-right" onclick="handleDelete({{$tag->id}})">Delete</a> --}}
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>

        </div>
    </div>
    

    {{-- <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this tag</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <form id="modalForm" name="modalForm" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Yes, Confirm</button>

                </form>
            </div>
            </div>
        </div>
    </div> --}}

@endsection

@section('script')

<script>
    function handleDelete(id){
        // console.log('Deleting...', id);
        new bootstrap.Modal(document.getElementById('deleteModal')).show()
        
        document.modalForm.action = "tags/"+ id ;

    }
</script>
    
@endsection
