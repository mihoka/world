// const { default: VueRouter } = require('vue-router');

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
    for (i = 0; i < bg_image.length; i++) {

        if (bg_image[i]['e'] === country) {
            return bg_image[i]['image'];
            // backimage(`url(${bg_image[i]['image']})`);
        }
    }
}

function setcity(city) {
    let str = city;

    // /で分割
    let result = str.split('/');

    // .jpgを削除
    str = result[3];
    result = str.replace('.jpg', '');

    return result;
}


// const User = {
//     template: '<div>UserID: {{$route.params.id}}</div>'
// }

// const routes  = [
//     {path: '/user/:id', component: User}
// ]

// const router = new VueRouter({
//     mode: 'history',
//     routes
// })


// export default router

// const app3 = new Vue({
//     el: '#app3',
//     router
// }).$mount('#app3');




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

            $("#countryArea").text("次はこの国！" + selectedCountry.name);
            $("#infoBoard").fadeIn(1000);


            setTimeout(function () {
                $("#infoBoard").fadeOut(1000);
            }, 3000);

            // console.log(setcity(image));

            let tag = (setcity(image));

            let a = new Array();

            $.ajax({
                type: 'GET',
                url: 'twitter' + '/' + tag,
                dataType: 'json',
            }).done(function (results2) {
                
                a = [...results2];

                // console.log(results2);

                const app2 = new Vue({
                    el: '#app2',
                    data: function(){
                        return {
                            item: a,
                        }

                    }
                    
                    // ,
                    // mounted: function() {
                    //     this.getitem();
            
                    // },
                    // methods: {

                    //     getitem: function () {
                            
                            
                    //         this.$nextTick(function () {
                             
                    //             // await this.$nextTick()
                    //             console.log(a);
                    //             // this.item = [];
                    //             this.item.splice(0);
                    //             this.item.push(...a);
                        
        
                    //         })
  
                    //     }
                    // }
  

                })
                Vue.nextTick(function () {
                    // app2.item.splice(0, app2.item.length);
                    app2.item.splice(0);
                    app2.item.push(...results2);
                    console.log(app2.item[0].text);
                    // return app2.item;
                    
                 })





                // const app2 = new Vue({
                //     el: '#app2',
                //     data: {
                //         item: "",
                //     },
                //     methods: {

                //         incrementArray() {
                //             this.$nextTick(function() {
                //                 this.$set(this.item, results2);
                //                 // this.splice(0, this.length, ...results2);
                //                 // this.item.splice(0, 1, results2);
                //                 // app2 = { ...app2, item: results2 };
                //                 // this.item = results2;
                //             })
  
                //         }
                //     }
  

                // });





                // // app2.item = results2;
                // Vue.nextTick(function () {
                // // app2.item = results2;
                //     app2 = { ...app2, item:results2}
                //     // app2.item.splice(0, 0, results2);
                // })



            })
            console.log(app2);




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
