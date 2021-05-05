<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    const ACTIVE = 1;
    const INACTIVE = 0;

    public static $pageSize = 10;
    public static $pageNum = 1;

}
