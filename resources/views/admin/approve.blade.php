@extends('layouts.app')

@section('content')

    <div class="container-xxl p-0 bg-white">
        @if(isset($alert))
            <div class="w-100 text-center">
                {{$alert}}
            </div>
        @endif

        <div class="container-xxl py-5 hero-header mb-5" style="background-color: #a46db8;">
            <div class="container-fluid my-5 py-5 px-lg-5">
                <div class="d-flex flex-column justify-content-evenly align-items-center">
                    @if(sizeof($accounts) > 0)
                        <table class="table overflow-scroll">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Register Date</th>
                                <th scope="col">Last IP</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Action</th>
                                <th scope="col">Status:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $account)
                                <style>

                                </style>
                                <tr>
                                    <th scope="row">{{$account->ID}}</th>
                                    <td>{{$account->Username}}</td>
                                    <td>{{$account->RegisterDate}}</td>
                                    <td>{{$account->LastIP}}</td>
                                    <td>
                                        <textarea cols="50" rows="2">
                                            {{$account->answer1}}
                                        </textarea>
                                    </td>
                                    <td class="d-flex">

                                        <form action="/approve/{{$account->ID}}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>
                                        <form action="/deny/{{$account->ID}}" method="post" class="ms-1">
                                            @csrf
                                            <input type="hidden" name="status" value="denied">
                                            <button type="submit" class="btn btn-danger">Deny</button>
                                        </form>

                                    </td>
                                    <td>

                                        @foreach($statuses as $status)
                                            @if($status->userID == $account->ID)
                                                @if($status->status == '1')
                                                    <span class="badge bg-success">Approved</span>
                                                @elseif($status->status == '0')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($status->status == '2')
                                                    <span class="badge bg-danger">Denied</span>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
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
