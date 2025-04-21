<?php

use Illuminate\Support\Facades\Route;
use Minulhasanrokan\CustomerSocialFinder\Http\Controllers\SocialProfileController;

Route::match(['get', 'post'], 'social-profile', [SocialProfileController::class, 'index']);
