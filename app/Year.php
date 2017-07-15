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
 * App\Year
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Step[] $steps
 * @mixin \Eloquent
 * @property int $year
 * @property int $year_index
 * @property int $id
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereYearIndex($value)
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Year whereUpdatedAt($value)
 */
class Year extends Model
{
    public function steps(){
        return $this->hasMany("App\Step");
    }

}