<?php

namespace Wiz\VNLocation;

use App\Models\Location\Ward;
use Wiz\VNLocation\Models\District;
/**

 * @property string|null ward_code
 */
trait HasVnWardRelation
{
    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_code', 'code');
    }
}
