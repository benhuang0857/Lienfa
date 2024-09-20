<?php

namespace App\Models\TourInformation\Geographic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'city';

    public function country()
    {
        return $this->belongsToMany(Country::class, 'country_city_relation', 'cid', 'pid');
    }

    public function province()
    {
        return $this->belongsToMany(Province::class, 'province_city_relation', 'cid', 'pid');
    }

    public function group_province()
    {
        return $this->belongsToMany(GroupProvince::class, 'groupprovince_city_relation', 'cid', 'pid');
    }
}
