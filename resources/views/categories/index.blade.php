@extends('layouts.admin-layout.app')
@section('content')
    <div class="d-flex justify-content-end text-light">
        <a href="{{ route('categories.create')}}" class="btn btn-outline-primary m-3">Add Category</a>
    </div>
    <div class="card bg-dark text-light ">
        <div class="card-header border border-bottom border-light"><h2>Categories</h2></div>
        <div class="card-body border border-light p-0">
            <table class="table table-hover table-dark m-0">
                <thead>
                  <tr class="text-center bg-black">
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger" onclick="displayModal({{ $category->id}})" data-toggle="modal" data-target="#deleteModal">
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
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Category!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" id="deleteCategoryForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Do You Want to Delete Category ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    <div class="bg-dark my-2">
        {{$categories->links('vendor.pagination.bootstrap-4')}}
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
