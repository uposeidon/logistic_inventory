<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierFile extends Model
{
    protected $table = 'suppliers_files';

    protected $guarded = [];
    
    public $timestamps = true;

    public function suppliers()
    {
        return $this->hasMany('App\Supplier','suppliers_files_id');
    }
}
