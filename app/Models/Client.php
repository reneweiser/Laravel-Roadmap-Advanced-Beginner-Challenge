<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $appends = ['address'];
    protected $fillable = [
        'company',
        'vat',
        'country',
        'postal_code',
        'city',
        'street',
    ];

    public function getAddressAttribute()
    {
        return "{$this->street} {$this->city}, {$this->country} {$this->postal_code}";
    }
}
