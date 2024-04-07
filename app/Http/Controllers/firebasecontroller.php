<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class firebasecontroller extends Controller
{
    public function someMethod(Request $request)
    {
        $firebaseService = new FirebaseService();
        $isAppEnabled = $firebaseService->isAppEnabled();

        if ($isAppEnabled) {
            // Proceed with normal execution.
            return 'App is enabled.';
        } else {
            // Handle disabled app.
            return 'App is disabled.';
        }
    }
}
