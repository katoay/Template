<?php

namespace App\StateMachines;

use Asantibanez\LaravelEloquentStateMachines\StateMachines\StateMachine;

class BasicStateMachine extends StateMachine
{
    public function recordHistory(): bool
    {
        return true;
    }

    public function transitions(): array
    {
        return [
            'pending' => ['approved', 'declined'],
            'approved' => ['processed'],
        ];
    }

    public function defaultState(): ?string
    {
        return 'pending';
    }
}
