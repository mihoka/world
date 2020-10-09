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
            $array = array($item["start"]);
            $itinerary = array_merge($itinerary,$array);
        }

        return view('welcome')->with('itinerary',$itinerary);
    }
}
