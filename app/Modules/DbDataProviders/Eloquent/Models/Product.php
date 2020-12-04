<?php

namespace App\Modules\DbDataProviders\Eloquent\Models;

use App\Modules\DbDataProviders\Eloquent\Models\Extendable\BaseEloquentModel;
use App\Models\DTO\ProductDTO;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends BaseEloquentModel
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'code',
        'usd_price',
    ];

    /**
     * @var array
     */
    protected array $rules = [
        'title' => ['required'],
        'code' => ['required'],
        'usd_price' => ['required']
    ];

    /**
     * @return string
     */
    public function getDTOClassName(): string
    {
        return ProductDTO::class;
    }
}
