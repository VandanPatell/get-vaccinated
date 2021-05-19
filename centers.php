<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Get Vaccinated</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="fonts%2c_icomoon%2c_style.css%2bcss%2c_owl.carousel.min.css%2bcss%2c_bootstrap.min.css%2bcss%2c_style.css.pagespeed.cc.eJSu-YmL8I.css" />
    <script src="js/jquery-3.3.1.min.js"></script>


</head>

<body class="bg-dark text-light">

    <?php
    include_once './req/_nav.php';
    ?>
    <!-- Optional JavaScript; choose one of the two! -->
    
    
    <div class="container mt-5 col-md-6 col-sm-9 col-11">

        <form action="" id="SearchByDistrict">
            <div class="form-group">
                <label class="form-label">Select By District</label>
                <select class="form-select my-1" aria-label="Default select example" id="States">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <select class="form-select my-1" aria-label="Default select example" id="Dist">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>


    </div>




    <script>
        $.ajax({
            type: "POST",
            url: "./assets/sql/Functions.php",
            data: { "GetStates": 1 },
            success: function (resp) {
                // alert(resp)
                $('#States').html(resp)
            },
            error: function (error) {
                console.log(error)
            }
        })

        function Cities(id = 1) {
            $.ajax({
                type: "POST",
                url: "./assets/sql/Functions.php",
                data: { "DistId": id },
                success: function (resp) {
                    // alert(resp)
                    $('#Dist').html(resp)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }
        Cities()

        $('#States').change(function () {
            Cities($('#States').val())
            setTimeout(() => {
                GetCenters($('#Dist').val())
                Getdates($('#Dist').val())
            }, 500);
        })
        $('#Dist').change(function () {
            setTimeout(() => {
                GetCenters($('#Dist').val())
                Getdates($('#Dist').val())

            }, 500);
        })


        function Centers(id = 1) {
            $.ajax({
                type: "POST",
                url: "./assets/sql/Functions.php",
                data: { "GetCenter": id },
                success: function (resp) {
                    // alert(resp)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }

        function Getdates(id = 3) {
            $.ajax({
                type: "POST",
                url: "./assets/sql/Functions.php",
                data: { "GetDate": id },
                success: function (resp) {
                    $('thead').html(resp)
                    // alert(resp)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }

        $('#SearchByDistrict').submit(function (e) {
            e.preventDefault()
            id = $('#Dist').val()
            // alert(id)
            Getdates(id)
            GetCenters(id)
        })

        function GetCenters(id = 3) {
            $.ajax({
                type: "POST",
                url: "./assets/sql/Functions.php",
                data: { "GetCenters": id },
                success: function (resp) {
                    $('tbody').html(resp)
                    // alert(resp)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }
        GetCenters()
    </script>



    <!-- Table Starts -->
    <div class="content">
        <div class="container">
            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>

                        <tr>
                            <th scope="col">Center Name</th>
                            <th scope="col" class="text-center">12-03-2021</th>
                            <th scope="col" class="text-center">13-03-2021</th>
                            <th scope="col" class="text-center">14-03-2021</th>
                            <th scope="col" class="text-center">15-03-2021</th>
                            <th scope="col" class="text-center">16-03-2021</th>
                            <th scope="col" class="text-center">17-03-2021</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr scope="row">

                            <td>
                                Morbi Road Arogya Kendra
                                <small class="d-block"> Old Jakat Naka Morbi Road</small>
                                <small class="d-block"> Free </small>
                            </td>
                            <td class="text-center text-danger">
                                0
                                <small class="d-block"> Covaxin </small>
                                <small class="d-block">Age limit : 45+</small>
                            </td>
                        </tr>
                        <tr class="spacer">
                            <td colspan="100"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Table Ends -->

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
    <script src="js/popper.min.js%2bbootstrap.min.js%2bmain.js.pagespeed.jc.02UXSFDjmY.js"></script>
</body>

</html>