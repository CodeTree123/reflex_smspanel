<div class="profile blue-grey-border-thin">

    <h6 class="   p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">
        forum's Profile
    </h6>
    <div class="">
        <div class=" p-2 ms-1">

            <a href="{{route('forum')}}" class="d-flex align-items-center p-3 ps-0 left-one-box-first rounded">
                <div class="me-1 p-2 border rounded">
                    <i class="fa-solid fa-certificate"></i>
                </div>
                <div class="ms-1">
                    <p class="left-one-title fw-bold text-start">Newest and Recent</p>
                    <p class="left-one-text text-start">Find the Latest Update</p>
                </div>
            </a>

            <a href="{{route('forum_populerPost_list')}}" class="d-flex align-items-center p-3 ps-0 left-one-box-second rounded">
                <div class="me-1 p-2 border rounded  ">
                    <i class="fa-solid fa-message  "></i>
                </div>
                <div class="ms-1">
                    <p class="left-one-title fw-bold text-start">Popular of the Day</p>
                    <p class="left-one-text text-start">Shots featured today by curators</p>
                </div>
            </a>

            <a href="{{route('forum_favPost_list')}}" class="d-flex align-items-center p-3 ps-0 left-one-box-third rounded">
                <div class="me-1 p-2 border rounded  ">
                    <i class="fa-solid fa-user  "></i>
                </div>
                <div class="mx-1">
                    <p class="left-one-title fw-bold text-start">My Favourite Post</p>
                </div>
                @php
                $fav_count = \App\Models\forum_post_favorite::where('u_id',auth()->user()->id)->count();
                @endphp
                <p class="badge bg-orange">{{$fav_count}}</p>
            </a>

        </div>

    </div>

</div>

<div class="profile blue-grey-border-thin py-2">
    <!-- <h3>Treatment Plans</h3> -->
    <div class=" left-second-box">

        <a href="{{route('forum_case_studies')}}" class="d-flex   align-items-center my-1 p-2">
            <div class="align-self-start mx-1 bg-low-brown rounded side_icon_size1">
                <i class="fa-solid fa-dollar-sign fa-xl text-bright-orange"></i>
            </div>
            <div class="mx-1 ">
                <h6>Case Studies</h6>
            </div>
        </a>

        <a href="{{route('forum_article')}}" class="d-flex   align-items-center my-1 p-2">
            <div class="align-self-start mx-1 bg-low-blue rounded side_icon_size2">
                <i class="fa-solid fa-newspaper fa-xl text-bright-blue"></i>
            </div>
            <div class="mx-1 ">
                <h6>Articles</h6>
            </div>
        </a>

        <a href="{{route('forum_product_review')}}" class="d-flex   align-items-center my-1 p-2">
            <div class="mx-1 bg-low-orange rounded side_icon_size2">
                <i class="fa-solid fa-pencil fa-xl text-bright-orange"></i>
            </div>
            <div class="mx-1 text-start">
                <h6>Product Review</h6>
            </div>
        </a>

        <a href="#" class="d-flex   align-items-center my-1 p-2">
            <div class="mx-1 bg-low-orange rounded side_icon_size">
                <i class="fa-solid fa-code fa-xl text-orange"></i>
            </div>
            <div class="mx-1 ">
                <h6>E-Book</h6>
            </div>
        </a>

        <a href="{{route('viewTutorial')}}" class="d-flex   align-items-center my-1 p-2">
            <div class="mx-1 bg-low-orange rounded side_icon_size2">
                <i class="fa-regular fa-circle-play fa-xl text-orange"></i>
            </div>
            <div class="mx-1 text-start">
                <h6>Reflex Turorial</h6>
            </div>
        </a>

    </div>

    <!-- <a href="">setting</a>
            <a href="" class="lgout-a">Logout</a> -->
</div>
