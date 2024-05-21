<!-- Modal for Tooth Tools -->
<div class="modal fade" id="Treatment_tools" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{route('treatment_info',[$doctor_info->id,$patient->id])}}" method="post">
                @csrf
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Treatment Information</h5> -->
                    <div class="modal_header">
                        <div class="row align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <h3 class="ps-0">Tooth No. <span class="multi_tooth_no"></span> </h3>
                                <input type="hidden" id="tooth_no_modal" name="tooth_no" value="{{old('tooth_no')}}" />
                                <input type="hidden" id="tooth_no_count_modal" name="tooth_no_count" value="{{old('tooth_no_count')}}" />
                            </div>
                            <div class="col-6 text-center">
                                <!-- <h3 name="tooth_side">Upper Right</h3> -->
                                <input type="text" id="tooth_side_modal" name="tooth_side" value="{{old('tooth_side')}}" readonly class="text-center" />
                            </div>
                            <div class="text-center">
                                <input type="hidden" id="tooth_type_modal" name="tooth_type" value="{{old('tooth_type')}}" readonly />
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-6 mb-3">
                            <h5 class="d-flex justify-content-between">
                                C/C Cheif Complaint 
                                <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div>
                            </h5>
                            <select class="form-select multi load_cc" name="pc_c[]" aria-label="Default select example" multiple style="width:100%;">
                                <option value="">Nothing To Select </option>
                                @foreach($c_cs as $c_c)
                                <option value="{{$c_c -> name}}">{{$c_c -> name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('pc_c') {{$message}} @enderror</span>
                            <div class="modal_ul">
                                @php
                                $fav_c_cs = $fav->fav_cc;
                                $fav_c_cs = explode(',',$fav_c_cs);
                                @endphp
                                @foreach($fav_c_cs as $key=>$fav_cc)
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-cc-{{$key + 1}}" autocomplete="off" name="pc_c[]" value="{{$fav_cc}}">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-cc-{{$key + 1}}">{{$fav_cc}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <h5 class="d-flex justify-content-between">
                                C/F Clinical Findings
                                <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Finding_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Findings">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div>
                            </h5>
                            <select class="form-control custom-form-control multi load_cf" name="pc_f[]" aria-label="Default select example" multiple style="width:100%;">
                                <option value="">Nothing To Select</option>
                                @foreach($c_fs as $c_f)
                                <option value="{{$c_f -> name}}">{{$c_f -> name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('pc_f') {{$message}} @enderror</span>
                            <div class="modal_ul">
                                @php
                                $fav_c_fs = $fav->fav_cf;
                                $fav_c_fs = explode(',',$fav_c_fs);
                                @endphp
                                @foreach($fav_c_fs as $key=>$fav_cf)
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-cf-{{$key + 1}}" autocomplete="off" name="pc_f[]" value="{{$fav_cf}}">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-cf-{{$key + 1}}">{{$fav_cf}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <h5 class="d-flex justify-content-between">Investigation
                                <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div>
                            </h5>
                            <select class="form-control custom-form-control multi load_invest" name="p_investigation[]" aria-label="Default select example" multiple style="width:100%;">
                                <option value="">Nothing To Select</option>
                                @foreach($investigations as $investigation)
                                <option value="{{$investigation->name}}">{{$investigation->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('p_investigation') {{$message}} @enderror</span>
                            <div class="modal_ul">
                                @php
                                $fav_investigations = $fav->fav_investigation;
                                $fav_investigations = explode(',',$fav_investigations);
                                @endphp
                                @foreach($fav_investigations as $key=>$fav_investigation)
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-inves-{{$key + 1}}" autocomplete="off" name="p_investigation[]" value="{{$fav_investigation}}">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-inves-{{$key + 1}}">{{$fav_investigation}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <h5 class="d-flex justify-content-between">T/P Treatment Plans
                                <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plan_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plans">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div>
                            </h5>
                            <select class="form-control custom-form-control multi load_TP" name="pt_p" aria-label="Default select example" style="width:100%;">
                                <option value="">Nothing To Select</option>
                                @foreach($t_ps as $t_p)
                                <option value="{{$t_p -> name}}">{{$t_p -> name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('pt_p') {{$message}} @enderror</span>
                            <div class="modal_ul">
                                @php
                                $fav_tps = $fav->fav_tp;
                                $fav_tps = explode(',',$fav_tps);
                                @endphp
                                @foreach($fav_tps as $key=>$fav_tp)
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-tp-{{$key + 1}}" autocomplete="off" name="pt_p_check" value="{{$fav_tp}}">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-tp-{{$key + 1}}">{{$fav_tp}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <!-- <button class="btn   btn-outline-blue-grey">Submit</button> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Mpdal end -->

<!-- Modal for Tooth Tools -->
<div class="modal fade" id="Treatment_edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{route('treatment_info_update',[$doctor_info->id,$patient->id])}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="treatment_id" id="treatment_id" value="">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Treatment Information</h5> -->
                    <div class="modal_header">
                        <div class="row align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <h3 class="ps-0">Tooth No. <span class="u_multi_tooth_no"></span> </h3>
                                <input type="hidden" id="u_tooth_no_modal" name="tooth_no" value="{{old('tooth_no')}}" />
                            </div>
                            <div class="col-6 text-center">
                                <!-- <h3 name="tooth_side">Upper Right</h3> -->
                                <input type="text" id="u_tooth_side_modal" name="tooth_side" value="{{old('tooth_side')}}" readonly class="text-center" />
                            </div>
                            <div class="text-center">
                                <input type="hidden" id="u_tooth_type_modal" name="tooth_type" value="{{old('tooth_type')}}" readonly />
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 mb-3">
                            <h5 class="d-flex justify-content-between">
                                C/C Cheif Complaint
                                <!-- <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div> -->
                            </h5>
                            <p class="mt-3" id="upc_c"></p>
                            {{--<select class="form-select multi2 load_cc" id="upc_c" name="pc_c[]" aria-label="Default select example" multiple style="width:100%;">
                                <option value="">Nothing To Select</option>
                                @foreach($c_cs as $c_c)
                                <option value="{{$c_c -> name}}">{{$c_c -> name}}</option>
                            @endforeach
                            </select>
                            <span class="text-danger">@error('pc_c') {{$message}} @enderror</span>
                            <div class="modal_ul">
                                @php
                                $fav_c_cs = $fav->fav_cc;
                                $fav_c_cs = explode(',',$fav_c_cs);
                                @endphp
                                @foreach($fav_c_cs as $key=>$fav_cc)
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-cc-{{$key + 1}}" autocomplete="off" name="pc_c[]" value="{{$fav_cc}}">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-cc-{{$key + 1}}">{{$fav_cc}}</label>
                                </div>
                                @endforeach
                            </div>--}}
                        </div>

                        <div class="col-12 mb-3">
                            <h5 class="d-flex justify-content-between">
                                C/F Clinical Findings
                                <!-- <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Finding_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Findings">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div> -->
                            </h5>
                            <p class="mt-3" id="upc_f"></p>
                            {{--<select class="form-control custom-form-control multi2 load_cf" id="upc_f" name="pc_f[]" aria-label="Default select example" multiple style="width:100%;">
                                <option value="">Nothing To Select</option>
                                @foreach($c_fs as $c_f)
                                <option value="{{$c_f -> name}}">{{$c_f -> name}}</option>
                            @endforeach
                            </select>
                            <span class="text-danger">@error('pc_f') {{$message}} @enderror</span>
                            <div class="modal_ul">
                                @php
                                $fav_c_fs = $fav->fav_cf;
                                $fav_c_fs = explode(',',$fav_c_fs);
                                @endphp
                                @foreach($fav_c_fs as $key=>$fav_cf)
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-cf-{{$key + 1}}" autocomplete="off" name="pc_f[]" value="{{$fav_cf}}">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-cf-{{$key + 1}}">{{$fav_cf}}</label>
                                </div>
                                @endforeach
                            </div>--}}
                        </div>

                        <div class="col-12 mb-3">
                            <h5 class="d-flex justify-content-between">Investigation
                                <!-- <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div> -->
                            </h5>
                            <p class="mt-3" id="up_investigation"></p>
                            {{--<select class="form-control custom-form-control multi2 load_invest" id="up_investigation" name="p_investigation[]" aria-label="Default select example" multiple style="width:100%;">
                                <option value="">Nothing To Select</option>
                                @foreach($investigations as $investigation)
                                <option value="{{$investigation->name}}">{{$investigation->name}}</option>
                            @endforeach
                            </select>
                            <span class="text-danger">@error('p_investigation') {{$message}} @enderror</span>
                            <div class="modal_ul">
                                @php
                                $fav_investigations = $fav->fav_investigation;
                                $fav_investigations = explode(',',$fav_investigations);
                                @endphp
                                @foreach($fav_investigations as $key=>$fav_investigation)
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-inves-{{$key + 1}}" autocomplete="off" name="p_investigation[]" value="{{$fav_investigation}}">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-inves-{{$key + 1}}">{{$fav_investigation}}</label>
                                </div>
                                @endforeach
                            </div>--}}
                        </div>

                        <div class="col-12 mb-3">
                            <h5 class="d-flex justify-content-between">T/P Treatment Plans
                                <!-- <div>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plan_Add">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plans">
                                        <i class="bi bi-card-list"></i>
                                    </a>
                                </div> -->
                            </h5>
                            <select class="form-control custom-form-control multi2 load_TP" id="upt_p" name="pt_p" aria-label="Default select example" style="width:100%;">
                                <option value="">Nothing To Select</option>
                                @foreach($t_ps as $t_p)
                                <option value="{{$t_p -> name}}">{{$t_p -> name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('pt_p') {{$message}} @enderror</span>
                            <div class="modal_ul">
                                @php
                                $fav_tps = $fav->fav_tp;
                                $fav_tps = explode(',',$fav_tps);
                                @endphp
                                @foreach($fav_tps as $key=>$fav_tp)
                                <div class="form-check btn_width p-0">
                                    <input type="checkbox" class="btn-check" id="btn-tp-{{$key + 1}}" autocomplete="off" name="pt_p_check" value="{{$fav_tp}}">
                                    <label class="btn btn-outline-secondary btn_test" for="btn-tp-{{$key + 1}}">{{$fav_tp}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <!-- <button class="btn   btn-outline-blue-grey">Submit</button> -->
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
<!-- Mpdal end -->

<!-- Modal For Delete Treatment Info -->
<div class="modal fade " id="del-tp-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Delete Treatment Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('treatment_info_delete')}}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete Tooth No:<span class="text-dark" id="del-t_num-name"></span> treatment's information?</h5>
                    </div>
                    <input type="hidden" id="del-tp_info-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal" aria-label="Close">Close</button>
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

<!-- Modal For C/C Chief Complaint List -->
<div class="modal fade " id="chife_Complaint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    C/C Chief Complaint List
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- C/C Chief Complaint List-->
                <table class="table table-bordered mt-4 text-center cc_list">
                    <thead>
                        <tr>
                            <th class="">Serial No</th>
                            <th class="">Chief Complaints</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lc_cs as $key=>$lcc)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$lcc->name}}</td>
                            @if($lcc->status == 1)
                            <td class="d-flex justify-content-around p-0">
                                <button type="button" class="btn crud-btns CC_editbtn {{"CC_".$lcc->id}}" href="" value="{{$lcc->id}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-cc" data-cc-name="{{$lcc->name}}" value="{{$lcc->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--C/C Chief Complaint list end -->
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For C/C Chief Complaint Add -->
<div class="modal fade " id="chife_Complaint_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Cheif Complaint
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('chife_complaint')}}" method="post" id="AddCCForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control custom-form-control" list="list" placeholder="Enter New Cheif Complaint" name="cc_name">
                            <span class="text-danger cc_name_error"></span>
                            <input type="hidden" name="cc_status" id="" value="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Discard</button>
                        <button type="submit" class="btn btn-sm btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For C/C Chief Complaint update -->
<div class="modal fade " id="chife_Complaint_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Cheif Complaint
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#chife_Complaint" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('update_chife_complaint')}}" method="post" id="UpdateCCForm">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="CCId" name="c_c_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="c_c_name" placeholder="Enter New Chief Complaint" name="Ucc_name">
                            <span class="text-danger Ucc_name_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#chife_Complaint">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For Delete C/C Chief Complaint -->
<div class="modal fade " id="del-CC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete C/C Chief Complaint
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#chife_Complaint" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('delete_chife_complaint')}}" method="POST" id="DeleteCCForm">
                    @csrf
                    @method('delete')
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark" id="del-cc-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-cc-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#chife_Complaint">Close</button>
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

<!-- Modal For C/F Clinical Findings List -->
<div class="modal fade " id="Clinical_Findings" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    C/F Clinical Findings List
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- C/F Clinical Findings List-->
                <table class="table table-bordered mt-4 text-center cf_list">
                    <thead>
                        <tr>
                            <th class="">Serial No</th>
                            <th class="">Clinical Findings</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lc_fs as $key=>$lcf)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$lcf->name}}</td>
                            @if($lcf->status == 1)
                            <td class="d-flex justify-content-around p-0">
                                <button class="btn crud-btns CF_editbtn {{"CF_".$lcf->id}}" value="{{$lcf->id}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-cf" data-cf-name="{{$lcf->name}}" value="{{$lcf->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--C/F Clinical Findings list end -->
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For C/F Clinical Findings Add -->
<div class="modal fade " id="Clinical_Finding_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Clinical Finding
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('clinical_finding')}}" method="post" id="AddCFForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Clinical Finding" name="cf_name">
                            <span class="text-danger cf_name_error"></span>
                            <input type="hidden" name="cf_status" id="" value="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For C/F Clinical Findings update -->
<div class="modal fade " id="Clinical_Finding_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Clinical Finding
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Clinical_Findings" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('update_clinical_finding')}}" method="post" id="UpdateCFForm">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="CFId" name="c_f_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="c_f_name" placeholder="Enter New Clinical Finding" name="Ucf_name">
                            <span class="text-danger Ucf_name_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Clinical_Findings">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete C/F Clinical Findings -->
<div class="modal fade " id="del-CF" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete C/F Clinical Findings
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Clinical_Findings" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('delete_clinical_finding')}}" method="POST" id="DeleteCFForm">
                    @csrf
                    @method('delete')
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark" id="del-cf-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-cf-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Clinical_Findings">Close</button>
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

<!-- Modal For Investigation List -->
<div class="modal fade " id="Investigation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Investigation List
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Investigation List-->
                <table class="table table-bordered mt-4 text-center invest_list">
                    <thead>
                        <tr>
                            <th class="">Serial No</th>
                            <th class="">Investigations</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($investigation_lists as $key=>$investigation_list)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$investigation_list->name}}</td>
                            @if($investigation_list->status == 1)
                            <td class="d-flex justify-content-around  p-0">

                                <button class="btn crud-btns Investigation_editbtn {{"Invest_".$investigation_list->id}}" href="" value="{{$investigation_list->id}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-Investigation" data-invest-name="{{$investigation_list->name}}" value="{{$investigation_list->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--Investigation list end -->
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Investigation Add -->
<div class="modal fade " id="Investigation_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Investigation
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('investigation')}}" method="post" id="AddInvestForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Investigation" name="investigation_name">
                            <span class="text-danger investigation_name_error"></span>
                            <input type="hidden" name="investigation_status" id="" value="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Investigation update -->
<div class="modal fade " id="Investigation_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Investigation
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Investigation" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('update_investigation')}}" method="post" id="UpdateInvestForm">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="InvestigationId" name="investigation_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="Investigation_name" placeholder="Enter Investigation" name="Uinvestigation_name">
                            <span class="text-danger Uinvestigation_name_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Investigation">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete Investigation -->
<div class="modal fade " id="del-Investigation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Investigation
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Investigation" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('delete_investigation')}}" method="POST" id="DeleteInvestForm">
                    @csrf
                    @method('delete')
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark" id="del-Invest-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-Investigation-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Investigation">Close</button>
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

<!-- Modal For T/P Treatment Plans List -->
<div class="modal fade " id="Treatment_Plans" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    T/P Treatment Plans List
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- T/P Treatment Plans List-->
                <table class="table table-bordered mt-4 text-center TP_list">
                    <thead>
                        <tr>
                            <th class="">Serial No</th>
                            <th class="">Treatment Plans</th>
                            <!-- <th class="">Cost</th> -->
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lt_ps as $key=>$ltp)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$ltp->name}}</td>
                            <!-- <td>{{$ltp->cost}}</td> -->
                            @if($ltp->status == 1)
                            <td class="d-flex justify-content-around  p-0">
                                <button class="btn crud-btns TP_editbtn {{"TP_".$ltp->id}}" href="" value="{{$ltp->id}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-tp" data-tp-name="{{$ltp->name}}" value="{{$ltp->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--T/P Treatment Plans list end -->
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For T/P Treatment Plans Add -->
<div class="modal fade " id="Treatment_Plan_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Treatment Plan
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('treatment_plan')}}" method="post" id="AddTPForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Treatment Plan" name="tp_name">
                            <span class="text-danger tp_name_error"></span>
                            <input type="hidden" name="tp_status" value="1">
                            <input type="hidden" name="d_id" id="" value="{{$doctor_info->id}}">
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter Cost" name="tp_cost">
                            <span class="text-danger tp_cost_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For T/P Treatment Plans update -->
