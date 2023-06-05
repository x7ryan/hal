<?php

namespace App\Services\Chat;

interface ChatInterface
{
    public function model(string $model): self;

    public function completion(string $prompt): string;
}
