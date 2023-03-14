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
                @if(Session::has('user'))
                    <div class="d-flex flex-row justify-content-start flex-wrap w-100 col-md-12">
                        <div class="p-3 col-md-3 m-4">
                            <p style="font-family: Tahoma;font-size: 18px;text-align: center">{{$char['char_name']}}</p>
                            @foreach ($skins as $skin)
                                @if($skin['model'] == $char['Model'])

                                    <img class="card-img-top" src="{{$skin['link']}}" alt="Card image cap" height="200px" style="object-fit: contain">
                                    @break
                                @elseif($char['Model'] > 311)
                                    <img class="card-img-top" src="{{asset('img/custom_skin.png')}}" alt="Card image cap" height="200px" style="object-fit: contain">
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <div class="p-3 col-md-3 m-4 d-flex flex-column">
                            <p style="font-size: 24px; font-family: -apple-system" class="py-1 px-4 m-1 bg-white rounded">Donator Lvl: {{$char['DonateRank']}}</p>
                            <p style="font-size: 24px; font-family: -apple-system" class="py-1 px-4 m-1 bg-white rounded">Bank: {{$char['BankAccount']}}💵</p>
                            <p style="font-size: 24px; font-family: -apple-system" class="py-1 px-4 m-1 bg-white rounded">Cash: {{$char['Cash']}}💵</p>
                            <p style="font-size: 24px; font-family: -apple-system" class="py-1 px-4 m-1 bg-white rounded">Paycheck: {{$char['PayCheck']}}💵</p>
                            <p style="font-size: 24px; font-family: -apple-system" class="py-1 px-4 m-1 bg-white rounded">Savings: {{$char['Savings']}}💵</p>
                        </div>
                        <div class="p-3 col-md-3 m-4 d-flex flex-column">
                            <p style="font-size: 24px; font-family: -apple-system" class="py-1 px-4 m-1 bg-white rounded">Phone: 📞{{$char['PhoneNumbr']}}</p>
                            <p style="font-size: 24px; font-family: -apple-system" class="py-1 px-4 m-1 bg-white rounded">Health:❤️{{$char['Health']}}</p>
                            <p style="font-size: 24px; font-family: -apple-system" class="py-1 px-4 m-1 bg-white rounded">Armour:🦺 {{$char['Armour']}}</p>
                        </div>
                    </div>
                    <p class="display-6 mt-5">Businesses: </p>
                    <div class="d-flex justify-content-start align-items-center p-5">
                        @if(count($businesses) > 0)
                            @foreach($businesses as $business)
                                @if($business['biz_owner'] == $char['char_name'])
                                    <div class="p-3 col-md-3 bg-light border rounded ms-2 m-4">
                                        <p>Property information: </p>
                                        <p>➡️Business info: {{$business['biz_info']}}</p>
                                        <p>➡️Business price: {{$business['biz_price']}}💵</p>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>

                    <p class="display-6 mt-5">Houses: </p>
                    <div class="d-flex justify-content-start align-items-center p-5">
                        @if(count($houses) > 0)
                            @foreach($houses as $house)
                                @if($house['ownerSQLID'] == $char['ID'])
                                    <div class="p-3 col-md-3 bg-light border rounded ms-2 m-4">
                                        <p>Property information: </p>
                                        <p>➡️House ID: {{$house['id']}}</p>
                                        <p>➡️House Price: {{$house['price']}}💵</p>
                                        <p>➡️House Address: {{$house['info']}}📌</p>
                                        <p>➡️House Owner: {{$house['owner']}}</p>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <p class="display-6 mt-5">Cars: </p>
                    <div class="d-flex justify-content-start align-items-center p-5">
                        @foreach($cars as $car)
                            <a href="#" style="text-decoration: none; color: black" class="border rounded border-black">
                                <div class="card" style="width: 18rem;">
                                @php
                                $link = '';
                                    foreach ($assocs as $assoc){
                                        if($assoc['carId'] == $car['carModel']){
                                           $link = $assoc['carLink'];
                                        }
                                    }
                                @endphp
                                    <img class="card-img-top" src="{{$link}}" alt="Card image cap">

                                    <div class="card-body">
                                        <p>Car : {{$car['carName']}} , Car ID: {{$car['carModel']}}</p>
                                        <p>Plate : {{$car['carPlate']}}</p>
                                        <p>Battery  {{$car['carBatteryL']}}, Engine : {{$car['carEngineL']}}</p>
                                        <p>Locker : {{$car['carLock']}}, Immob: {{$car['carImmob']}}, Alarm: {{$car['carAlarm']}}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else

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

@endsection