<div class="modal fade " id="Treatment_Plan_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Treatment Plan
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Treatment_Plans" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('update_treatment_plan')}}" method="post" id="UpdateTPForm">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="TPId" name="t_p_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="t_p_name" placeholder="Enter New Clinical Finding" name="Utp_name">
                            <span class="text-danger Utp_name_error"></span>
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="t_p_cost" placeholder="Enter Cost" name="Utp_cost">
                            <span class="text-danger Utp_cost_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Treatment_Plans">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete T/P Treatment Plans -->
<div class="modal fade " id="del-TP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete T/P Treatment Plans
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Treatment_Plans" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('delete_treatment_plan')}}" method="POST" id="DeleteTPForm">
                    @csrf
                    @method('delete')
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span class="text-dark" id="del-TP-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-TP-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Treatment_Plans">Close</button>
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

<!-- Modal For T/P Estimated Cost List -->
<div class="modal fade " id="Estimated_Cost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Estimated Cost List
                </h5>
                <div class="w-75 d-flex justify-content-end">
                    <h5 class="modal-title text-danger mb-0 me-4" id="exampleModalLabel1">
                        Total Paid - {{$total_paid}}
                    </h5>
                    <h5 class="modal-title text-danger mb-0 mx-4" id="exampleModalLabel2">
                        Total Due - {{$total_due}}
                    </h5>
                    <h5 class="modal-title text-danger mb-0 ms-4" id="exampleModalLabel2">
                        Discount @if($discount != null)
                        @if($discount->discount_type == "precent")
                        ({{$discount->discount}}%)
                        @else
                        (৳ {{$discount->discount}})
                        @endif
                        @endif - {{$total_discount}}
                    </h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-center">Total Cost List</h6>
                        <!-- T/P Treatment Cost List-->
                        <table class="table table-bordered mt-3 text-center align-middle">
                            <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="">Treatment Plans</th>
                                    <th class="">Cost</th>
                                    <!-- <th class="">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($treatment_infos as $key=>$t_p_cost)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$t_p_cost->treatment_plans}} - {{$t_p_cost->tooth_no}}</td>
                                    <td>{{$t_p_cost->cost}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td>{{$total_cost}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <!--T/P Treatment Cost list end -->
                    </div>
                    <div class="col-6">
                        <h6 class="text-center">Total Cost Paid List</h6>
                        <!-- T/P Treatment Cost paid List-->
                        <table class="table table-bordered mt-3 text-center align-middle">
                            <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="">Date</th>
                                    <th class="">Treatment Plans</th>
                                    <th class="">Paid Amount</th>
                                    <!-- <th class="">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($treatment_payments as $key=>$t_p_payment)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$t_p_payment->p_id}}</td>

                                    <td>{{\Carbon\Carbon::parse($t_p_payment->date)->format('d-m-Y')}}</td>
                                    <td>{{$t_p_payment->treatment_plans}} - {{$t_p_payment->tooth_no}}</td>
                                    <td>{{$t_p_payment->paid_amount}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No Payment Added Yet.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!--T/P Treatment Cost paid list end -->
                    </div>
                </div>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete Prescription -->
<div class="modal fade " id="del-Prescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Prescription
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('prescription_delete')}}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete <span class="text-dark" id="del-Prescription-name"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-Prescription-id" name="deletingId">
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