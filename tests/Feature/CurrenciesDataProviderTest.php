<?php

namespace Tests\Feature;

use App\Exceptions\ValidationException;
use App\Models\DTO\CurrencyDTO;
use App\Modules\Storage\DataProviders\CurrenciesDataProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CurrenciesDataProviderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCrud()
    {
        /**
         * @var $provider CurrenciesDataProvider
         */
        $provider = app()->make(CurrenciesDataProvider::class);

        $newRecord = $provider->create('test');
        $this->assertInstanceOf(CurrencyDTO::class, $newRecord);
        $this->assertTrue($newRecord->code == 'test');

        try {
            $exception = null;
            $provider->create('test');
        } catch(ValidationException $validationException) {
            $exception = $validationException;
        }
        $this->assertInstanceOf(ValidationException::class, $exception);
        $errors = $exception->getErrors();
        $this->assertTrue($errors == ['code' => ['Unique' => ['currencies']]]);

        $updateResult = $provider->setSign($newRecord->id, '$');
        $this->assertTrue($updateResult === true);

        $updatedRecord = $provider->read($newRecord->id);
        $this->assertTrue($updatedRecord->sign == '$');

        $deleteResult = $provider->delete($newRecord->id);
        $this->assertTrue($deleteResult === true);

        $deletedRecord = $provider->read($newRecord->id);
        $this->assertTrue($deletedRecord === null);
    }
}
