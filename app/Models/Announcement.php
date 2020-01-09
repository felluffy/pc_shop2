<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $table = 'announcements';

    protected $fillable = ['title', 'content'];
}
