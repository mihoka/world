<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #infoBoard {
                position: absolute;
                left: 35%;
                top: 40%;
                width: 400px;
                height: 100px;
                line-height: 50px;
                text-align: center;
                color: white;
                font-size: 20px;
                background-color: rgba(106, 107, 111, 0.6);
                display: none;

            }
        </style>

    <style>
    
        #sweet, #photo {
        position: absolute;
        left: 100px;
        width: 250px;
        height: 40px;
        color: #cbcbcb;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
        user-select: none;
        box-sizing: border-box;
        transition: 1s;
        border-radius: 5px;
        background-color: rgba(110, 110, 110, 0.8);

        }

        #sweet:hover, #photo:hover {

        color: #fff;
        background-color: #929292;

        }

        #sweet {
        top: 200px;
        }

        #sweet ul{
            top: 250px;
            color: #fff;
        }

        #sweet ul li{
            line-height: 30px;
        }


        #photo {
        top: 500px;
        }


    </style>

    </head>
    <body>

        <div id="globalArea" style="width:100%;height:100%"></div>

        <div>
            <div id="sweet">世界のスイーツを食べる旅
            <ul>
                @foreach($itinerary as $city)
                <li>{{ $city }}</li>
                @endforeach
            </ul></div>
        </div>

        <div id="photo">The Photogenic World</div>

        <div id="infoBoard">
            <div id="countryArea"></div>
            <div id="explanation">楽しい旅を！</div>
        </div>

        @if (isset( $itinerary ))
        <p>{{$itinerary[0]}} </p>
        @else
        <p>Hello</p>
        @endif



        <!-- <script src="https://raw.githack.com/syt123450/giojs/master/assets/data/sampleData.js"></script> -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/globe.js') }}"></script>
    </body>
</html>
