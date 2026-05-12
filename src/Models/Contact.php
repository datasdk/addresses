<?php

namespace DataSDK\Addresses\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DataSDK\Addresses\Database\Factories\ContactFactory;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'type',
        'gender',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'company',
        'extra',
        'vat_id',
        'position',
        'phone',
        'mobile',
        'fax',
        'email',
        'email_invoice',
        'website',
        'address_id',
        'properties',
        'contactable_type',
        'contactable_id',
        'is_public',
        'is_primary',
        'notes',
    ];

    protected $casts = [
        'properties' => 'array',
        'deleted_at' => 'datetime',
    ];

    public function contactable()
    {
        return $this->morphTo();
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    protected static function newFactory()
    {
        return ContactFactory::new();
    }
}
