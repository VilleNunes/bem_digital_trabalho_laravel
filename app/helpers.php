<?php

use App\Models\Institution;
use Illuminate\Support\Facades\Auth;

if (!function_exists('currentInstitutionId')) {
    function currentInstitutionId()
    {
        return Auth::check() ? Auth::user()->institution_id : null;
    }
}

if (!function_exists('institutions')) {
    function institutions()
    {
        return Institution::all();
    }
}
