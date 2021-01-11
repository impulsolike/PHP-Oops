<?php

declare(strict_types=1);

namespace ImpulsoLike\Oops\Traits;

trait OopsCoreTrait
{
    private function setDebug(?bool $debug): bool
    {
        if (!is_null($debug)) {
            return $debug ? true : false;
        }
        return $this->default_debug;
    }

    private function setType(?string $type): string
    {
        if (!is_null($type)) {
            $type = $this->formatType($type);
            if (!empty($type)) {
                return $type;
            }
        }
        return $this->default_type;
    }

    private function formatType(?string $type): string
    {
        $type = trim($type);
        $type = str_replace(' ', '_', $type);
        return $type;
    }

    private function setCode(?int $code): int
    {
        if (!is_null($code)) {
            return $code;
        }
        return $this->default_code;
    }

    private function setMessage(): string
    {
        return $this->type . $this->message_glue . str_pad((string) $this->code, $this->message_code_length, '0', STR_PAD_LEFT);
    }

    private function setMicrotime(): float
    {
        return microtime(true);
    }

    private function setTimestamp(): int
    {
        return (int) floor($this->microtime);
    }
}
