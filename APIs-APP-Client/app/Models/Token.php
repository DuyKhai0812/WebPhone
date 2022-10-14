<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    protected $table = "token";
    protected $primaryKey = "id";
    protected $filltable = [
        "id",
        "Account",
        "Token",
        "Refresh_Token",
        "Token_Expried",
        "Refresh_Token_Expried",
        "Created_Date",
        "Updated_Date",
    ];
}
