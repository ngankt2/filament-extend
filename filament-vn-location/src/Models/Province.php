<?php
namespace Wiz\VNLocation\Models;

use App\Models\Location\AdministrativeRegion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'zi_vn_provinces';

    protected $fillable = [
        'code',
        'name',
        'name_en',
        'full_name',
        'full_name_en',
        'code_name',
    ];

    public function administrativeRegion()
    {
        return $this->belongsTo(AdministrativeRegion::class, 'administrative_region_id', 'id');
    }

    public function administrativeUnit()
    {
        return $this->belongsTo(AdministrativeUnit::class, 'administrative_unit_id', 'id');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'province_code', 'code');
    }
}
