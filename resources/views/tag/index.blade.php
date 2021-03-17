@extends('layouts.home')
@section('title')
    Fash9ja Gist tags
@endsection

@section('content')
   
    <div class="container">
        <div class="row justify-text-center">
            <div class="col-md-8">
            
                <div class="card card-default">
                    <div class="card-header">
                            Tags
                    </div>
                    <div class="card-body">
                        @if ($tags->count() > 0)
                            
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">tag</th>
                                <th scope="col">Post Count</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                    <th scope="row">{{$tag->name}}</th>
                                    <td>{{$tag->posts->count()}}</td>
                                    {{-- <td>0</td> --}}
                                    <td> 
                                        <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-info btn-sm float-right">Edit</a>
                                    </td>
                                    <td>
                                        <a  class="btn btn-danger btn-sm float-right" onclick="handleDelete({{$tag->id}})">Delete</a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            No tag yet
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    

    <div class="modal" id="deleteModal" tabindex="-1">
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
    </div>

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
