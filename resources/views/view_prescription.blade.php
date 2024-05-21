<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="icon" type="image/x-icon" href="{{asset ('assets/img/reflex_logo.png')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Bootstrap 5.1.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/prescription_style.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/css/tab.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/css/multiselect.css')}}">


    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/css/style.css')}}">
    <title>ReflexDN</title>
</head>

<body class="bg-dark">

    <!-- ========= main ========= -->
    <main>
        <div class="container main">
            <section class="prescription-header">
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <div class="mb-3">
                            <h2 class="docname">hello</h2>
                            <ul class="list-unstyled">
                                <li>
                                    <p class="bmdcnum">D-5000</p>
                                </li>
                                <li>
                                    <h4 class="deg1">MBBS</h4>
                                </li>
                                <li>
                                    <p class="deg2"></p>
                                </li>
                                <li>
                                    <p class="DGR"></p>
                                </li>
                                <li>
                                    <h3></h3>
                                </li>
                            </ul>
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 qrcode">

                            </div>
                            <img src="{{asset ('assets/img/qr.png')}}" alt="Qr" class="img-fluid">
                        </div>
                        <div class="date">
                            <!-- <select class="form-select form-select-sm mb-2 doc_chembars">

                        </select> -->
                            <!-- <select class="form-select" aria-label="Default select example">
                            <option selected>Select Chamber</option>
                            <option value="1">Chamber 1</option>
                            <option value="2">Chamber 2</option> 
                        </select> -->
                            <h2 class="chem_name"></h2>

                            <p class="chem_phone"></p>
                            <p>06/06/2022</p>

                            <input type="hidden" class="doc_uid">
                            <input type="hidden" class="doc_uid_profile">
                            <p>06/06/2022</p>

                        </div>

                    </div>
                </div>
            </section>

            <section class="prescription-subheader">
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-sm table-borderless">
                            <tr class=" ">
                                <td class=""><span class="title">Name : {{$patient->name}}</span> <span class="value pres_pt_name"></span></td>
                                <td class=""><span class="title">Age : {{$patient->age}}</span> <span class="value pres_pt_age"></span></td>
                                <td class=""><span class="title">Date :{{ date('d-m-Y') }}</span> <span class="value pres_pt_date"></span></td>
                            </tr>
                            <tr class="">
                                <td class="  "><span class="title">Mobile : {{$patient->mobile}}</span> <span class="value pres_pt_mobile"></span></td>

                                <td class=" "><span class="title">Address : {{$patient->address}}</span> <span class="value pres_pt_address"></span></td>

                            </tr>
                        </table>
                    </div>
                </div>
            </section>

            <section class="prescription-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 left-col">
                            <div class="left">
                                <div class="single cc">
                                    <h2>C/C:</h2>

                                    <input type="text" value="38" id="hidden_teeth_number" readonly>
                                    <div class="complain d-flex justify-content-between align-items-center">
                                        <ol class="ms-5">
                                            @foreach($pc_c as $c_c)
                                            <li>{{$c_c}}</li>
                                            @endforeach
                                        </ol>
                                        <table class="tb">
                                            <tr class="tr-1">
                                                <th class="top-left" id="tl">13</th>
                                                <th class="top-right" id="tr">23 </th>
                                            </tr>
                                            <tr class="tr-2">
                                                <th class="bottom-left" id="bl"> 12</th>
                                                <th class="bottom-right" id="br"> 23</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="single oe">
                                    <h2>O/E:</h2>
                                    <div class="complain d-flex justify-content-between align-items-center">

                                        <ol class="ms-5">
                                            @foreach($pc_f as $c_f)
                                            <li>{{$c_f}}</li>
                                            @endforeach
                                        </ol>
                                        <table class="tb">
                                            <tr class="tr-1">
                                                <th class="top-left" id="tl">13</th>
                                                <th class="top-right" id="tr">23 </th>
                                            </tr>
                                            <tr class="tr-2">
                                                <th class="bottom-left" id="bl"> 12</th>
                                                <th class="bottom-right" id="br"> 23</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="single tp">
                                    <h2>T/P:</h2>
                                    <div class="complain d-flex justify-content-between align-items-center">

                                        <ol class="ms-5">
                                            @foreach($pt_p as $t_p)
                                            <li>{{$t_p}}</li>
                                            @endforeach
                                        </ol>
                                        <table>
                                            <tr class="tr-1">
                                                <th class="top-left">18</th>
                                                <th class="top-right">27</th>
                                            </tr>
                                            <tr class="tr-2">
                                                <th class="bottom-left">15</th>
                                                <th class="bottom-right">8</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="single investigation">
                                    <h2>Investigation:</h2>
                                    <div class="complain d-flex justify-content-between align-items-center">

                                        <ol class="ms-5">
                                            @foreach($investigations as $investigation)
                                            <li>{{$investigation}}</li>
                                            @endforeach
                                        </ol>
                                        <table>
                                            <tr class="tr-1">
                                                <th class="top-left">18</th>
                                                <th class="top-right">27</th>
                                            </tr>
                                            <tr class="tr-2">
                                                <th class="bottom-left">15</th>
                                                <th class="bottom-right">8</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="single advice mt-5">
                                    <h2>Advice:</h2>
                                    <!-- <div class="complain">
                                </div> -->
                                    <!-- <button type="button" class="btn btn-sm rounded-pill prescription-btn"
                                        data-bs-toggle="modal" data-bs-target="#advice">Add
                                    Investigation Advice</button> -->
                                    <textarea type="text" name="" id="" class="complain m-0 ms-5" value="" rows="3" style="width:80%" readonly></textarea>
                                </div>
                            </div>
                            <div class="timing mb-4 d-inline-block float-end">
                                <h6>Schedule Time</h6>
                                <div class="table-responsive">
                                    <table class="table-sm table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Day</th>
                                                <th>Morning</th>
                                                <th>Evening</th>
                                            </tr>
                                        </thead>
                                        <tbody class="doc_time_shc">
                                            <tr>
                                                <td>SAT</td>
                                                <td class="sat_mon">09:30-10:30 AM</td>
                                                <td class="sat_eve">09:30-10:30 AM</td>
                                            </tr>
                                            <tr>
                                                <td>SUN</td>
                                                <td class="sun_mon"></td>
                                                <td class="sun_eve"></td>
                                            </tr>
                                            <tr>
                                                <td>MON</td>
                                                <td class="mon_mor"></td>
                                                <td class="mon_eve"></td>
                                            </tr>
                                            <tr>
                                                <td>TUE</td>
                                                <td class="tue_mor"></td>
                                                <td class="tue_eve"></td>
                                            </tr>
                                            <tr>
                                                <td>WED</td>
                                                <td class="wed_mor"></td>
                                                <td class="wed_eve"></td>
                                            </tr>
                                            <tr>
                                                <td>THU</td>
                                                <td class="thu_mor"></td>
                                                <td class="thu_eve"></td>
                                            </tr>
                                            <tr>
                                                <td>FRI</td>
                                                <td class="fri_mor"></td>
                                                <td class="fri_eve"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="right">
                                <div class="single">

                                    <div class="mb-3">


                                        <img src="{{ asset ('assets/img/rx.png')}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="drug-list">
                                        <ol>
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div class="align-self-center">
                                                        <p class="drug-name">ALATROL 10MG TAB</p>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <!-- <button type="button" class="btn btn-sm p-o edit-drug"><i class="bi bi-pencil-square text-primary"></i></button> -->
                                                    </div>
                                                </div>
                                                <P class="qty">1+0+1 [ 5 day(s)] After Meal (Qty. 10)</P>
                                            </li>
                                        </ol>
                                    </div>

                                    <div class="drug-list">
                                        <ol>
                                            @foreach($drugs as $drug)
                                            <li>
                                                <div class="d-flex justify-content-between">
                                                    <div class="align-self-center">
                                                        <p class="drug-name">{{$drug->drug_name}}</p>
                                                    </div>
                                                    <div class="align-self-center">
                                                        <!-- <button type="button" class="btn crud-btns edit_drug" value="{{$drug->id}}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>

                                                    <button class="btn crud-btns delete-drug"  value="{{$drug->id}}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button> -->
                                                    </div>
                                                </div>
                                                <P class="qty">{{$drug->drug_time}} [ {{$drug->duration}} day(s) ] {{$drug->meal_time}} </P>
                                            </li>
                                            @endforeach
                                        </ol>
                                    </div>

                                    <!-- <button type="button" class="btn btn-sm btn-outline-blue-grey addDrug" data-bs-toggle="modal"
                                        data-bs-target="#drug" id="drugBtn">Add Drug
                                </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- <div class="logout"><a href="#" class="btn btn-sm btn-danger">Logout</a></div>  -->

        </div>
        <div>
            <!-- <button class="btn btn-primary print-btn" onclick="printpage()" id="printpagebutton"> 
            <i class="fa-solid fa-print"></i>
            Print
        </button>  
        
        <button type="button" class="btn btn-primary back-btn " id=" ">
           <a href="{{route('view_patient',[$doctor_info->id,$patient->id])}}" class="text-white">
            <i class="fa-solid fa-arrow-left-long"></i>
                Back
           </a>
        </button>
        <button type="button" class="btn btn-primary preview-btn " id="previewBtn">
        
            Preview
        </button>
        <button type="button" class="btn btn-primary submitPrescription-btn px-2 submitPrescription" value="{{$patient->id}}">Submit <br> Prescription
        </button>
    </div> -->
    </main>
    <!-- ========= M O D A L ========= -->
    <!-- Add Chief -->
    <div class="modal fade" id="chief">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <form action="#">
                <div class="modal-content">
                    <div class="modal-body">
                        <textarea class="form-control border-0" placeholder="Type Here.." rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-black">Update</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <!-- Examination Finding -->
    <div class="modal fade" id="exam">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form action="#">
                    <div class="modal-content">
                        <div class="modal-body">
                            <textarea class="form-control border-0" placeholder="Type Here.." rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-black">Update</button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Investigation Advice -->
    <div class="modal fade" id="advice">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form action="#">
                    <div class="modal-content">
                        <div class="modal-body">
                            <textarea class="form-control border-0" placeholder="Type Here.." rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-black">Update</button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal For Drug add-->
    <div class="modal fade" id="drug">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Add Drug For Patient
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-end me-2">
                    <a class="crud-btns me-2 add_medicine" href="" data-bs-toggle="modal" data-bs-target="#Medicine_Add">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                    <a class="crud-btns list_medicine" href="" data-bs-toggle="modal" data-bs-target="#Medicine_List">
                        <i class="bi bi-card-list"></i>
                    </a>
                </div>
                <form action="{{route('add_drug',[$doctor_info->id,$patient->id])}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <select class="form-control custom-form-control" name="drug_name" aria-label="Default select example" style="width:100%;">
                                <option value="Selected">Select Drug</option>
                                @foreach($medicines as $medicine)
                                <option value="{{$medicine -> name}}">{{$medicine -> name}}</option>
                                @endforeach
                            </select>
                            <!-- <input class="form-control" list="list" placeholder="Drug name-brand/generic" name="drug_name">
                        <datalist id="list" class="allGrugList">
                            @foreach($medicines as $medicine)
                            <option value="{{$medicine -> name}}">
                            @endforeach
                        </datalist> -->
                        </div>
                        <div class="mb-3 drug-time">

                            <select class="form-select" name="drug_time" value="">
                                <option>1+0+1</option>
                                <option>1+1+0</option>
                                <option>0+1+0</option>
                                <option>0+0+1</option>
                                <option>1+1+1</option>
                            </select>
                        </div>
                        <div class="mb-3 drug-meal-time">
                            <select class="form-select" name="meal_time">
                                <option>Before Meal</option>
                                <option>After Meal</option>
                            </select>
                        </div>
                        <div class="mb-3 drug-duration">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Duration/Days" value="1" name="duration">
                                </div>
                                <div class="col">
                                    <select class="form-select">
                                        <option>Day(s)</option>
                                        <option>Duration</option>
                                    </select>
                                </div>
                                <input type="hidden" name="date" value="{{ date('d-m-Y') }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Modal For Drug update -->
    <div class="modal fade" id="editDrug">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{route('update_drug')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="drug-id" name="drug_id">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="drug-name" placeholder="Drug name-brand/generic" name="drug_name">
                        </div>
                        <div class="mb-3 drug-time">
                            <input type="text" class="form-control" id="drug-time" placeholder="Timing" value="1+0+1" name="drug_time">
                        </div>
                        <div class="mb-3 drug-meal-time">
                            <select class="form-select" name="meal_time" id="meal-time">
                                <option>Before Meal</option>
                                <option>After Meal</option>
                            </select>
                        </div>
                        <div class="mb-3 drug-duration">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Duration/Days" value="" name="duration" id="duration">
                                </div>
                                <div class="col">
                                    <select class="form-select">
                                        <option>Day(s)</option>
                                        <option>Duration</option>
                                    </select>
                                </div>
                                <!-- <input type="hidden" name="date" value="{{ date('d-m-Y') }}"> -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">sDiscard</button>
                        <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal For Delete Drugs Information-->
    <div class="modal fade " id="del-drug" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Drugs Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_drug')}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete The information?</h5>
                        </div>
                        <input type="hidden" id="del-drug-id" name="deletingId">
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
    <!-- Modal For Save Prescription Information -->
    <div class="modal fade" id="p_submit">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('prescription_add',[$doctor_info->id,$t_id,$t_plans])}}" method="post">
                        @csrf
                        <h4>Are you sure to submit this prescription?</h4>
                        <input type="hidden" id="patientID" name="patientID">
                        <input type="hidden" id="drugIdList" name="drugIdList">
                        <input type="hidden" value="{{ date('d-m-Y') }}" name="date">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                            <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal For medicine Add -->
    <div class="modal fade " id="Medicine_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content new-medicine-modal">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Add New Medicine
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('medicine_add')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" placeholder="Enter New medicine" name="medicine_name">
                            </div>
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" placeholder="Enter medicine Brand" name="medicine_brand">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal For Medicine List -->
    <div class="modal fade " id="Medicine_List" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content medicine-list-modal">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Medicine List
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Medicine List-->
                    <table class="table table-bordered mt-4 text-center">
                        <thead>
                            <tr>
                                <th class="">Serial No</th>
                                <th class="">Medicine Name</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicines_lists as $key=>$medicines_list)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$medicines_list->name}}</td>
                                <td class="d-flex justify-content-around">
                                    <button type="button" class="btn crud-btns Medicine_editbtn" value="{{$medicines_list->id}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn crud-btns delete-Medicine" value="{{$medicines_list->id}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--Medicine list end -->
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal For Medicine update -->
    <div class="modal fade " id="Medicine_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content edit-medicine-info-modal">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Edit Medicine Info
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('update_medicine')}}" method="post">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="MedicineId" name="medicine_id" />
                        <div class="modal-body">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" id="Medicine_name" placeholder="Enter New chife Complaint" name="medicine_name">
                            </div>
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" id="Medicine_brand" placeholder="Enter New chife Complaint" name="medicine_brand">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-black">Update</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal For Delete Medicine -->
    <div class="modal fade " id="del-Medicine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Medicine
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_medicine')}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-Medicine-id" name="deletingId">
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


    <script src="{{asset ('assets/js/jquery-1.12.4.js')}}"></script>
    <script src="{{asset ('assets/js/popper.min.js')}}"></script>
    <script src="{{asset ('assets/js/bootstrap.min.js')}}"></script>





    <script src="{{asset ('assets/js/scroll-up.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset ('assets/js/custom.js')}}"></script>

    <script src="{{asset ('assets/js/multiselect.js')}}"></script>
    <script src="{{asset ('assets/js/prescription_app.js')}}"></script>

    <script src="{{asset ('assets/js/prescription.js')}}"></script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.add_medicine', function() {
                $('#drug').modal('hide');
            });

            $(document).on('click', '.list_medicine', function() {
                $('#drug').modal('hide');
            });

            $(document).on('click', '.edit_drug', function() {
                var drug_id = $(this).val();
                // alert(drug_id);
                $("#editDrug").modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit_drug/" + drug_id,
                    success: function(response) {
                        // console.log(response);
                        $('#drug-id').val(drug_id);
                        $('#drug-name').val(response.di.drug_name);
                        $('#drug-time').val(response.di.drug_time);
                        $('#meal-time').val(response.di.meal_time);
                        $('#duration').val(response.di.duration);
                    }
                });
            });

            $(document).on('click', '.delete-drug', function() {
                var deleteDrugId = $(this).val();
                $("#Medicine_List").modal('hide');
                // alert(drug_id);
                $("#del-drug").modal('show');
                $('#del-drug-id').val(deleteDrugId);
            });

            $(document).on('click', '.submitPrescription', function() {
                var patient_id = $(this).val();
                // alert(patient_id);
                $("#p_submit").modal('show');
                $.ajax({
                    type: "GET",
                    url: "/get_drug_info/" + patient_id,
                    success: function(response) {
                        // console.log(response);
                        $('#patientID').val(patient_id);
                        $('#drugIdList').val(response.drugIds);
                    }
                });
            });
            // Medicine update/edit
            $(document).on('click', '.Medicine_editbtn', function() {
                var medicine_id = $(this).val();
                // alert(medicine_id);
                $("#Medicine_Update").modal('show');
                $("#Medicine_List").modal('hide');
                $.ajax({
                    type: "GET",
                    url: "/edit_medicine/" + medicine_id,
                    success: function(response) {
                        console.log(response);
                        $('#MedicineId').val(medicine_id);
                        $('#Medicine_name').val(response.medicine_info.name);
                        $('#Medicine_brand').val(response.medicine_info.brand);
                    }
                });
            });
            // Medicine delete
            $(document).on('click', '.delete-Medicine', function() {
                var deleteMedicineId = $(this).val();
                $("#Medicine_List").modal('hide');
                // alert(drug_id);
                $("#del-Medicine").modal('show');
                $('#del-Medicine-id').val(deleteMedicineId);
            });

        });
    </script>



</body>

</html>