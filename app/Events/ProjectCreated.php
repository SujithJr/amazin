<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
class ProjectCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $projects;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($projects)
    {
        $this->projects = $projects;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
