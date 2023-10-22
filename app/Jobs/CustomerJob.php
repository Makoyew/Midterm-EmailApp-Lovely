<?php

namespace App\Jobs;

use App\Mail\SendMailable;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Mail::send('auth.verification-mail', ['user' => $user], function($mail) use($user) {
        //     $mail->to($user->email);
        //     $mail->subject('Account Verification');
        //     new SendMailable();
        // });

        // Mail::send('auth.verification-mail', ['user' => $user], function($mail) use($user) {
        //     $mail->to($user->email);
        //     // $mail->subject('Account Verification');
        //     new SendMailable();
        // });

        Mail::to($this->user->email)->send(new SendMailable($this->user));
    }
}
