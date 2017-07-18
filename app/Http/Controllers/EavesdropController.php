<?php
/**
 * Created by PhpStorm.
 * User: larjo
 * Date: 14/7/2017
 * Time: 03:56
 */

namespace App\Http\Controllers;


use App\Choice;
use App\PlayedStep;
use App\Record;
use App\Step;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;

class EavesdropController extends Controller
{

    public function listen(){
        $content = json_decode(request()->getContent(), true);

        $record = new Record($content["vars"]);
        $record->ip = request()->ip();
        $record->session_id = $content["id"];
        $record->consequences = $content["consequences"];
        $record->save();
        foreach ($content["history"] as $hstep) {
            $step_index = $hstep[0];
            $choice_index = $hstep[1];
            $step = Step::where("step_index", $step_index)->first();
            $choice = Choice::where("choice_index", $choice_index)->where("step_id", $step->id)->first();

            $played_step = new PlayedStep(["choice_id"=>$choice->id, "record_id"=>$record->id]);
            $played_step->save();


        }


        return $content;
    }
    public function greet(){


        return ;
    }
}