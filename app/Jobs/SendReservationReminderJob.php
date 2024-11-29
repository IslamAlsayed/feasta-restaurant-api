<?php

namespace App\Jobs;

use App\Mail\ReservationFailed;
use App\Mail\ReservationReminder;
use App\Models\Reservation;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendReservationReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->reservation->email)->send(new ReservationReminder($this->reservation));
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
        Mail::to($this->reservation->email)->send(new ReservationFailed($this->reservation));

        Log::error('Failed to send reservation reminder for reservation ID ' . $this->reservation->id . ': ' . $exception->getMessage());
    }
}
