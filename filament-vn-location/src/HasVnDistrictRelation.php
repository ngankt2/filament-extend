<?php

namespace Wiz\VNLocation;

use Wiz\VNLocation\Models\District;
/**

 * @property string|null district_code
 */
trait HasVnDistrictRelation
{

    public function district()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }
}
