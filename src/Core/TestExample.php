<?php

namespace Core;

class TestExample
{
    public function teste()
    {
        \Mockery::mock(\stdClass::class)->shouldReceive('teste')->andReturn(true);
        return "teste";
    }
}