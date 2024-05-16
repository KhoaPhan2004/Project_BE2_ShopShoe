<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-2 px-lg-2 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">

                <div id="shopping-cart">
                    <h2>History orders</h2>

                    <table class="table" cellpadding="10" cellspacing="1">
                        <tbody>
                            <tr>
                                <th style="text-align:left;">STT</th>
                                <th style="text-align:left;">Order date</th>
                                <th style="text-align:left;">Status</th>
                                <th style="text-align:left;">totalPrice</th>
                            </tr>


                            @foreach($orderss as $item)

                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$item->created_at->format('d/m/Y')}}</td>
                                <td>
                                    @if($item->status==0)
                                    <span>Chưa thanh toán</span>
                                    @elseif($item->status==1)
                                    <span>đã thanh toán</span>
                                    @endif
                                </td>
                                <td>
                                    {{$item->total_amount}}
                                </td>

                                <td>
                                    <a class="btn btn-outline-dark mt-auto">Detail</a>
                                    <a class="btn btn-outline-dark mt-auto">Hủy</a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>