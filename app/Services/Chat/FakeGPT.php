<?php

namespace App\Services\Chat;

use OpenAI;
use OpenAI\Exceptions\ErrorException;

class FakeGPT implements ChatInterface
{
    public function __construct(protected string|array $reply)
    {
    }

    public function model(string $model): self
    {
        return $this;
    }

    public function completion(string $prompt): string
    {
        if (is_array($this->reply))
            return array_key_exists($prompt, $this->reply) ? $this->reply[$prompt] : 'Hello World.';

        return $this->reply;
    }
}
