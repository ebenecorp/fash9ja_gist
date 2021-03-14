@extends('layouts.home')
@section('title')
    Fash9ja Gist categories
@endsection

@section('content')
   
    <div class="container">
        <div class="row justify-text-center">
            <div class="col-md-8">
            
                <div class="card card-default">
                    <div class="card-header">
                            Categories
                    </div>
                    <div class="card-body">
                        @if ($categories->count() > 0)
                            
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Post Count</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                    <th scope="row">{{$category->name}}</th>
                                    <td>{{$category->posts->count()}}</td>
                                    <td> 
                                        <a href="/categories/{{ $category->id }}/edit" class="btn btn-info btn-sm float-right">Edit</a>
                                    </td>
                                    <td>
                                        <a  class="btn btn-danger btn-sm float-right" onclick="handleDelete({{$category->id}})">Delete</a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            No Category yet
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
                <h5 class="modal-title">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Category</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a id="modalLink" href="" class="btn btn-danger">Delete Category</a>
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

         var link = document.querySelector("#modalLink"); 
            link.getAttribute("href"); 
            link.setAttribute("href","/categories/"+ id + "/delete"); 
    }
</script>
    
@endsection
