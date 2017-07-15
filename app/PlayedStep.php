<?php
/**
 * Created by PhpStorm.
 * User: larjo
 * Date: 14/7/2017
 * Time: 04:38
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * App\PlayedStep
 *
 * @property-read \App\Choice $choice
 * @property-read \App\Record $record
 * @mixin \Eloquent
 * @property int $year_id
 * @property int $choice_id
 * @property int $record_id
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlayedStep whereChoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlayedStep whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlayedStep whereRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlayedStep whereYearId($value)
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlayedStep whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlayedStep whereUpdatedAt($value)
 */
class PlayedStep extends Model
{

    protected $guarded = ["id"];

    public function choice(){
        return $this->belongsTo("App\Choice");
    }
    public function record(){
        return $this->belongsTo("App\Record");
    }

}