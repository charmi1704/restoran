@extends('website.layout.main')


@section('main_code')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">User Profile</h1>

    </div>
</div>

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">

        <div class="row g-4">

            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <img src="website/img/users/{{$data->img}}" width="100%" alt="">
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <h2 class="ff-secondary fw-normal text-start text-primary">
                        User Profile
                    </h2>
                    <h3 class="fw-normal text-start text-secondary">Id : {{$data->id}}</h3>
                    <h3 class="fw-normal text-start text-secondary">Name : {{$data->name}}</h3>
                    <h3 class="fw-normal text-start text-secondary">Email : {{$data->email}}</h3>
                    <h5 class="fw-normal text-start text-secondary">Mobile : {{$data->mobile}}</h5>
                    

                    <a href="editprofile/{{$data->id}}" class="btn btn-primary w-100 py-3">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection