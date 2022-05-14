@extends('user.layout.style')
@section('content')
    <!-- -------------------------------home section------------------------------------- -->
    <section class="home-section vh-100" id="home-section">
        <!-- -------------------------------banner------------------------------------- -->
        <div class="container">
            <div  class="row align-items-center py-5 py-md-0" style="height: 80vh;">
                <div class="col-12 col-md-6">
                    <div class="left-banner-container">
                        <h5 class="banner-small-title">Free Home Delivery 24 Hours</h5>
                        <h1 class="banner-title my-3 fw-bolder">THE TASTIEST & BEST PIZZA IN THE TOWN</h1>
                        <p class="text-secondary my-4 long-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid sequi ratione quod! Laudantium veniam odio eum dolorum nesciunt temporibus, nihil commodi ipsa voluptas autem doloremque, id in officiis totam possimus!</p>
                        <a href="#pizza-section" class="btn btn-primary text-white rounded-pill shadow-lg">Order Now <i class="fa-solid fa-angle-right ms-2"></i></a>
                        <a href="#pizza-section" class="btn btn-outline-primary rounded-pill ms-3">Show Menu</a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="right-banner-container py-5 py-md-0">
                        <div class="img-box-color d-none d-md-block"></div>
                        <img src="{{ asset('customer/img/banner_image.png') }}" class="banner-img" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- -------------------------------service section------------------------------------- -->
    <section class="service-section py-5 bg-white" id="service-section" style="min-height: 300px;">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="service-box card bg-white border-0" style="border-radius: 30px ;">
                        <div class="card-body text-center">
                            <img src="{{ asset('customer/img/bike.png') }}" class="img-fluid" alt="" srcset="" style="width: 100px ;">
                            <h4 class="mt-4">Fastest Delivery</h4>
                            <p class="text-black-50">Delivery that is always anytime even faster</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="service-box card bg-white border-0" style="border-radius: 30px ;">
                        <div class="card-body text-center">
                            <img src="{{ asset('customer/img/order.jpg') }}" class="img-fluid" alt="" srcset="" style="width: 100px ;">
                            <h4 class="mt-4">Easy To Order</h4>
                            <p class="text-black-50">You only need a few steps in ordering food</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="service-box card bg-white border-0" style="border-radius: 30px ;">
                        <div class="card-body text-center">
                            <img src="{{ asset('customer/img/pizza.png') }}" class="img-fluid" alt="" srcset="" style="width: 100px ;">
                            <h4 class="mt-4">Tasty Pizza</h4>
                            <p class="text-black-50">The tastiest and fresh pizza in town</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- -------------------------------pizza section------------------------------------- -->
    <section class="pizza-section" id="pizza-section">
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="pizza-left-container">
                        <div class="row">
                            <div class="col-12">
                                <div class="px-3 py-2 bg-white rounded d-flex justify-content-between align-items-center" style="border-radius: 10px !important;">
                                    <h4 class="mb-0">Our Pizza Menu</h4>
                                </div>
                            </div>
                        </div>
                        <!-- -------------------------------pizza-box-container------------------------------------- -->
                        <div class="row pizza-box-container my-4">
                            <div class="row">
                                <!-- -------------------------------pizza-boxs------------------------------------- -->
                                @foreach ($pizzas as $item)
                                    <div class="col-4">
                                        <div class="card pizza-card position-relative">
                                            <!-- -------------------------------ribbon------------------------------------- -->
                                            @if ($item->buy_one_get_one_status == 1)
                                                <div class="ribbon h6 mb-0">Buy 1 Get 1</div>
                                            @endif
                                            <div class="card-body">
                                                <div class="card-img-container p-2">
                                                    <img src="{{ asset('uploads/'.$item->image) }}" class="img-fluid" alt="" srcset="">
                                                </div>
                                                <div class="mt-4">
                                                    <h5>{{ $item->pizza_name }}</h5>
                                                    <div class="d-flex justify-content-between pizza-dis my-2">
                                                        <span class="">Discount: {{ $item->discount_price }} Ks</span>
                                                        <span class="">Waiting Time: {{ $item->waiting_time }} min</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="h5 mb-0">{{ $item->price }} Ks</div>
                                                        <a href="" class="">View Detail</a>
                                                    </div>
                                                    <button class="btn btn-primary rounded-pill w-100 text-white">Order Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- -------------------------------pizza-boxs------------------------------------- -->

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-3">
                    <!-- -------------------------------pizza-right-container------------------------------------- -->
                    <div class="pizza-right-container card border-0  bg-white p-3 position-sticky">
                        <!-- -------------------------------search bar------------------------------------- -->
                        <form action="">
                            <div class="d-flex pizza-search-bar" style="border-radius: 10px">
                                <input type="search" class="form-control  bg-transparent border-0" placeholder="search pizza ....">
                                <button class="btn px-1 pe-2"><i class="fas fa-search text-primary" style="font-size: 20px ;"></i>
                                </button>
                            </div>
                        </form>
                        <!-- -------------------------------category------------------------------------- -->
                        <div class="my-5">
                            <h5 class="mb-4">Category Lists</h5>
                            <div class="">

                                <a href="" class="btn bg-white d-flex justify-content-between mb-2 category active py-2">
                                    <p class="mb-0">Cheese Pizza</p>
                                    <span class="badge bg-danger rounded-pill">13</span>
                                </a>
                                <a href="" class="btn bg-white d-flex justify-content-between mb-2 category py-2">
                                    <p class="mb-0">Cheese Pizza</p>
                                    <span class="badge bg-info rounded-pill">13</span>
                                </a>
                                <a href="" class="btn bg-white d-flex justify-content-between mb-2 category py-2">
                                    <p class="mb-0">Cheese Pizza</p>
                                    <span class="badge bg-info rounded-pill">13</span>
                                </a>
                                <a href="" class="btn bg-white d-flex justify-content-between mb-2 category py-2">
                                    <p class="mb-0">Cheese Pizza</p>
                                    <span class="badge bg-info rounded-pill">13</span>
                                </a>
                                <a href="" class="btn bg-white d-flex justify-content-between mb-2 category py-2">
                                    <p class="mb-0">Cheese Pizza</p>
                                    <span class="badge bg-info rounded-pill">13</span>
                                </a>
                            </div>
                        </div>
                        <!-- -------------------------------price------------------------------------- -->
                        <div class="mb-5">
                            <h5 class="mb-4">Filter By Price</h5>
                            <select name="" id="" class="form-control">
                                <option value="">Select Price</option>
                                <option value="">4000 Price</option>

                            </select>
                        </div>
                        <!-- -------------------------------date------------------------------------- -->
                        <div class="mb-5">
                            <h5 class="mb-4">Filter By Date</h5>
                            <input type="date" class="form-control mb-2">
                            <input type="date" class="form-control">
                        </div>
                        <!-- -------------------------------pagination------------------------------------- -->
                        <hr>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            </ul>
                        </nav>

                    </div>



                </div>
            </div>
        </div>
    </section>
    <!-- -------------------------------Contact section------------------------------------- -->
    <section class="contact-section bg-white" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-5 text-center">CONTACT US</h3>
                </div>
            </div>
            <div class="row px-5">
                <div class="col-12">
                    <div class="card shadow-lg border-0 overflow-hidden" style="border-radius: 10px !important;">
                        <div class="">
                            <div class="row">
                                <div class="col-5 bg-primary">
                                    <div class=" h-100 d-flex flex-column justify-content-center" style="border-radius: 10px ;">
                                        <div class="d-flex align-items-center bg-white mb-4 mx-5 p-3" style="border-radius: 10px ;">
                                            <i class="fas fa-phone"></i>
                                            <span class="mb-0 ms-3">+95 9123 4567 89</span>
                                        </div>
                                        <div class="d-flex align-items-center bg-white mb-4 mx-5 p-3" style="border-radius: 10px ;">
                                            <i class="fas fa-envelope"></i>
                                            <span class="mb-0 ms-3">example@gmail.com</span>
                                        </div>
                                        <div class="d-flex align-items-center bg-white mb-4 mx-5 p-3" style="border-radius: 10px ;">
                                            <i class="fab fa-facebook"></i>
                                            <span class="mb-0 ms-3">Pizza Facebook Page</span>
                                        </div>
                                        <div class="d-flex align-items-center bg-white mb-4 mx-5 p-3" style="border-radius: 10px ;">
                                            <i class="fas fa-map-marked-alt"></i>
                                            <span class="mb-0 ms-3">Yangon Region, Myanmar</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7 bg-white">
                                    <form action="" class="py-4 px-5">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Your Name</label>
                                            <input type="text" class="form-control" placeholder="enter your name ....">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email Address</label>
                                            <input type="text" class="form-control" placeholder="enter your email ....">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Message</label>
                                            <textarea name="" id=""  rows="5" class="form-control" placeholder="say something ....."></textarea>
                                        </div>
                                        <button class="btn btn-primary text-white shadow mt-3">Send <i class="fas fa-paper-plane ms-3"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
