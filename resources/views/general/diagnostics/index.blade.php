@extends('shared.core.theme-simple')

@section('content')

<!-- Page Content -->
<div class="hero-static d-flex align-items-center">
    <div class="w-100">

        <!-- Status Section -->
        <div class="content content-full bg-white">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                    <!-- Header -->
                    <div class="text-center mb-5">
                        <p class="mb-2">
                            <i class="fa fa-2x fa-circle-notch text-primary"></i>
                        </p>
                        <h1 class="h4 mb-1">
                            Diagnostics
                        </h1>
                        <h2 class="h6 font-w400 text-muted mb-3">
                            Check out how we are doing.
                        </h2>
                    </div>
                    <!-- END Header -->

                    <!-- Services -->
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-lg btn-secondary" href="{{ url('/dashboard') }}">
                            <i class="fa fa-arrow-left mr-1"></i> Dashboard
                        </a>
                    </div>
                    <hr>
                    <div class="alert alert-warning" role="alert">
                        <p class="mb-0">Frontend are currently under maintenance, please stay tuned.</p>
                    </div>
                    <ul class="list-group push">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Backend (php)
                            <span class="badge badge-pill badge-success">Operational</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Frontend (js+ts+react)
                            <span class="badge badge-pill badge-warning">Maintenance</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Queues (mails+notifications)
                            <span class="badge badge-pill badge-success">Operational</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            File Storage (public)
                            <span class="badge badge-pill badge-success">Operational</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Payments (Iugu)
                            <span class="badge badge-pill badge-success">Operational</span>
                        </li>
                    </ul>
                    <!-- END Services -->
                </div>
            </div>
        </div>
        <!-- END Status Section -->

    </div>
</div>
<!-- END Page Content -->

@endsection