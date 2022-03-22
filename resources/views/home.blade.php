@extends('layouts.app')

@section('content')

@if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center" style="padding-top: 200px; padding-bottom: 200px;">
        <h1 class="fw-bolder">Welcome to CCIT Task</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in libero eget est mattis finibus.</p>
    </div>
</header>
<!-- About section-->
<section id="about" style="padding-top: 80px; padding-bottom: 80px;">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <h2>About this page</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in libero eget est mattis finibus. Phasellus sed dignissim est, non molestie libero. Vivamus id scelerisque risus. Maecenas viverra elit sit amet laoreet tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos:</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus</li>
                    <li>Responsive behavior when clicking nav links perfect for a one page website</li>
                    <li>non molestie libero. Vivamus id scelerisque risus.</li>
                    <li>Minimal custom CSS so you are free to explore your own unique design options</li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection