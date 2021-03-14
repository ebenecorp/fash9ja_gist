@extends('layouts.home')
@section('title')
    Fash9ja Gist Posts
@endsection

@section('content')
   
    <div class="container">
        <div class="row justify">
            <div class="col-md-8">
            
                <div class="card card-default">
                    <div class="card-header">
                         Posts
                    </div>
                    <div class="card-body">
                         
                    
                        @if ($posts->count() > 0 )
                            
                            <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)

                                        <tr>
                                            <td>{{$post->title}}</td>
                                            <td>
                                                 <a href="{{route('category.edit', $post->category->id)}}" >{{$post->category->name}}</a>                                               
                                            </td>
                                            <td>
                                                @if ($post->trashed())

                                                    <form action="{{route('posts.restore', $post->id)}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                        <button type="submit" class="btn btn-info btn-sm ">Restore</button>
                                                    </form>
                                                
                                                    @else
                                                
                                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm float-right">Edit</a>
                                                @endif
                                            </td>
                                        
                                            <td>
                                                <a  class="btn btn-danger btn-sm float-right" onclick="handleDelete({{$post->id}})"> {{$post->trashed()? 'Delete' : 'Trash'}}</a>

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <h3 class="text-center">
                                    No Posts yet
                                </h3>
                            @endif

                    
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
