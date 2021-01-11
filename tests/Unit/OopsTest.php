<?php

namespace ImpulsoLike\Oops\Tests\Unit;

use PHPUnit\Framework\TestCase;

use ImpulsoLike\Oops\Oops;

class OopsTest extends TestCase
{
    private $default_error_type = 'error';
    private $default_error_code = 0;

    /** @test */
    public function getDefaultErrorCode()
    {
        $error = new Oops();
        $this->assertEquals($this->default_error_code, $error->getCode());
    }

    /** @test */
    public function getDefaultErrorType()
    {
        $error = new Oops();
        $this->assertEquals($this->default_error_type, $error->getType());
    }

    /** @test */
    public function getCustomErrorCode()
    {
        $error = new Oops(1);
        $this->assertEquals(1, $error->getCode());
    }

    /** @test */
    public function getCustomErrorType()
    {
        $error = new Oops(1, 'mi_error');
        $this->assertEquals('mi_error', $error->getType());
    }

    /** @test */
    public function setCustomErrorTypeNull()
    {
        $error = new Oops(1, null);
        $this->assertEquals($this->default_error_type, $error->getType());
    }

    /** @test */
    public function setCustomErrorTypeEmpty()
    {
        $error = new Oops(1, '');
        $this->assertEquals($this->default_error_type, $error->getType());
    }

    /** @test */
    public function setCustomErrorTypeOnlySpaces()
    {
        $error = new Oops(1, '  ');
        $this->assertEquals($this->default_error_type, $error->getType());
    }

    /** @test */
    public function setCustomErrorTypeFormat()
    {
        $error = new Oops(1, 'mi error');
        $this->assertEquals('mi_error', $error->getType());
    }

    /** @test */
    public function setCustomErrorTypeWithSpaces()
    {
        $error = new Oops(1, ' mi_error  ');
        $this->assertEquals('mi_error', $error->getType());
    }

    /** @test */
    public function getErrorMessage()
    {
        $error = new Oops();
        $this->assertEquals('error-000', $error->getMessage());
    }

    /** @test */
    public function getErrorCustomMessage()
    {
        $error = new Oops(1, 'mi_error');
        $this->assertEquals('mi_error-001', $error->getMessage());
    }

    /** @test */
    public function isOops()
    {
        $error = new Oops();
        $this->assertTrue(Oops::is($error));
    }

    /** @test */
    public function isNotOops()
    {
        $error = new Oops();
        $error = 'Algo';
        $this->assertFalse(Oops::is($error));
    }
}
