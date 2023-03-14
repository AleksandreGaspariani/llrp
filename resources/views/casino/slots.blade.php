@extends('layouts.app')

@section('content')

    <style>

        *{
            padding: 0;
            margin:0;
        }

        a{
            text-decoration: none;
            cursor: copy;
        }

        a:hover {
            color: rgb(27, 27, 27);
        }

        input[type='number']{
            text-align: center;
            width: 40px;
            height: 40px;
        }
    </style>

    <div class="container-xxl p-0 bg-white m-0">
        @if(session()->has('alert'))
            <div class="alert alert-success">
                {{ session()->get('alert') }}
            </div>
        @endif
        <div class="container-xxl py-5 hero-header mb-5" style="background-color: #a46db8;">
            <div class="container-fluid my-5 py-5 px-lg-5">
                @if(Session::has('user'))
                    @if(Session::has('choosen_character'))
                        <div class="d-flex justify-content-start align-items-center">
                            <a href="/change_char" class="btn text-white" style="font-size: 22px">Change Character</a>
                        </div>
                        <div class="w-100 d-flex flex-column justify-content-center align-items-center">
                                <p style="font-size: 24px;">💵 : <span class="balance">{{session('choosen_character')['Cash']}}</span></p>
                                <form action="slots" class="d-flex flex-column" id="slotMachine">
                                    <div class="d-flex">
                                        <a class="p-2 border bg-dark d-flex justify-content-center align-items-center" id="slot1" style="font-size: 5rem;">
                                            ❤️
                                        </a>
                                        <a class="p-2 border bg-dark d-flex justify-content-center align-items-center" id="slot2" style="font-size: 5rem;">
                                            ❤️
                                        </a>
                                        <a class="p-2 border bg-dark d-flex justify-content-center align-items-center" id="slot3" style="font-size: 5rem;">
                                            ❤️
                                        </a>
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-light">Spin</button>
                                    <div style="width: inherit;" class="d-flex flex-column justify-content-center align-items-center mt-4">
                                        <div class="d-flex">
                                            <p id="bet">5</p>
                                            <span>$</span>
                                        </div>
                                        <div>
                                            <a class="btn btn-light" id="addBet">+</a>
                                            <a class="btn btn-light" id="removeBet">-</a>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    @else

                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <p class="text-center border border-danger p-2 bg-danger text-white">You need to choose a character to play</p>
                            <a href="/characters" class="btn btn-outline-info text-white">
                                Choose Character
                            </a>
                        </div>

                    @endif

                @endif
            </div>
        </div>

    </div>
    <!-- Newsletter End -->


    <!-- Service Start -->
    @include('vips.vip')
    <!-- Service End -->

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

    <script>

        function rand(){
            let roll = Math.floor(Math.random() * 100 + 1);


            let slot = "";
            if(roll <= 50){
                slot = '🍓';

            }
            if(roll >=51 && roll <= 80){
                slot = '🍌';

            }
            if(roll >=81 && roll <= 100){
                slot = '🍒';
            }

            // console.log(slot);
            return slot;
        }

        function spin() {
            let balance = $('#balance').text();
            let bet = $('#bet').text();
            balance = parseInt(balance);
            bet = parseInt(bet);


                $('#slot1').text(rand());
                $('#slot2').text(rand());
                $('#slot3').text(rand());

                let slot1 = $('#slot1').text();
                let slot2 = $('#slot2').text();
                let slot3 = $('#slot3').text();

                let mult1 = slot1;
                let mult2 = slot2;
                let mult3 = slot3;

                if (slot1 == '🍓') {
                    mult3 = 10;
                }
                if (slot1 == '🍌') {
                    mult3 = 15;
                }
                if (slot1 == '🍒') {
                    mult3 = 20;
                }

                if (slot2 == '🍓') {
                    mult3 = 5;
                }
                if (slot2 == '🍌') {
                    mult3 = 8;
                }
                if (slot2 == '🍒') {
                    mult3 = 12;
                }

                if (slot3 == '🍓') {
                    mult3 = 5;
                }
                if (slot3 == '🍌') {
                    mult3 = 8;
                }
                if (slot3 == '🍒') {
                    mult3 = 12;
                }


                if (slot1 == slot2 && slot2 == slot3) {
                    balance = $('.balance').text();
                    bet = $('#bet').text();
                    balance = parseInt(balance);
                    bet = parseInt(bet);

                    balance += bet * mult3;
                    $('.balance').text(balance);
                    console.log('You win!');
                } else {
                    balance = $('.balance').text();
                    bet = $('#bet').text();
                    balance = parseInt(balance);
                    bet = parseInt(bet);
                    balance -= bet;
                    $('.balance').text(balance);
                    {{--$.ajax({--}}
                    {{--    url: '/subCash/' + {{session('choosen_character')['ID']}},--}}
                    {{--    type: 'POST',--}}
                    {{--    data: {--}}
                    {{--        additionalData1: 'value1',--}}
                    {{--        additionalData2: 'value2'--}}
                    {{--    },--}}
                    {{--    success: function(response) {--}}
                    {{--        // handle success response--}}
                    {{--    },--}}
                    {{--    error: function(xhr) {--}}
                    {{--        // handle error response--}}
                    {{--    }--}}
                    {{--});--}}
                    console.log('You lose!');
                }
            }

        $('#slotMachine').submit(function(event) {
            event.preventDefault();


            spin();


        });
    </script>

@endsection
