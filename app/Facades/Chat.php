<?php

namespace App\Facades;

use App\Services\Chat\ChatInterface;
use Illuminate\Support\Facades\Facade;

class Chat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ChatInterface::class;
    }

    public static function fake(string|array $reply): void
    {
        self::swap(new FakeGPT($reply));
    }
}
