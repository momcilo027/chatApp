<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msgs extends Model
{
    use HasFactory;

    protected $fillable = [
        'sent_id',
        'rec_id',
        'msg_text',
    ];
}
