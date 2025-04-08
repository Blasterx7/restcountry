<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CountryController extends Controller
{
    public function index()
    {
        // use php curl to get the list of countries
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://restcountries.com/v3.1/all",
            // CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 100,
            CURLOPT_POSTREDIR => 3,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);


        return Inertia::render('Countries/Index', [
            'countries' => json_decode($response),
            'countriesCount' => count(json_decode($response)),
            'err' => $err,
        ]);
    }

    public function show($name)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://restcountries.com/v3.1/name/$name",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        // dd(json_decode($response));

        // Check if the response is empty or not

        return Inertia::render('Countries/Show', [
            'country' => json_decode($response[0]),
            'err' => $err,
        ]);
    }
}
