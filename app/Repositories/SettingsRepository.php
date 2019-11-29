<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Repositories\Interfaces\SettingsRepositoryInterface;

class SettingsRepository implements SettingsRepositoryInterface
{
    public function all()
    {
        return Setting::all()->pluck('value', 'key');
    }
}