<?php

namespace App\Services\Chat;

use OpenAI;
use Illuminate\Support\Str;
use OpenAI\Exceptions\ErrorException;

class ChatGPT implements ChatInterface
{
    protected $client;
    protected $model = 'text-davinci-003';

    public function __construct()
    {
        $this->client = OpenAI::client(getenv('OPENAI_API_KEY'));
    }

    public function model(string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function completion(string $prompt): string
    {
        try {
            $result = $this->client->completions()->create([
                'model' => $this->model,
                'prompt' => $prompt
            ]);
        } catch (ErrorException $th) {
            $reason = "";

            if (Str::contains($th, 'You exceeded your current quota', true))
                $reason = "You exceeded your current quota.";

            return "I'm sorry Dave. I can't do that. {$reason}";
        }

        return trim($result['choices'][0]['text']);
    }
}
