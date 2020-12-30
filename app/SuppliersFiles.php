<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuppliersFiles extends Model
{
    protected $table = 'suppliers_files';

    protected $guarded = [];
    
    public $timestamps = true;
}
