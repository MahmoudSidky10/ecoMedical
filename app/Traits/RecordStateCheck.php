<?php

namespace App\Traits;

trait RecordStateCheck
{
    public function recordStateCheck($record_state)
    {
        if ($record_state) {
            return 1;
        } else {
            return 0;
        }
    }
}

