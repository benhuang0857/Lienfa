<?php

namespace App\Models\TourInformation\Geographic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'country';

    public function continent()
    {
        return $this->belongsToMany(Continent::class, 'continent_country_relation', 'cid', 'pid');
    }

    public function group_country()
    {
        return $this->belongsToMany(GroupCountry::class, 'groupcountry_country_relation', 'cid', 'pid');
    }

    public function group_province()
    {
        return $this->belongsToMany(GroupProvince::class, 'country_groupprovince_relation', 'pid', 'cid');
    }

    public function province()
    {
        return $this->belongsToMany(Province::class, 'country_province_relation', 'pid', 'cid');
    }

    public function city()
    {
        return $this->belongsToMany(City::class, 'country_city_relation', 'pid', 'cid');
    }

    public function group_city()
    {
        return $this->belongsToMany(GroupCity::class, 'country_groupcity_relation', 'pid', 'cid');
    }
}
