@extends('website.layout.main')


@section('main_code')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Items</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">

                        <?php
                        if (!empty($menu_arr)) {
                            foreach ($menu_arr as $w) {
                        ?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="admin/assets/img/menu/<?php echo $w->img; ?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $w->name; ?></span>
                                                <span class="text-primary">₹<?php echo $w->price; ?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo $w->description; ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td align="center" colspan="8"> Data Not Found </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->

@endsection