<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="js/jquery-3.3.1.min.js"></script>

    <title>Get Vaccinated</title>
</head>

<body class="bg-dark text-dark">

    <?php
    include_once './req/_nav.php';
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.cowin.gov.in/assets/images/largest-vaccine-banner.jpg" class="d-block w-100"
                    alt="...">
            </div>

        </div>
    </div>

    <div class="container">

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch d-flex justify-content-center g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://images.unsplash.com/photo-1618426372796-d40dbf308115?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDh8fHZhY2NpbmF0aW9ufGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Get Vaccinated Today</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="">
                                <small>More then 1711.55+ lakhs <br> People Vaccinated <br> while you are reading
                                    this.</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Book Yours Today</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Vaccination Centres provide for a limited number of on-spot registration slots
                    every day. Citizens aged 45 years and above can schedule appointments online or walk-in to
                    vaccination centres. However, Citizens aged 18-44 years should mandatorily register themselves and
                    schedule appointment online before going to vaccination centre.

                    In general, all citizens are recommended to register online and schedule vaccination in advance for
                    a hassle-free vaccination experience.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="https://selfregistration.cowin.gov.in/"
                        class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Register
                        Today</a>
                    <a href="./centers" type="button" class="btn btn-outline-light btn-lg px-4">Search Centers</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Starts -->
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">

        </div>
    </footer>
    <!-- Footer Ends -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
</body>

</html>