<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use App\Models\Travel;
use Illuminate\Http\Request;
use Throwable;
use Log;

class TravelController extends Controller
{
    public function getTravel() {

        $items = Travel::all();
        $list = array();

        foreach($items as $item){
            // echo $item;
            // echo $item["start"];
            // echo $item["end"];

            $array = array([
                "e" => $item["start"],
                "i" => $item["end"],
                "v" => "800000"
            ]);

            $list = array_merge($list,$array);
        }


        // foreach($list as $test){
        //     echo $test["e"];
        //     echo $test["i"];
        // }

        // $travel = array(
        //     "dataSetKeys" => ["sweet"],
        //     "initDataSet" => "sweet",
        //     "sweet" => array([
        //         "e" => "JP",
        //         "i" => "US",
        //         "v" => "800000"
        //     ])
        // );

        $travel = array(
            "dataSetKeys" => ["sweet"],
            "initDataSet" => "sweet",
            "sweet" => $list
        );

        $travel = mb_convert_encoding($travel, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        return response()->json($travel);

        //  return view('welcome')->with('travel',$travel);

    }

    public function getItinerary() {
        
        $items = Itinerary::all();
        $itinerary = array();

        foreach($items as $item){
            $array = array(
                $item['start']
            );
            $itinerary = array_merge($itinerary,$array); 
        }
        // foreach($items as $item){
        //     $array = array(
        //         'city'=>$item['start'],
        //         'image'=>$item['image']
        //     );
        //     array_push($itinerary,$array);
        //     // $itinerary[] = $array;   
        // }
        // dd($itinerary);

        $list = Travel::all();
        $item_travel = array();
        foreach($list as $item){
            // echo $item;
            // echo $item["start"];
            // echo $item["end"];

            $array = array([
                "e" => $item["start"],
                "image" => $item["image"]
            ]);

            $item_travel = array_merge($item_travel,$array);
        }

        // $search_tag = \Twitter::get("search/tweets", array("q" => "", 'count' => 10));
        // $result = array();

                
        // foreach($search_tag as $key => $value){

        //     if($key === "statuses"){
        //         $result = array_merge($result,$value);
        //     }
        // }

        return view('welcome')->with([
            'itinerary' => $itinerary,
            'item_travel' => $item_travel
            // 'result' => $result
        ]);
    }

}
