<?php

namespace App\Models\TourInformation\Geographic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    use HasFactory;

    protected $table = 'continent';

    public function group_country()
    {
        return $this->belongsToMany(GroupCountry::class, 'continent_groupcountry_relation', 'pid', 'cid');
    }

    public function country()
    {
        return $this->belongsToMany(Country::class, 'continent_country_relation', 'pid', 'cid');
    }
}
