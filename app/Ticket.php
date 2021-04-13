<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
   /**
     * Get the user that owns the ticket.
     */
    protected $table = 'tickets';
    
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }

    public static function boot()
    {
        parent::boot();

        Ticket::observe(new \App\Observers\TicketActionObserver);
    }

}
