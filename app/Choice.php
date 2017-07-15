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
 * App\Choice
 *
 * @property-read \App\Step $step
 * @mixin \Eloquent
 * @property int $step_id
 * @property int $choice_index
 * @property int $id
 * @property string $txt
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Choice whereChoiceIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Choice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Choice whereStepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Choice whereTxt($value)
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Choice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Choice whereUpdatedAt($value)
 */
class Choice extends Model
{
    public function step(){
        return $this->belongsTo("App\Step");
    }


}