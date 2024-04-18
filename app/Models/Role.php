<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Users extends Model
{
    protected $table = 'roles';
    use HasFactory;
    public function getAllUser()
    {
        $roles = DB::select('select * from roles ');
        return $roles;
    }
}
