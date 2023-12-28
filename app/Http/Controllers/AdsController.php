<?php

namespace App\Http\Controllers;

use Cloudinary\Configuration\Configuration;

Configuration::instance([
    'cloud' => [
        'cloud_name' => 'df6mzmw3v',
        'api_key' => '288424958781825',
        'api_secret' => 'i7h7hexaT4aHPXJjawSBfkoyHWs'
    ],
    'url' => [
        'secure' => true
    ]
]);

use Illuminate\Http\Request;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\ads;

class AdsController extends Controller
{
    public function index()
    {
        return view("ads");
    }

    public function UpdateAda(Request $request)
    {
        $request->validate([
            'ad' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('ad')) {
                $response = Cloudinary::upload($request->file('ad')->getRealPath())->getSecurePath();

                // Update the ad URL in the database
                $ad = ads::firstOrNew(['unique_index' => 1]); // Replace 'unique_index' with your unique identifier column
                $ad->url = $response; // Assuming 'url' is the column name for the ad URL
                $ad->save();

                return back()->with('success', 'File uploaded successfully!');
        }

        return back()->with('error', 'No file was uploaded.');
    }
    public function UpdateAdb(Request $request)
    {
        $request->validate([
            'ad' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('ad')) {
                $response = Cloudinary::upload($request->file('ad')->getRealPath())->getSecurePath();

                // Update the ad URL in the database with a unique index of 1
                $ad = ads::firstOrNew(['unique_index' => 2]); // Replace 'unique_index' with your unique identifier column
                $ad->url = $response; // Assuming 'url' is the column name for the ad URL
                $ad->save();

                return back()->with('success', 'File uploaded successfully!');
        }

        return back()->with('error', 'No file was uploaded.');
    }
    public function getAllAds(Request $request)
    {
        $ads = ads::all(); // Retrieve all ads from the database
        $adUrls = $ads->pluck('url'); // Extract only the URLs
        
        return response()->json(['ads' => $adUrls]);
    }
}
