@extends('admin.other.admin_other_master')

@section('content')
<div class="d-flex justify-content-center align-items-center mb-3">
    <span class="fs-4">Update Prodect</span>
</div>
<form action="{{route('edit_shop_product',$pro->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <div class="col-4">
            <div class="mb-2">
                <label for="cat" class="form-label">Select Category</label>
                <select class="form-select" aria-label="Default select example" id="cat" name="cat">
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}" {{$pro->cat_id == $cat->id ? ' selected':''}}>{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($pro->subcat_id != null)
            <div class="mb-2" id="subcat">
                <label for="sub_cat" class="form-label">Select Sub Category</label>
                <select class="form-select" aria-label="Default select example" id="sub_cat" name="sub_cat">
                    @foreach($subcats as $subcat)
                    <option value="{{$subcat->id}}" {{$pro->subcat_id == $subcat->id ? ' selected':''}}>{{$subcat->name}}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="mb-2" id="subcat_sec">
                <label for="sub_cat" class="form-label">Select Sub Category</label>
                <select class="form-select" aria-label="Default select example" id="sub_cat" name="sub_cat">

                </select>
            </div>
            @endif

            @if($pro->subsubcat_id != null)
            <div class="mb-2" id="sub_subcat">
                <label for="sub_sub_cat" class="form-label">Select Sub Sub Category</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat" name="sub_sub_cat">
                    @foreach($subsubcats as $subsubcat)
                    <option value="{{$subsubcat->id}}" {{$pro->subsubcat_id == $subsubcat->id ? ' selected':''}}>{{$subsubcat->name}}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="mb-2" id="sub_subcat_sec">
                <label for="sub_sub_cat" class="form-label">Select Sub Sub Category</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat" name="sub_sub_cat">

                </select>
            </div>
            @endif

            @if($pro->subsubcat1_id != null)
            <div class="mb-2" id="sub_subcat1">
                <label for="sub_sub_cat1" class="form-label">Select Sub Sub Category1</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat1" name="sub_sub_cat1">
                    @foreach($subsubcat1s as $subsubcat1)
                    <option value="{{$subsubcat1->id}}" {{$pro->subsubcat1_id == $subsubcat1->id ? ' selected':''}}>{{$subsubcat1->name}}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="mb-2" id="sub_subcat1_sec">
                <label for="sub_sub_cat1" class="form-label">Select Sub Sub Category1</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat1" name="sub_sub_cat1">

                </select>
            </div>
            @endif

            @if($pro->subsubcat2_id != null)
            <div class="mb-2" id="sub_subcat2">
                <label for="sub_sub_cat2" class="form-label">Select Sub Sub Category2</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat2" name="sub_sub_cat2">
                    @foreach($subsubcat2s as $subsubcat2)
                    <option value="{{$subsubcat2->id}}" {{$pro->subsubcat2_id == $subsubcat2->id ? ' selected':''}}>{{$subsubcat2->name}}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="mb-2" id="sub_subcat2_sec">
                <label for="sub_sub_cat2" class="form-label">Select Sub Sub Category2</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat2" name="sub_sub_cat2">

                </select>
            </div>
            @endif
        </div>
        <div class="col-8">
            <input type="hidden" name="supplier_id" value="{{auth()->user()->id}}">
            <div class="mb-2">
                <label for="pro_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="pro_name" aria-describedby="emailHelp" name="pro_name" value="{{$pro->pro_name}}">
                <span class="text-danger">@error('pro_name') {{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="pro_des" class="form-label">Description</label>
                <textarea class="form-control" id="pro_des" name="pro_des" rows="3">{{$pro->pro_description}}</textarea>
                <span class="text-danger">@error('pro_des') {{$message}} @enderror</span>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="mb-2">
                        <label for="pro_price" class="form-label">Product Price</label>
                        <input type="number" class="form-control" id="pro_price" aria-describedby="emailHelp" name="pro_price" value="{{$pro->pro_price}}">
                        <span class="text-danger">@error('pro_price') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-2">
                        <label for="pro_img" class="form-label">Product Image</label>
                        <input class="form-control" type="file" id="pro_img" name="pro_img">
                        <span class="text-danger">@error('pro_img') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="col-3">
                    <img src="{{asset('public/uploads/shop_product/'.$pro->pro_img)}}" alt="" width="150px" height="150px">
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mb-2">
        <a href="{{route('shop_admin_product_list')}}" class="btn btn-sm btn-danger rounded">Cancel</a>
        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update Product</button>
    </div>
</form>
@endsection

@section('page-modals')

@endsection

@push('page-js')
<script>
    $(document).ready(function() {

        $('#subcat_sec').hide();
        $('#sub_subcat_sec').hide();
        $('#sub_subcat1_sec').hide();
        $('#sub_subcat2_sec').hide();

        $('#cat').on('change', function() {
            var cat_id = this.value;
            var url = "{{route('fatch_subcat',[':cat_id'])}}";
            url = url.replace(':cat_id', cat_id);
            $("#sub_cat").html('');
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    let res_length = response.subcats.length;
                    // console.log(ts);
                    if (res_length != 0) {
                        $('#subcat_sec').show();
                        $('#subcat').show();
                        $('#sub_cat').html('<option value="" selected hidden>-- Open this select menu --</option>');
                        $.each(response.subcats, function(key, value) {
                            $("#sub_cat").append('\
                                <option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#sub_subcat_sec').hide();
                        $('#sub_subcat1_sec').hide();
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat').hide();
                        $('#sub_subcat1').hide();
                        $('#sub_subcat2').hide();
                    } else {
                        $('#subcat_sec').hide();
                        $('#sub_subcat_sec').hide();
                        $('#sub_subcat1_sec').hide();
                        $('#sub_subcat2_sec').hide();
                        $('#subcat').hide();
                        $('#sub_subcat').hide();
                        $('#sub_subcat1').hide();
                        $('#sub_subcat2').hide();
                    }
                }
            });
        });

        $('#sub_cat').on('change', function() {
            var id = this.value;
            var url = "{{route('fatch_sub_subcat',[':id'])}}";
            url = url.replace(':id', id);
            $("#sub_sub_cat").html('');
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    let res_length = response.sub_subcats.length;
                    if (res_length != 0) {
                        $('#sub_subcat_sec').show();
                        $('#sub_subcat').show();
                        $('#sub_sub_cat').html('<option value="" selected hidden>-- Open this select menu --</option>');
                        $.each(response.sub_subcats, function(key, value) {
                            $("#sub_sub_cat").append('\
                                <option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#sub_subcat1_sec').hide();
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat1').hide();
                        $('#sub_subcat2').hide();
                    } else {
                        $('#sub_subcat_sec').hide();
                        $('#sub_subcat1_sec').hide();
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat').hide();
                        $('#sub_subcat1').hide();
                        $('#sub_subcat2').hide();
                    }
                }
            });
        });

        $('#sub_sub_cat').on('change', function() {
            var id = this.value;
            var url = "{{route('fatch_sub_subcat1',[':id'])}}";
            url = url.replace(':id', id);
            $("#sub_sub_cat1").html('');
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    let res_length = response.sub_subcat1s.length;
                    if (res_length != 0) {
                        $('#sub_subcat1_sec').show();
                        $('#sub_subcat1').show();
                        $('#sub_sub_cat1').html('<option value="" selected hidden>-- Open this select menu --</option>');
                        $.each(response.sub_subcat1s, function(key, value) {
                            $("#sub_sub_cat1").append('\
                                <option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat2').hide();
                    } else {
                        $('#sub_subcat1_sec').hide();
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat1').hide();
                        $('#sub_subcat2').hide();
                    }
                }
            });
        });

        $('#sub_sub_cat1').on('change', function() {
            var id = this.value;

            var url = "{{route('fatch_sub_subcat2',[':id'])}}";
            url = url.replace(':id', id);
            $("#sub_sub_cat2").html('');
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    let res_length = response.sub_subcat2s.length;
                    if (res_length != 0) {
                        $('#sub_subcat2_sec').show();
                        $('#sub_subcat2').show();
                        $('#sub_sub_cat2').html('<option value="" selected hidden>-- Open this select menu --</option>');
                        $.each(response.sub_subcat2s, function(key, value) {
                            $("#sub_sub_cat2").append('\
                                    <option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat2').hide();
                    }
                }
            });

        });

    });
</script>

@endpush