<div class="container-xxl p-0" style="background-color: #a46db8">

    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="/profile" class="navbar-brand p-2">
                <h1 class="m-0">LLRP <span class="fs-5">Master</span></h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        @if(Session::has('user'))
                            <a href="/casino" class="nav-item nav-link">Casino</a>
                            <a href="/logout" class="nav-item nav-link">Logout</a>

                            @if(Session::get('admin') >= 2)
                                <a href="/ucp/approves" class="nav-item nav-link">UCPs</a>
                            @endif
                        @endif

                        @if(Session::has('unauthorized'))
                            <a href="/logout" class="nav-item nav-link">Logout</a>
                        @endif
                    </div>
                    <button type="button" class="btn text-secondary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>

                </div>
        </nav>
    </div>

</div>
<div class="container-jumbotron">
    <img src="{{asset('img/banner.png')}}" alt="" width="100%" height="auto">
</div>
