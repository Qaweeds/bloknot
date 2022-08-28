<?php

namespace App\Models;

use App\Scopes\WithTrashedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Record extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'people_id', 'price', 'quantity', 'deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new WithTrashedScope);
    }

    public function people()
    {
        return $this->belongsTo(People::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('H:i d/m/y');
    }

    public function getSumAttribute()
    {
        if (is_null($this->quantity)) return $this->price;

        return $this->price * $this->quantity;
    }

}
