<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boat extends Model
{
    use SoftDeletes;

    // declare table
    public $table = 'boat';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'boat_code',
        'boat_name',
        'owner_name',
        'owner_address',
        'boat_size',
        'captain',
        'member_amount',
        'boat_photo',
        'license_number',
        'license_document'
    ];
}
