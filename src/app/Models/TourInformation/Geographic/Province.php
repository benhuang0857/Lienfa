<?php

namespace App\Models\TourInformation\Geographic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'province';

    public function group_province()
    {
        return $this->belongsToMany(GroupProvince::class, 'groupprovince_province_relation', 'cid', 'pid');
    }

    public function country()
    {
        return $this->belongsToMany(Country::class, 'country_province_relation', 'cid', 'pid');
    }

    public function city()
    {
        return $this->belongsToMany(City::class, 'province_city_relation', 'pid', 'cid');
    }
}
