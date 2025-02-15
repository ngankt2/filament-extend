<?php

namespace Wiz\VNLocation;

use Wiz\VNLocation\Models\Province;


/**

 * @property string|null province_code
 */
trait HasVnProvinceRelation
{

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }
}
