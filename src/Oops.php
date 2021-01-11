<?php

declare(strict_types=1);

namespace ImpulsoLike\Oops;

use ImpulsoLike\Oops\Traits\{
    OopsApiTrait,
    OopsCoreTrait
};
use Exception;

class Oops extends Exception implements IsOops
{
    use OopsApiTrait;
    use OopsCoreTrait;

    protected $type;
    protected $timestamp;
    protected $microtime;
    protected $message_glue         = '-';
    protected $message_code_length  = 3;
    protected $default_type         = 'error';
    protected $default_code         = 0;
    protected $default_debug        = true;

    public function __construct(?int $code = null, ?string $type = null, ?bool $debug = null)
    {
        $this->debug        = $this->setDebug($debug);
        $this->type         = $this->setType($type);
        $this->code         = $this->setCode($code);
        $this->message      = $this->setMessage();
        if ($this->debug) {
            $this->microtime    = $this->setMicrotime();
            $this->timestamp    = $this->setTimestamp();
            parent::__construct($this->message, $this->code);
        } else {
            $this->microtime    = null;
            $this->timestamp    = null;
            $this->file         = null;
            $this->line         = null;
        }
    }
}
