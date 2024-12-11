<?php

namespace App\Lib;

use Ahmadrosid\Laravel\Anthropic\AnthropicAI;

class PostGenerator
{
    public string $prompt;
    public string $prompt_copy_cat;
    public string $model = 'claude-3-5-sonnet-20241022';

    public function __construct()
    {
        $this->prompt = <<<'PROMPT'
You are social media specialist, you will write engaging social media post.
<output>
[Insert your crafted social media post here, including call-to-action]
</output>
PROMPT;
    }

    public function generate($content)
    {
        $prompt = str_replace(
            ['{{CONTENT}}'],
            [$content],
            $this->prompt
        );
        return AnthropicAI::chat()->createStreamed([
            'model' => $this->model,
            'temperature' => 0.2,
            'max_tokens' => 4096,
            'stop_sequences' => ["</output>"],
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt
                ],
                [
                    'role' => 'assistant',
                    'content' => '<output>'
                ],
            ],
        ]);
    }
}