<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'company_address'];

    public function ownershipType()
    {
        return $this->belongsTo(OwnershipTypes::class, 'ownership_types_id');
    }

    public function credits()
    {
        return $this->hasMany(Credit::class, 'company_id');
    }
}
