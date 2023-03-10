@extends('layouts.app')

@section('content')

<div class="container-xxl p-0 bg-white">
    @if(isset($alert))
        <div class="w-100 text-center">
            {{$alert}}
        </div>
    @endif
    <div class="container-xxl py-5 hero-header mb-5" style="background-color: #a46db8;">
        <div class="container my-5 py-5 px-lg-5">
            @if(Session::has('user'))
                <div class="d-flex justify-content-evenly align-items-center">
                    @if(isset($characters))
                        @foreach($characters as $character)
                            @dd($character)

                            <a href="#" style="text-decoration: none; color: black">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{asset('img/def.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p>Character : {{$character['char_name']}}</p>
                                        <p>Phone: {{$character['PhoneNumbr']}}</p>
                                        <p>Level {{$character['Level']}}, Exp: {{$character['Exp']}}</p>
                                        <p>Money: {{$character['Cash']}}</p>
                                        <p>Bank: {{$character['BankAccount']}}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            @else
                <div class="row g-5 py-5">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-white mb-4 animated zoomIn">Login</h1>
                        <div class="w-auto rounded" style="border: 4px solid white;">
                            <form action="/loginUCP" class="p-5">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label for="ucp" class="text-white" style="font-size: 14px">Enter UCP Name</label>
                                        <input type="text" class="form-control w-50" name="ucp" placeholder="Enter UCP Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="secret" class="text-white" style="font-size: 14px">Enter password</label>
                                        <input type="password" name="password" class="form-control w-50 m-0" placeholder="Password">
                                        <small class=" p-0 m-0" style="font-size: 14px; margin-top: 0px !important; padding-top: 0px !important;">Type your secret word here</small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" style="background-color: #a46db8; border: none;">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-start">
                        <img class="img-fluid" src="{{asset('img/1.png')}}" alt="">
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
<!-- Newsletter End -->


<!-- Service Start -->
@include('vips.vip')
<!-- Service End -->


<!-- Portfolio Start -->
<!-- <div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Our Projects</h6>
            <h2 class="mt-2">Recently Launched Projects</h2>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="btn px-3 pe-4 active" data-filter="*">All</li>
                    <li class="btn px-3 pe-4" data-filter=".first">Design</li>
                    <li class="btn px-3 pe-4" data-filter=".second">Development</li>
                </ul>
            </div>
        </div>
        <div class="row g-4 portfolio-container">
            <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.1s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-1.jpg" alt="">
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.3s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-2.jpg" alt="">
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-2.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.6s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-3.jpg" alt="">
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-3.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.1s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-4.jpg" alt="">
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-4.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-5.jpg" alt="">
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-5.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.6s">
                <div class="position-relative rounded overflow-hidden">
                    <img class="img-fluid w-100" src="img/portfolio-6.jpg" alt="">
                    <div class="portfolio-overlay">
                        <a class="btn btn-light" href="img/portfolio-6.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                        <div class="mt-auto">
                            <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                            <a class="h5 d-block text-white mt-1 mb-0" href="">Project Name</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Portfolio End -->


<!-- Testimonial Start -->
<!-- <div class="container-xxl bg-primary testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-transparent border rounded text-white p-4">
                <i class="fa fa-quote-left fa-2x mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h6 class="text-white mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded text-white p-4">
                <i class="fa fa-quote-left fa-2x mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h6 class="text-white mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded text-white p-4">
                <i class="fa fa-quote-left fa-2x mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h6 class="text-white mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded text-white p-4">
                <i class="fa fa-quote-left fa-2x mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h6 class="text-white mb-1">Client Name</h6>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Testimonial End -->


<!-- Team Start -->
<!-- <div class="container-xxl py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Our Team</h6>
            <h2 class="mt-2">Meet Our Team Members</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="d-flex">
                        <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <img class="img-fluid rounded w-100" src="img/team-1.jpg" alt="">
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="fw-bold m-0">Jhon Doe</h5>
                        <small>CEO</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item">
                    <div class="d-flex">
                        <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <img class="img-fluid rounded w-100" src="img/team-2.jpg" alt="">
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="fw-bold m-0">Emma William</h5>
                        <small>Manager</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item">
                    <div class="d-flex">
                        <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <img class="img-fluid rounded w-100" src="img/team-3.jpg" alt="">
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="fw-bold m-0">Noah Michael</h5>
                        <small>Designer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Team End -->


<!-- Footer Start -->
<div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-5">

        </div>
    </div>
    <div class="container px-lg-5">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Last Light Roleplay</a>, All Right Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu" style="display: none;">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
</div>

@endsection
