<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Series extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "series";
    protected $dates = [ 'created_at', 'updated_at', 'deleted_at'];

    /*
    public function company() {
        return $this->belongsTo("App\Company");
    }
    */
    public function company() {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }
}
