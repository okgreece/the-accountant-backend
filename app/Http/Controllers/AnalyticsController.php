<?php

namespace App\Http\Controllers;

use \App\Graph;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index(){
      
        return view('analytics.index', [
            "endings" => $this->endings(),
            "earnings" => $this->earnings(),
            "risk_police" => $this->risk_police(),
            "risk_contractors" => $this->risk_contractors(),
            "risk_political" => $this->risk_political(),
            "steps" => $this->steps(),        
        ]);

    }
    
    public function graph(Graph $graph){
        $chartjs = app()->chartjs
        ->name(str_replace(" ", "_", $graph->title))
        ->type($graph->type)
        ->size(['width' => 400, 'height' => 200])
        ->labels($graph->labels)
        ->datasets([
            [
                'backgroundColor' => ['#1f77b4', '#aec7e8', '#ff7f0e', '#ffbb78', '#2ca02c', '#98df8a', '#d62728', '#ff9896', '#9467bd', '#c5b0d5', '#8c564b', '#c49c94', '#e377c2', '#f7b6d2', '#7f7f7f', '#c7c7c7', '#bcbd22', '#dbdb8d', '#17becf', '#9edae5'],
                'hoverBackgroundColor' => ['#1f77b4', '#aec7e8', '#ff7f0e', '#ffbb78', '#2ca02c', '#98df8a', '#d62728', '#ff9896', '#9467bd', '#c5b0d5', '#8c564b', '#c49c94', '#e377c2', '#f7b6d2', '#7f7f7f', '#c7c7c7', '#bcbd22', '#dbdb8d', '#17becf', '#9edae5'],
                'data' => $graph->data
            ]
        ])
        ->optionsRaw("{title: {
            display: true,
            text: '" . $graph->title . "'
        },
        legend:{
        display:false},
        scales:{
        yAxes:[
        {
        ticks:{
            beginAtZero:true
        }
        }
        ]
        }
        }")
        ;
        return $chartjs;
    }

    public function endings(){
        $endings = DB::table('records')
                     ->select(DB::raw('count(*) as counter, consequences'))
                     ->groupBy('consequences')
                     ->get();
        
        $graph = new Graph();
        $graph->labels = $endings->pluck("consequences")->all();
        $graph->data = $endings->pluck("counter")->all();
        $graph->title = "Consequences";
        $graph->type = "bar";
               
        return $this->graph($graph);
    }
    
    public function steps(){
        $db = \App\Record::all()->map(function($item,$key){
            
            return [
                "last_step" => $item->last_step->last()->choice->step->step_index,
                "id" => $item->id
                    ];
       
        });
        
        $graph = new Graph();
        $graph->labels = $db->pluck("id")->all();
        $graph->data = $db->pluck("last_step")->all();
        $graph->title = "Last Step";
        $graph->type = "bar";
        return $this->graph($graph);
        
    }
    
    public function earnings(){
        $db = \App\Record::all();
        
        $graph = new Graph();
        $graph->labels = $db->pluck("id")->all();
        $graph->data = $db->pluck("personal_account")->all();
        $graph->title = "Personal Account";
        $graph->type = "bar";
               
        return $this->graph($graph);              
                
    }
    
    public function risk_contractors(){
        $db = \App\Record::all();
        
        $graph = new Graph();
        $graph->labels = $db->pluck("id")->all();
        $graph->data = $db->pluck("risk_contractors")->all();
        $graph->title = "Contractors Risk";
        $graph->type = "bar";
               
        return $this->graph($graph);   
        
    }
    
    public function risk_police(){
        $db = \App\Record::all();
        
        $graph = new Graph();
        $graph->labels = $db->pluck("id")->all();
        $graph->data = $db->pluck("risk_police")->all();
        $graph->title = "Police Risk";
        $graph->type = "bar";
               
        return $this->graph($graph);   
        
    }
    
    
    public function risk_political(){
        $db = \App\Record::all();
        
        $graph = new Graph();
        $graph->labels = $db->pluck("id")->all();
        $graph->data = $db->pluck("risk_political")->all();
        $graph->title = "Political Risk";
        $graph->type = "bar";
               
        return $this->graph($graph);   
        
    }
    
    
}
