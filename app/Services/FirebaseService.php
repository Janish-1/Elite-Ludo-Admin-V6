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
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/weighty-replica-380415-firebase-adminsdk-5qps5-af7e2500f6.json')
            ->withDatabaseUri('https://weighty-replica-380415-default-rtdb.firebaseio.com');

        $database = $factory->createDatabase();
        $reference = $database->getReference('/website2');
        $snapshot = $reference->getSnapshot();

        // Check if the reference exists and has a value
        if ($snapshot->exists()) {
            // Decode the JSON value
            $decodedValue = json_decode($snapshot->getValue(), true);

            // Check if the decoded value is an array
            if (is_array($decodedValue)) {
                // Check if the array has at least two elements
                if (count($decodedValue) >= 2) {
                    // Get the second element (index 1) from the array
                    $secondValue = $decodedValue[1];

                    // Return the second value
                    return $secondValue;
                } else {
                    // Handle the case where the array doesn't have at least two elements
                    return false;
                }
            } else {
                // Handle the case where the value is not an array
                return false;
            }
        } else {
            // Handle the case where the reference doesn't exist
            return false;
        }
    }
}
