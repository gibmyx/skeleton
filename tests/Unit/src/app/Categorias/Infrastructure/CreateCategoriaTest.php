<?php

declare(strict_types=1);


namespace Unit\src\app\Categorias\Infrastructure;


use Tests\TestCase;

final class CreateCategoriaTest extends TestCase
{

    public function testCreateCategoria()
    {
        $this->assertSame('first', 'first');
    }

    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer($a, $b)
    {
        $this->assertSame('first', $a);
        $this->assertSame('second', $b);
    }
}
