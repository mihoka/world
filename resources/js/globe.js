window.GIO = require('giojs');
// let image = "img/sweet/newyork.jpg";

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
        "transparentBackground": true,
        "autoRotation": false,
        "rotationRatio": 1
    },
    "color": {
        "surface": 16777215,
        "selected": 2141154,
        "in": 16777215,
        "out": 2141154,
        "halo": 2141154,
        // "background": 10528696
    },
    "brightness": {
        "ocean": 0.35,
        "mentioned": 0,
        "related": 1
    }
};

function backimage(image) {
    const bg = document.getElementById("bg");
    bg.style.backgroundImage = image;
}
    
function setimage(country) {
    for (i = 0; i < bg_image.length ; i++){

        if (bg_image[i]['e'] === country) {
            return bg_image[i]['image'];

            // backimage(`url(${bg_image[i]['image']})`);
        } 
    }
}

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
        controller.onCountryPicked(callback);
        controller.setInitCountry("JP");
        controller.setTransparentBackground(true);

        $("#sweet").click(function () {
            controller.switchDataSet("sweet");
            controller.switchCountry("JP");
        });

        function callback(selectedCountry) {
            let image = setimage(selectedCountry['ISOCode']);
            backimage(`url(${image})`);
            
            $( "#countryArea" ).text( "次はこの国！" + selectedCountry.name );
            $("#infoBoard").fadeIn(1000);
  
            
            setTimeout( function () {
                $( "#infoBoard" ).fadeOut( 1000 );
            }, 3000);

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
