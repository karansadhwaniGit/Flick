@extends('layouts.admin-layout.app')
@section('content')
    <div class="card bg-dark text-light ">
        <div class="card-header border border-bottom border-light"><h2>Posts</h2></div>
        <div class="card-body border border-light p-0">
            <table class="table table-hover table-dark m-0">
                <thead>
                  <tr class="text-center bg-black">
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Posts Count</th>
                    <th scope="col">Roles</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                @foreach($users as $user)
                    <tr>
                        <td><img src="{{asset($user->gravatar_image)}}" alt="" width="60"></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->posts->count()}}</td>
                        <td>
                            <form action="{{route('users.update',$user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                @if(!$user->isAdmin())
                                    <button class="btn btn-outline-success">Make Admin</button>
                                @else
                                    <button class="btn btn-outline-danger">Revoke Admin</button>
                                @endif
                            </form>
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
        {{$users->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection

@section('page-level-scripts')
    <script>
        function displayModal(postId){
            var url = "/posts/trash/"+ postId;
            $("#deleteCategoryForm").attr('action',url);
        }
</script>
@endsection
