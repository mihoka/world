window.GIO = require('giojs');

// var container = document.getElementById("globalArea");

var config = {
    "control": {
        "stats": false,
        "disableUnmentioned": true,
        "lightenMentioned": true,
        "inOnly": false,
        "outOnly": false,
        "initCountry": "CN",
        "halo": true,
        "transparentBackground": false,
        "autoRotation": false,
        "rotationRatio": 1
    },
    "color": {
        "surface": 16777215,
        "selected": 2141154,
        "in": 16777215,
        "out": 2141154,
        "halo": 2141154,
        "background": 10528696
    },
    "brightness": {
        "ocean": 0.35,
        "mentioned": 0,
        "related": 1
    }
};

// var data1 = [
//   { e: "JP", i: "CN", v: 800000 },
//   { e: "CN", i: "US", v: 800000},
//   { e: "US", i: "JP", v: 800000}
// ]

// var data2 = [
//   { e: "JP", i: "AU", v: 800000 },
//   { e: "AU", i: "US", v: 800000},
//   { e: "US", i: "JP", v: 800000} 
// ]

// var data = {
//   dataSetKeys: ['sweet', 'photo'],
//   initDataSet: 'sweet',
//   sweet: data1,
//   photo: data2
// }

// var controller = new GIO.Controller(container, config);
// controller.setTransparentBackground( true );
// controller.setInitCountry("JP");

// $( "#sweet" ).click( function () {
//   controller.switchDataSet("sweet");
//   controller.switchCountry( "JP" );
// } );

// $( "#photo" ).click( function () {
//   controller.switchDataSet("photo");
//   controller.switchCountry( "JP" );

// });

// controller.addData(data);
// controller.init();


$(document).ready(function () {
    $.ajax({
        type: 'GET',
        // url: 'gio_data',
        url: 'travel_data',
        // url: '/sampleData.json',
        dataType: 'json',
    }).done(function (results) {
        const container = document.getElementById("globalArea");
        const controller = new GIO.Controller(container, config);
        controller.onCountryPicked( callback );
        controller.setInitCountry("JP");
        controller.setTransparentBackground(true);

        $("#sweet").click(function () {
            controller.switchDataSet("sweet");
            controller.switchCountry("JP");
        });

        function callback ( selectedCountry ) {

            $( "#countryArea" ).text( "次はこの国！" + selectedCountry.name );
            $( "#infoBoard" ).fadeIn( 1000 );
    
            setTimeout( function () {

                $( "#infoBoard" ).fadeOut( 1000 );
    
            }, 3000 );
    
        }

        // $("#photo").click(function () {
        //     controller.switchDataSet("photo");
        //     controller.switchCountry("JP");

        // });
      
        controller.addData(results);
        controller.init();
    }).fail(function (jqXHR, textStatus, errorThrown) {
        alert('ファイルの取得に失敗しました。');
        console.log("ajax通信に失敗しました")
        console.log(jqXHR.status);
        console.log(textStatus);
        console.log(errorThrown.message);
    });
});
