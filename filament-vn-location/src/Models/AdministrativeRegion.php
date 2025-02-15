<?php
namespace Wiz\VNLocation\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeRegion extends Model
{
    use HasFactory;

    protected $table = 'zi_vn_administrative_regions';

    protected $fillable = [
        'name',
        'name_en',
        'code_name',
        'code_name_en',
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class, 'administrative_region_id', 'id');
    }
}
