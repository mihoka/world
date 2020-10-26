$(document).ready(function () {

    $.ajax({
        type: 'GET',
        // url: 'gio_data',
        url: 'twitter',
        // url: '/sampleData.json',
        dataType: 'json',
    }).done(function (results) {
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
