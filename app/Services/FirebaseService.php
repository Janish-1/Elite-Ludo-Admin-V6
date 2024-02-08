<?php

// app/Services/FirebaseService.php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Support\Facades\Log;

class FirebaseService
{
    public function isAppEnabled()
    {
        $serviceAccount = ServiceAccount::fromServiceAccountFile('./weighty-replica-380415-firebase-adminsdk-5qps5-af7e2500f6.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        $database = $firebase->getDatabase();

        // Assuming you have a 'app_enabled' node in your Firebase database.
        $reference = $database->getReference('/website2');
        $snapshot = $reference->getSnapshot();

        // Debugging statements
        dd($snapshot->exists(), $snapshot->getValue());

        // Log the existence and value of the snapshot
        Log::info('Snapshot exists: ' . ($snapshot->exists() ? 'true' : 'false'));
        Log::info('Snapshot value: ' . $snapshot->getValue());

        // Check if the 'app_enabled' value is set to false.
        return $snapshot->exists() && $snapshot->getValue() == 'false';
    }
}