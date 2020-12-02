<?php

namespace App\Modules\Storage\DataProviders;

use App\Contracts\DataProviders\ExchangeRatesDataProviderContract;
use App\Contracts\SearchContexts\BaseSearchContextContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Storage\DataProviders\Extendable\BaseCrudDataProvider;
use App\Modules\Storage\Eloquent\DbDataProviders\ExchangeRatesDbDataProvider;
use App\Models\DTO\ExchangeRateDTO;
use App\Modules\Storage\SearchContexts\ExchangeRatesSearchContext;

class ExchangeRatesDataProvider extends BaseCrudDataProvider implements ExchangeRatesDataProviderContract
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
     * @return ExchangeRatesSearchContext
     */
    function search() : ExchangeRatesSearchContext
    {
        return parent::search();
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
