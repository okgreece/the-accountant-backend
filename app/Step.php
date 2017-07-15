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
 * App\Step
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Choice[] $choices
 * @property-read \App\Year $year
 * @mixin \Eloquent
 * @property int $year_id
 * @property int $step_index
 * @property string $last_text
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereLastText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereStepIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereYearId($value)
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Step whereUpdatedAt($value)
 */
class Step extends Model
{
    public function year(){
        return $this->belongsTo("App\Year");
    }
    public function choices(){
        return $this->hasMany("App\Choice");
    }


}