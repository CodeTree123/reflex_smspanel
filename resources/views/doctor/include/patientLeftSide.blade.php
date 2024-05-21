<div class="profile blue-grey-border-thin   ">
    <h6 class="   p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">Patient's Profile</h6>
    <div class="complete">
        <div class="p-header">
            <!-- <img src="img/banner.jpg" class="cover"> -->
            @if($patient->image == null)
            <img src="{{ asset('assets/img/profile.png')}}" class="doctor-profile my-4">
            @else
            <img src="{{url('public/uploads/patient/'.$patient->image)}}" class="doctor-profile my-4 image_view_pointer image_view_sami">
            @endif
            <!-- <i class="fa-solid fa-pen-to-square"></i> -->
            <h2 class="mb-2">{{$patient->name}}</h2>
        </div>
        <div class="Patient-personal-info">
            <div class="row d-none" id="patientInfoList">
                <div class="col-12 text-start pe-1"><span class="fw-bolder">ID: </span>{{$patient->patient_id}}</div>
                <div class="col-12 text-start pe-1"><span class="fw-bolder">Age: </span>{{$patient->age}}</div>
                <div class="col-12 text-start pe-1 "><span class="fw-bolder">Gender: </span>{{$patient->gender}}</div>
                <div class="col-12 text-start pe-1 "><span class="fw-bolder">Blood Group: </span>{{$patient->Blood_group}}</div>
                <div class="col-12 text-start pe-1"><span class="fw-bolder">DOB: </span>{{$patient->date}}</div>
                <div class="col-12 text-start pe-1"><span class="fw-bolder">Mobile: </span>{{$patient->mobile}}</div>
                <div class="col-12 text-start pe-1"><span class="fw-bolder">Mobile Type: </span>{{$patient->m_type->name}}</div>
                <div class="col-12 text-start pe-1"><span class="fw-bolder">Occupation: </span>{{$patient->occupation}}</div>
                <div class="col-12 text-start pe-1"><span class="fw-bolder">Address: </span>{{$patient->address}}</div>
                <div class="col-12 text-start pe-1"><span class="fw-bolder">Email: </span>{{$patient->email}}</div>
            </div>
            <button class="btn btn-sm rounded-pill btn-outline-blue-grey mx-auto" id="SPatientDetails">Show Details</button>
        </div>
    </div>
</div>

@if(Route::current()->getName() == 'view_patient')
<div class="profile blue-grey-border-thin py-2">
    <!-- <h3>Treatment Plans</h3> -->
    <div class="complete">

        <!-- <a href="#" class="btns btn-outline-blue-grey my-2">Treatment Plans</a> -->
        {{-- <a href="{{route('appointment_list',[$doctor_info->id])}}" class="btns btn-outline-blue-grey my-2">Appointment</a>--}}
        <a href="{{route('doctor')}}" class="btns btn-outline-blue-grey my-2">Home</a>
        <a href="{{route('prescription',[$doctor_info->id,$patient->id])}}" class="btns btn-outline-blue-grey my-2">Write a Prescription</a>
        <a href="{{route('invoice',[$doctor_info->id,$patient->id])}}" class="btns btn-outline-blue-grey my-2">Billing</a>
    </div>

    <!-- <a href="">setting</a>
              <a href="" class="lgout-a">Logout</a> -->
</div>
@endif

@if(Route::current()->getName() == 'treatments')
<div class="profile  blue-grey-border-thin  py-2">
    <!-- <h3>Treatment Plans</h3> -->
    <div class="complete">
        {{-- <a href="{{route('view_patient',[$doctor_info->id,$patient->id])}}"--}}
        {{-- class="btns btn-outline-blue-grey my-2">--}}
        {{-- Patient Information--}}
        {{-- </a>--}}
        @if($treatment_info->status != 2)
        <a href="" class="btns btn-outline-blue-grey my-2" data-bs-toggle="modal" data-bs-target="#Next_Appointment_form">
            Next Appointment
        </a>
        @else
        <a href="{{route('view_patient',[$doctor_info->id,$patient->id])}}" class="btns btn-outline-blue-grey my-2">
            Patient Information
        </a>
        @endif
    </div>
</div>
@endif