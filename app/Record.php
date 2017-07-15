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
 * App\Record
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Step[] $steps
 * @mixin \Eloquent
 * @property int $id
 * @property string $ip
 * @property string $history
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property float $expenditures
 * @property float $personal_account
 * @property float $reserves
 * @property float $resources
 * @property int $risk_contractors
 * @property int $risk_police
 * @property int $risk_political
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereExpenditures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record wherePersonalAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereReserves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereResources($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereRiskContractors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereRiskPolice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereRiskPolitical($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereUpdatedAt($value)
 * @property string $session_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Record whereSessionId($value)
 */
class Record extends Model
{
    protected $guarded = ['id'];

    public function steps(){
        return $this->hasMany("App\Step");
    }

}