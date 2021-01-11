<?php

declare(strict_types=1);

namespace ImpulsoLike\Oops;

trait OopsError
{
    protected $error;

    final public function setError(Oops $error)
    {
        $this->error = $error;
    }

    final public function hasError(): bool
    {
        return Oops::is($this->error);
    }

    final public function getError(): Oops
    {
        return $this->error;
    }
}
