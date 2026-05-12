<?php

namespace DataSDK\Addresses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DataSDK\Addresses\Database\Factories\AddressFactory;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'street',
        'street_extra',
        'city',
        'state',
        'post_code',
        'country_id',
        'note',
        'notes',
        'properties',
        'lat',
        'lng',
        'addressable_type',
        'addressable_id',
        'user_id',
        'is_public',
        'is_primary',
        'is_billing',
        'is_shipping',
    ];

    protected $casts = [
        'properties' => 'array',
        'deleted_at' => 'datetime',
    ];

    public function addressable()
    {
        return $this->morphTo();
    }

    protected static function newFactory()
    {
        return AddressFactory::new();
    }
}
