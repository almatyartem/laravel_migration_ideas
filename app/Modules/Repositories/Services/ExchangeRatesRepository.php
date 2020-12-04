<?php

namespace App\Modules\Repositories\Services;

use App\Contracts\Repositories\Services\ExchangeRatesRepositoryContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Repositories\Services\Extendable\BaseRepository;
use App\Modules\DbDataProviders\Eloquent\Services\ExchangeRatesDbDataProvider;
use App\Models\DTO\ExchangeRateDTO;

class ExchangeRatesRepository extends BaseRepository implements ExchangeRatesRepositoryContract
{
    /**
     * @var ExchangeRatesDbDataProvider
     */
    protected $dbProvider;

    /**
     * ExchangeRatesRepository constructor.
     * @param ExchangeRatesDbDataProvider $dbProvider
     */
    function __construct(ExchangeRatesDbDataProvider $dbProvider)
    {
        parent::__construct($dbProvider);
    }

    /**
     * @param int $id
     * @return ExchangeRateDTO|DTOModel|null
     */
    public function read(int $id) : ?ExchangeRateDTO
    {
        return parent::read($id);
    }

    /**
     * @param int $currencyId
     * @param float $rateToUsd
     * @param string $date
     * @return mixed
     * @throws ValidationException
     */
    public function add(int $currencyId, float $rateToUsd, string $date) : ?ExchangeRateDTO
    {
        return $this->createFromArray([
            'currency_id' => $currencyId,
            'rate_to_usd' => $rateToUsd,
            'date' => $date
        ]);
    }
}
