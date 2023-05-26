<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <title>Ajax-Crud</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-4 text-center mt-5">Laravel 10 Ajax Crud</h2>
                <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">ADD Product</a>
                <div class="table-data">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col">Price</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Color</th>
                                <th scope="col">Name</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a class="btn btn-danger" href=""><i class="las la-times"></i></a>
                                    <a class="btn btn-success" href=""><i class="las la-edit"></i></a>
                                    <a class="btn btn-info" href=""><i class="las la-eye"></i></a>
                                </td>
                                <td>650 TK</td>
                                <td>2 KG</td>
                                <td>Green</td>
                                <td>Apple</td>
                                <th scope="row">1</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('productModal')
    @include('product_js')

</body>

</html>
