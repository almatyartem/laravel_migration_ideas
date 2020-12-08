<?php

namespace App\Modules\Repositories\Services;

use App\Contracts\DbDataProviders\DbDataProviderContract;
use App\Contracts\DbDataProviders\Entities\ProductsDBContract;
use App\Contracts\Repositories\Services\ProductsRepositoryContract;
use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Repositories\Services\Extendable\BaseRepository;
use App\Models\DTO\ProductDTO;

class ProductsRepository extends BaseRepository implements ProductsRepositoryContract
{
    /**
     * @var DbDataProviderContract
     */
    protected $dbProvider;

    /**
     * ProductsRepository constructor.
     * @param DbDataProviderContract $dbProvider
     */
    function __construct(DbDataProviderContract $dbProvider)
    {
        parent::__construct($dbProvider);
    }

    /**
     * @param int $id
     * @return ProductDTO|DTOModel|null
     */
    public function read(int $id) : ?ProductDTO
    {
        return parent::read($id);
    }

    /**
     * @return ProductDTO[]|null
     */
    public function all() : ?array
    {
        return parent::all();
    }

    /**
     * @param string $code
     * @param string $title
     * @param float $usdPrice
     * @return ProductDTO|DTOModel|null
     * @throws ValidationException
     */
    public function create(string $code, string $title, float $usdPrice) : ?ProductDTO
    {
        return parent::createFromArray([
            'code' => $code,
            'title' => $title,
            'usd_price' => $usdPrice
        ]);
    }

    /**
     * @param int $id
     * @param float $usdPrice
     * @return bool
     * @throws ValidationException|NotFoundException
     */
    public function updatePrice(int $id, float $usdPrice)
    {
        return $this->updateByArray($id, [
            'usd_price' => $usdPrice
        ]);
    }
}
