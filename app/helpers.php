<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('currentInstitutionId')) {
    function currentInstitutionId()
    {
        return Auth::check() ? Auth::user()->institution_id : null;
    }
}
