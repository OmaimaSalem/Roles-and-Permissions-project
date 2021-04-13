<?php

namespace App\Observers;

use App\Notifications\DataCreateEmailNotification;
use App\Ticket;
use Illuminate\Support\Facades\Notification;

class TicketActionObserver
{
    public function created(Ticket $model)
    {
        $data  = ['action' => 'New ticket has been created!', 'model_name' => 'Ticket', 'ticket' => $model];
        $users = \App\User::get();
        Notification::send($users, new DataCreateEmailNotification($data));
    }

  
   

    
}