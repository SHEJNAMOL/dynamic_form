<?php

namespace App\Jobs;

use App\Models\Form;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class FormCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $form;

    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function handle()
    {
        Mail::raw('A new form has been created: ' . $this->form->name, function ($message) {
            $message->to('admin@example.com')
                    ->subject('Form Created');
        });
    }
}

