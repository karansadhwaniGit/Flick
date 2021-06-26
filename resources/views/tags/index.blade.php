@extends('layouts.admin-layout.app')
@section('content')
    <div class="d-flex justify-content-end text-light">
        <a href="{{ route('tags.create')}}" class="btn btn-outline-primary m-3">Add Tag</a>
    </div>
    <div class="card bg-dark text-light ">
        <div class="card-header border border-bottom border-light"><h2>Tags</h2></div>
        <div class="card-body border border-light p-0">
            <table class="table table-hover table-dark m-0">
                <thead>
                  <tr class="text-center bg-black">
                    <th scope="col">Tags</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->name}}</td>
                        <td>
                            <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger" onclick="displayModal({{$tag->id}})" data-toggle="modal" data-target="#deleteModal">
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
            <form action="" method="POST" id="deleteTagForm">
                @csrf
                @method('DELETE')
                <div class="modal-body border border-secondary">
                    Do You Want to Delete Tag ?
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
        {{$tags->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection

@section('page-level-scripts')
    <script>
        function displayModal(tagId){
            var url = "/tags/"+ tagId;
            $("#deleteTagForm").attr('action',url);
        }
</script>
@endsection
