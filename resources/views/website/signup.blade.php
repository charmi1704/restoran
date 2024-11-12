<?php
if (session()->has('ses_userid')) {
  echo "<script>window.location='/';</script>";
}
?>
@extends('website.layout.main')


@section('main_code')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Signup Here</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Signup</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">SIGNUP HERE</h5>
        </div>
        <div class="row g-4">
            

            <div class="col-md-12">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form action="{{url('/insert_signup')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div>
                                <input class="form-control mb-3" type="text" name="name" value="{{old('name')}}" placeholder="Name" />
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input class="form-control mb-3" type="file" name="img" placeholder="Password" />
                                @error('img')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input class="form-control mb-3" type="email" name="email" value="{{old('email')}}" placeholder="Email" />
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input class="form-control mb-3" type="password" name="password" value="{{old('password')}}" placeholder="Password" />
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input class="form-control mb-3" type="number" name="mobile" value="{{old('mobile')}}" placeholder="Mobile" />
                                @error('mobile')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                            </div>
                            <a href="login">If you already regisrted then Login Here</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection