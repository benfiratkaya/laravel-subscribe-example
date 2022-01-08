<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use App\Models\Subscriber;
use App\Models\Website;
use App\Models\Post;
use App\Models\WebsiteSubscriber;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to the subscribers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param  \App\Support\DripEmailer  $drip
     * @return mixed
     */
    public function handle()
    {
        $post = Post::find($this->argument('post'));
        if (!$post) return false;
        $website = $post->website()->get()->first();
        $subscribers = $website->subscribers()->get();
        foreach($subscribers as $subscriber) {
            $mailDetails = array(
                'post' => $post,
                'to' => $subscriber->email
            );
            dispatch(new \App\Jobs\SendEmail($mailDetails));
        }
    }
}
