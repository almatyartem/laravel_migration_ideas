<?php

namespace App\Storage\Eloquent;

use App\Common\Contracts\Storage\ModelConvertableToDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model implements ModelConvertableToDTO
{
    use HasFactory;
}
