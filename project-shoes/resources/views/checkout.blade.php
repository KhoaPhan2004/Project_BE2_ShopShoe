<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
    
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="register py-5">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-md-5 p-3">
                    <div class="card " style="border: 1px solid black;">
                        <h3 class="card-header text-center" style=" margin-bottom:20px;">Đặt hàng</h3>
                        <div class="card-body">
                            <form method="POST" role="form" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="name" class="form-control" name="name" placeholder="Input name">
                                    @error('name') <small> {{$message}} </small> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Input email">
                                    @error('email') <small> {{$message}} </small> @enderror

                                </div>
                                <div class="form-group">
                                    <label for="">order_date</label>
                                    <input type="date" class="form-control" name="order_date" placeholder="Input order_date">
                                    @error('order_date') <small> {{$message}} </small> @enderror

                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="address" class="form-control" name="address" placeholder="Input address">
                                    @error('address') <small> {{$message}} </small> @enderror

                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="phone" class="form-control" name="phone" placeholder="Input phone">
                                    @error('name') <small> {{$message}} </small> @enderror
                                </div>
                                <hr>

                                <div style="display: flex;">
                                    <div class="d-grid mx-auto">
                                        <button type="submit" class="btn-green btn-primary btn-block">Đặt</button>
                                    </div>
                                    <div class="d-grid mx-auto">
                                        
                                            <a href="{{route('cart.view')}}" class="btn-green btn-primary btn-block">Hủy</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>