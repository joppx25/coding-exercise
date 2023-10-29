<?php

namespace App\Jobs;

use App\Mail\OrderSummary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderSummaryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $product;
    private $user;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->product = $data['product'];
        $this->user = $data['user'];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Call email sending here
        Mail::to($this->user['email'])->send(new OrderSummary($this->product));
    }
}
