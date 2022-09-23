<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectionCow extends Model
{
    use HasFactory;

    protected $table = 'selection_cow';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
