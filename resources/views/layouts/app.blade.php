<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{$title}}</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <style>
            *{

            }
            .main-header,.logo {

                font-size: 50px;
                font-family: 'Oswald', sans-serif;
            }
            .logo{
                margin-top: 10px;
                width: 150px;
                border-radius: 5px;
                cursor: pointer;
                background-image: url("http://mdok-market.ru/d/988565/d/%D0%A4%D0%BE%D0%BD_%D1%81%D0%B2%D0%B5%D1%82%D0%BB%D0%BE-%D1%81%D0%B5%D1%80%D1%8B%D0%B9.jpg")
            }
            #description{
                height:200px;
                max-height:200px;
                width: 610px;
                max-width: 610px;
            }
            #product_name{
                cursor:pointer;
            }
            .product_price{
                display: none;
            }
            .product_description{
              display: none;
            }
           td:hover .product_description{
                display: block;
            }
              td:hover  .product_price {
                display: block;
            }
        </style>
        <!-- CSS и JavaScript -->
    </head>

    <body>
        <div class="col-md-offset-1 rounded">
          <div class="text-center logo border-radius-large">LOGO</div>
        </div>

        @yield('content')<!--Подключает блок content-->
    </body>
</html>