<?php

namespace App\Models\TourInformation\Geographic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupCountry extends Model
{
    use HasFactory;

    protected $table = 'group_country';

    public function continent()
    {
        return $this->belongsToMany(Continent::class, 'continent_groupcountry_relation', 'cid', 'pid');
    }

    public function country()
    {
        return $this->belongsToMany(Country::class, 'groupcountry_country_relation', 'pid', 'cid');
    }
}
