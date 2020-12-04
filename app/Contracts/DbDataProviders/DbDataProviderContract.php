<?php

namespace App\Contracts\DbDataProviders;

use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;
use App\Models\DTO\Extendable\DTOModel;

interface DbDataProviderContract
{
    /**
     * @param array $data
     * @return DTOModel|null
     * @throws ValidationException
     */
    public function create(array $data) : ?DTOModel;

    /**
     * @param int $id
     * @return DTOModel|null
     */
    public function read(int $id): ?DTOModel;

    /**
     * @return DTOModel[]|null
     */
    public function all(): ?array;

    /**
     * @param int $id
     * @param array $data
     * @return bool
     * @throws ValidationException
     * @throws NotFoundException
     */
    public function update(int $id, array $data) : bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool;

    /**
     * @return QueryBuilderContract
     */
    public function getBuilder();

    /**
     * @param QueryBuilderContract $builder
     * @return DTOModel[]|null
     */
    public function get($builder) : ?array;

    /**
     * @param QueryBuilderContract $builder
     * @return DTOModel|null
     */
    public function first($builder) : ?DTOModel;
}
