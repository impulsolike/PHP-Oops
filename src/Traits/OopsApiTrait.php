<?php

declare(strict_types=1);

namespace ImpulsoLike\Oops\Traits;

trait OopsApiTrait
{
    final public function getDebug(): bool
    {
        return $this->debug;
    }

    final public function getType(): string
    {
        return $this->type;
    }

    final public function getTimestamp(): ?int
    {
        return $this->debug ? $this->timestamp : null;
    }

    final public function getMicrotime(): ?float
    {
        return $this->debug ? $this->microtime : null;
    }

    final public function toArray(): array
    {
        $result = [
            'type'      => $this->type,
            'code'      => $this->code,
            'message'   => $this->message,
            'debug'     => false,
        ];
        return $this->debug ? array_merge($result, [
            'debug'     => true,
            'file'      => $this->file,
            'line'      => $this->line,
            'microtime' => $this->microtime,
            'timestamp' => $this->timestamp,
        ]) : $result;
    }

    final public function toObject(): object
    {
        return (object) $this->toArray();
    }

    final static public function is($error): bool
    {
        return $error instanceof self;
    }
}
