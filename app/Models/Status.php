<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Status extends Model
{
    protected $table = 'status';
    
    public function getAllStatus()
    {
        return Status::all();
    }
}
