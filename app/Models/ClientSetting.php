<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSetting extends Model
{
    use HasFactory;
    public $table = "client_settings";
    public $timestamps = false;
}
