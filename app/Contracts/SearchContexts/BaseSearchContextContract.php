<?php

namespace App\Contracts\SearchContexts;

interface BaseSearchContextContract
{
    /**
     * @return mixed|null
     */
    public function find();

    /**
     * @return mixed|null
     */
    public function first();

    /**
     * @param callable $resultHandler
     * @return mixed
     */
    public function setResultHandler(callable $resultHandler);
}
