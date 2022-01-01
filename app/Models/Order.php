<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'quantity'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::Class)->withPivot(['quantity']);
    }
    public function user() {
        return $this->belongsTo(App\Models\User::class);
    }
}
