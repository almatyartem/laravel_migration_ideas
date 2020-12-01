<?php

namespace App\Modules\Storage\DbDataProviders\Eloquent\Models;

use App\Contracts\DTOConvertable;
use Illuminate\Database\Eloquent\Model;

abstract class BaseEloquentModel extends Model implements DTOConvertable
{

}
