<?php

namespace App\Models\TourInformation\Geographic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupProvince extends Model
{
    use HasFactory;

    protected $table = 'group_province';

    public function country()
    {
        return $this->belongsToMany(Country::class, 'country_groupprovince_relation', 'cid', 'pid');
    }

    public function province()
    {
        return $this->belongsToMany(Province::class, 'groupprovince_province_relation', 'pid', 'cid');
    }

    public function city()
    {
        return $this->belongsToMany(City::class, 'groupprovince_city_relation', 'pid', 'cid');
    }
}
