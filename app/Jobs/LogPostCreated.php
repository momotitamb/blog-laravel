<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Post;

class LogPostCreated implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Post $post) {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Log::info('Пост создан: ' . $this->post->title);
    }
}
