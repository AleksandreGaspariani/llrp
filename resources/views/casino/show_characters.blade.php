@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row justify-content-evenly align-items-center">
        @if(isset($characters))
            @foreach($characters as $character)

                <div class="d-flex justify-content-start m-5 shadow-lg rounded">
                    <a href="/choose_for_casino/{{$character['ID']}}" style="text-decoration: none; color: black">
                        <div class="card" style="width: 18rem;">

                            @foreach ($skins as $skin)
                                @if($skin['model'] == $character['Model'])

                                    <img class="card-img-top" src="{{$skin['link']}}" alt="Card image cap" height="200px" style="object-fit: contain">
                                    @break
                                @elseif($character['Model'] > 311)
                                    <img class="card-img-top" src="{{asset('img/custom_skin.png')}}" alt="Card image cap" height="200px" style="object-fit: contain">
                                    @break
                                @endif
                            @endforeach


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
