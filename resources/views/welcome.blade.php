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
    @{{ twitter }}

    <div id="app">
        @{{msg}}
        <!-- <example-component></example-component> -->
    </div>
    <div id="app2">
        <p v-for="num in item">@{{num.text}}<br>@{{num.user.name}}</p>
    </div>

    <div id="app3">
        <ul>
            <li><router-link to="/user/A">User A</router-link></li>
            <li><router-link to="/user/B">User B</router-link></li>
        </ul>
        <router-view></router-view>
    </div>

    <!-- <div class="container" id="app2">

        <div class="card mb-2" v-for="num in item">
            <div class="card-body">
                <div class="media">
                    <img src="https://placehold.jp/70x70.png" class="rounded-circle mr-4">
                    <div class="media-body">
                        <h5 class="d-inline mr-3"><strong> @{{num.user.name}} </strong></h5>
                        <h6 class="d-inline text-secondary"> @{{num.created_at}} </h6>
                        <p class="mt-3 mb-0"> @{{num.text}} </p>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white border-top-0">
                <div class="d-flex flex-row justify-content-end">
                    <div class="mr-5"><i class="far fa-comment text-secondary"></i></div>
                    <div class="mr-5"><i class="fas fa-retweet text-secondary"></i></div>
                    <div class="mr-5"><i class="far fa-heart text-secondary"></i></div>
                </div>
            </div>
        </div>

    </div> -->


    <!-- <script src="https://raw.githack.com/syt123450/giojs/master/assets/data/sampleData.js"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        bg_image = @json($item_travel);
        itinerary = @json($itinerary);
    </script>
    <script src="{{ asset('js/globe.js') }}"></script>




</body>

</html>