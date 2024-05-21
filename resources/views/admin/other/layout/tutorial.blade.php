@extends('admin.other.admin_other_master')

@push('page-css')
    <!-- Forum CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/forum.css')}}">
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <span class="fs-4">Tutorial List</span>
        <a class="crud-btns" data-bs-toggle="modal" data-bs-target="#AddTutorialModal">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>
    <!-- C/C Supplier List-->
    <table class="table table-bordered mt-2 text-center align-middle T_list">
        <thead>
        <tr>
            <th class="">#</th>
            <th class="">Title</th>
            <th class="">Description</th>
            <th class="">Link</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tutorials as $key=>$tutorial)
            <tr>
                <td class="p-0">{{$key+1}}</td>
                <td class="p-0" width="25%">{{$tutorial->title}}</td>
                <td class="p-0" width="25%" >{{$tutorial->description}}</td>
                <td class="p-0 admin-tutorial-container" width="25%">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$tutorial->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                </td>
                <td>
                    @if($tutorial->showStatus == 0)
                        <p class="text-danger mb-0">Hidden</p>
                    @else
                        <p class="text-success mb-0">Visible</p>
                    @endif
                </td>
                <td class="p-0" width="10%">
                    <div class="d-flex justify-content-evenly">
                        @if($tutorial->showStatus == 0)
                            <a href="{{route('tutorial_status',[$tutorial->id])}}" class="btn btn-sm rounded btn-success my-1 d-flex align-items-center">
                                <i class="fa-solid fa-check"></i>
                            </a>
                        @else
                            <a href="{{route('tutorial_status',[$tutorial->id])}}" class="btn btn-sm rounded btn-danger my-1 d-flex align-items-center">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        @endif
                        <button class="btn btn-sm crud-btns edit-tutorial {{"T_".$tutorial->id}}" value="{{$tutorial->id}}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn btn-sm crud-btns delete-tutorial" value="{{$tutorial->id}}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No Event Added Yet In This Section.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $tutorials ->links() }}
@endsection

@section('page-modals')

    <!-- Modal Add Event -->
    <div class="modal fade" id="AddTutorialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0" id="exampleModalLabel">Add Tutorial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('tutorial_add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="eventTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="eventTitle" placeholder="Add Title" name="title">
                            <span class="text-danger">@error('title') {{$message}} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Location</label>
                            <textarea class="form-control" id="description" rows="3" name="description" placeholder="Add Description"></textarea>
                            <span class="text-danger">@error('description') {{$message}} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="y_link" class="form-label">Youtube Link</label>
                            <textarea class="form-control" id="y_link" rows="2" name="y_link" placeholder="Add Link"></textarea>
                            <span class="text-danger">@error('y_link') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Model -->

    <!-- Modal Add Event -->
    <div class="modal fade" id="EditTutorialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-0" id="exampleModalLabel">Update Tutorial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('tutorial_update')}}" method="post" enctype="multipart/form-data" id="T_UpdateForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="form-control" name="tutorial_id" id="tutorial_id" value="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="u_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="u_title" placeholder="Add Title" name="u_title">
                            <span class="text-danger u_title_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="u_description" class="form-label">Location</label>
                            <textarea class="form-control" id="u_description" rows="3" name="u_description" placeholder="Add Description"></textarea>
                            <span class="text-danger u_description_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="u_y_link" class="form-label">Youtube Link</label>
                            <textarea class="form-control" id="u_y_link" rows="2" name="u_y_link" placeholder="Add Link"></textarea>
                            <span class="text-danger u_y_link_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Model -->

    <!-- Modal For Delete Supplier -->
    <div class="modal fade " id="del-tutorial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                        Delete Event
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('tutorial_delete')}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete Tutorial?</h5>
                        </div>
                        <input type="hidden" id="del-tutorial-id" name="deletingId">
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
            @if(Session::has('invalidTutoAdd') && count($errors) > 0)
            $('#AddTutorialModal').modal('show');
            @endif

            $(document).on('click', '.edit-tutorial', function () {
                var tutorial_id = $(this).val();
                var url = "{{route('tutorial_edit',[':id'])}}";
                url = url.replace(':id', tutorial_id);
                // alert(tutorial_id);
                $("#EditTutorialModal").modal('show');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        // console.log(response.notice);
                        $('#tutorial_id').val(tutorial_id);
                        $('#u_title').val(response.t.title);
                        $('#u_description').val(response.t.description);
                        $('#u_y_link').val(response.t.video);
                    }
                });
            });

            $(document).on('submit', '#T_UpdateForm', function (e) {
                e.preventDefault();

                var url = $(this).attr('action');
                // alert(url);

                var registerForm = $("#T_UpdateForm");
                var formData = registerForm.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // console.log(data);
                        if (data.status == 200) {
                            $('#EditTutorialModal').load(location.href + " #EditTutorialModal>*", "");
                            $('.T_list').load(location.href + " .T_list>*", "");
                            $(document).sami_Toast_Append({
                                cus_toast_time: 3000,
                                cus_toast_msg: data.msg
                            });

                            $('#EditTutorialModal').modal('hide');
                        } else {
                            $.each(data.error, function (key, value) {
                                $('.' + key + '_error').text(value);
                            });
                            $('.T_' + data.id).click();
                        }
                    },
                });
            });

            $(document).on('click', '.delete-tutorial', function () {
                var deleteReportId = $(this).val();

                $("#del-tutorial").modal('show');
                $('#del-tutorial-id').val(deleteReportId);
            });

        });
    </script>
@endpush
