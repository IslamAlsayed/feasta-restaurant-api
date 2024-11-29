<?php

namespace App\Jobs;

use App\Models\SendMail;
use App\Mail\SendEmail;
use App\Mail\SendEmailFailed;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $sendMail;

    public function __construct(SendMail $sendMail)
    {
        $this->sendMail = $sendMail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to(env('STATE_EMAIL'))->send(new SendEmail($this->sendMail));
    }

    /**
     * Define the delay periods between retries.
     *
     * @return array
     */
    public function backoff(): array
    {
        return [60, 120, 180];
    }

    public function failed(Exception $exception): void
    {
        Mail::to($this->sendMail->email)->send(new SendEmailFailed($this->sendMail));

        Log::error('Failed to send email ' . $this->sendMail->id . ': ' . $exception->getMessage());
    }
}
