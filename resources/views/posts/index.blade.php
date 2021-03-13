@extends('layouts.home')
@section('title')
    Fash9ja Gist Posts
@endsection

@section('content')
   
    <div class="container">
        <div class="row justify text-center">
            <div class="col-md-8">
            
                <div class="card card-default">
                    <div class="card-header">
                         Posts
                    </div>
                    <ul class="list-group list-group-flush">

                        @foreach ($posts as $post)
                            <li class="list-group-item">
                                {{$post->title}}
                                {{-- {{$post->id}} --}}
                                @if (!$post->trashed())
                                    
                                <a href="/categories/{{ $post->id }}/edit" class="btn btn-info btn-sm float-right">Edit</a>
                                @endif
                                <a  class="btn btn-danger btn-sm float-right" onclick="handleDelete({{$post->id}})"> {{$post->trashed()? 'Delete' : 'Trash'}}</a>
                            </li>
                            @endforeach
                            
                    
                    </ul>
                </div>
            </div>

        </div>
    </div>
    

    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Post</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form id="modalForm" name="modalForm" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Yes, Confirm</button>

                </form>
                {{-- <a id="modalLink" href="" class="btn btn-danger">Delete Post</a> --}}
            </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

<script>
    function handleDelete(id){
        // console.log('Deleting...', id);
        new bootstrap.Modal(document.getElementById('deleteModal')).show()
            document.modalForm.action = "posts/"+ id ;

        // var link = document.querySelector("#modalLink"); 
        //     link.getAttribute("action"); 
        //     link.setAttribute("action","posts/"+ id ); 
    }
</script>
    
@endsection
