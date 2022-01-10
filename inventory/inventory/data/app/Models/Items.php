<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "items";
    protected $fillable = [
        'category',
        'title',
        'description',
        'price',
        'quantity',
        'sku',
        'picture',
    ];
    protected $dates = [ 'created_at', 'updated_at', 'deleted_at'];

    public function series () {
        return $this->hasMany('App\Series', 'company_id');
    }

}
