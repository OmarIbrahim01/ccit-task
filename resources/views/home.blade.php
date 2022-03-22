<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Scrolling Nav - Start Bootstrap Template</title>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-primary bg-gradient text-white">
            <div class="container px-4 text-center" style="padding-top: 200px; padding-bottom: 200px;">
                <h1 class="fw-bolder">Welcome to CCIT Task</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in libero eget est mattis finibus.</p>
                <a class="btn btn-lg btn-light" href="{{ route('login') }}">Login</a>
                <a class="btn btn-lg btn-light" href="{{ route('register') }}">Register</a>
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
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
    </body>
</html>
