@extends('layouts.app')

@section('content')
    @if(session('alert'))
        <div class="alert alert-info m-0 px-5 py-2 d-flex justify-content-start align-items-center">
            <p class="font-bold" style="font-size: 18px">
                {{ session('alert') }}
            </p>
        </div>
    @endif
    <div class="container-xxl p-0 bg-white">

        <div class="container-xxl py-5 hero-header mb-5" style="background-color: #a46db8;">
            <div class="container my-5 py-5 px-lg-5">

                    <div class="d-flex flex-row justify-content-evenly align-items-center">
                        @if(isset($characters))
                            @foreach($characters as $character)

                                <div class="d-flex justify-content-start m-5">
                                    <a href="/show/{{$character['ID']}}" style="text-decoration: none; color: black">
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
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="row g-5 py-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn">Login</h1>
                            <div class="w-auto rounded" style="border: 4px solid white;">
                                <form action="/loginUCP" class="p-5" method="post">
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
