@extends('admin.other.admin_other_master')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        @if($post_type == 4)
        <span class="fs-4">Case Studies List</span>
        @elseif($post_type == 3)
        <span class="fs-4">Product Review List</span>
        @elseif($post_type == 2)
        <span class="fs-4">Article List</span>
        @else
        <span class="fs-4">Normal Post List</span>
        @endif
{{--        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#supplier_Add">--}}
{{--            <i class="bi bi-plus-circle"></i>--}}
{{--        </a>--}}
    </div>
    <!-- C/C Supplier List-->
    <table class="table table-bordered mt-2 text-center align-middle">
        <thead>
        <tr>
            <th class="">#</th>
            <th class="">Doctor Name</th>
            @if($post_type != 1)
            <th class="">Post Title</th>
            @else
            <th class="">Post</th>
            @endif
            <th class="">Post Views</th>
            <th class="">Post likes</th>
            <th class="">Post Comments</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $key=>$post)
            <tr>
                <td class="p-0">{{$key+1}}</td>
                <td class="p-0">{{$post->doc_post->fname." ".$post->doc_post->lname}}</td>
                @if($post->post_type != 1)
                <td class="p-0">{{$post->post_title}}</td>
                @else
                <td class="p-0">{{$post->description}}</td>
                @endif
                <td class="p-0">{{$post->view_count}}</td>
                <td class="p-0">{{$post->likes_count}}</td>
                <td class="p-0">{{$post->comments_count}}</td>
                <td>
                    @if($post->showStatus == 0)
                        <p class="text-danger mb-0">Hidden</p>
                    @else
                        <p class="text-success mb-0">Visible</p>
                    @endif
                </td>
                <td class="d-flex justify-content-around p-0">
                    <a href="{{route('forum_post_view',[$post->id])}}" class="btn btn-sm rounded my-1 d-flex align-items-center"><i class="fa-solid fa-file fa-lg"></i></a>
                    @if($post->showStatus == 0)
                    <a href="{{route('forum_post_status',[$post->id])}}" class="btn btn-sm rounded btn-success my-1 d-flex align-items-center"><i class="fa-solid fa-eye"></i></a>
                    @else
                    <a href="{{route('forum_post_status',[$post->id])}}" class="btn btn-sm rounded btn-danger my-1 d-flex align-items-center"><i class="fa-solid fa-eye-slash"></i></a>
                    @endif
                    <button class="btn crud-btns delete-post" value="{{$post->id}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                @if($post_type != 1)
                <td colspan="8">No Post Added Yet In This Section.</td>
                @else
                <td colspan="7">No Post Added Yet In This Section.</td>
                @endif
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $posts ->links() }}
@endsection

@section('page-modals')

    <!-- Modal For Delete Supplier -->
    <div class="modal fade " id="del-post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Post
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('forum_post_delete')}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete Post information?</h5>
                        </div>
                        <input type="hidden" id="del-post-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                            <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection

@push('page-js')
    <script>
        $(document).ready(function () {
            @if(Session::has('invalidSupplierAdd') && count($errors) > 0)
            $('#supplier_Add').modal('show');
            @endif

            $(document).on('click', '.delete-post', function () {
                var deleteReportId = $(this).val();

                $("#del-post").modal('show');
                $('#del-post-id').val(deleteReportId);
            });

        });
    </script>
@endpush
