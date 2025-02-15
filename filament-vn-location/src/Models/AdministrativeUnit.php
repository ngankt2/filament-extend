<?php
namespace Wiz\VNLocation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeUnit extends Model
{
    use HasFactory;

    protected $table = 'zi_vn_administrative_units';

    protected $fillable = [
        'full_name',
        'full_name_en',
        'short_name',
        'short_name_en',
        'code_name',
        'code_name_en',
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class, 'administrative_unit_id', 'id');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'administrative_unit_id', 'id');
    }
}
