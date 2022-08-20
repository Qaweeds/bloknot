<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    const NEW = 1;
    const EXISTS = 2;

    public function Records()
    {
        return $this->hasMany(Record::class)->withTrashed();
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return parent::resolveRouteBinding($value, 'name');
    }

    public function getRecordsSumAttribute()
    {
        return $this->records->sum('sum');
    }

    public function getRecordsQuantityAttribute()
    {
        return $this->records->sum('quantity');
    }

    public function getCreditAttribute()
    {
        return $this->records->sum(function ($rec) {
            return is_null($rec->deleted_at) ? $rec->sum : 0;
        });
    }
}
