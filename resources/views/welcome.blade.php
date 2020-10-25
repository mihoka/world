<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Styles -->

</head>

<body>

    <div id="bg">

        <div id="globalArea" class="w-100 h-100"></div>

        <div>
            <div id="sweet">世界のスイーツを食べる旅
                <ul>
                    @foreach($itinerary as $city)
                    <li>{{ $city}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div id="photo">The Photogenic World</div>

        <div id="infoBoard">
            <div id="countryArea"></div>
            <div id="explanation">楽しい旅を！</div>
        </div>

    </div>


    <!-- <script src="https://raw.githack.com/syt123450/giojs/master/assets/data/sampleData.js"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
         bg_image=@json($item_travel);
    </script>
    <script src="{{ asset('js/globe.js') }}"></script>


</body>

</html>