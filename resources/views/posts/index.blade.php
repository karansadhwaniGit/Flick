@extends('layouts.admin-layout.app')
@section('content')
    <div class="d-flex justify-content-end text-light">
        <a href="{{ route('posts.create')}}" class="btn btn-outline-primary m-3">Add Posts</a>
    </div>
    <div class="card bg-dark text-light ">
        <div class="card-header border border-bottom border-light"><h2>Posts</h2></div>
        <div class="card-body border border-light p-0">
            <table class="table table-hover table-dark m-0">
                <thead>
                  <tr class="text-center bg-black">
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Excerpt</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{asset("$post->image_path")}}" alt="" width="80"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->excerpt}}</td>
                        <td>
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger" onclick="displayModal({{ $post->id}})" data-toggle="modal" data-target="#deleteModal">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>

    {{-- DELETE MODAL --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header" style="border:none">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Tag!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white">&times;</span>
                  </button>
                </div>
                <form action="" method="POST" id="deleteCategoryForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body border border-secondary">
                        Do You Want to Delete Post ?
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </div>
                </form>
              </div>
        </div>
      </div>
    <div class="bg-dark my-2">
        {{$posts->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection

@section('page-level-scripts')
    <script>
        function displayModal(categoryId){
            var url = "/categories/"+ categoryId;
            $("#deleteCategoryForm").attr('action',url);
        }
</script>
@endsection
