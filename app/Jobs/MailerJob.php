<?php

namespace App\Jobs;

use App\Http\Controllers\AuthController;
use App\Mail\Mailer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     */
    public $input;
    public function __construct($data)
    {
        $this->input=$data;
    }
    
    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         Mail::to($this->input['email'])->send(new Mailer($this->input));  
        
    }
}
