<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Services\AzukePlaceService;

class AzukePlaceController extends Controller
{
    private $azukePlaceService;

    public function __construct(
        AzukePlaceService $azukePlaceService
    ) {
        $this->azukePlaceService = $azukePlaceService;
    }

    /*public function getAllPetAzukePlaces()
    {
        try {

            $places = $this->azukePlaceService->getAllPlaces();

            dump($places);

            //return response()->json([
            //    'result' => true,
            //    'places' => $places
            //]);
            foreach($places as $key => $place){
                return view('pet-azuke-places', ['petAzukePlaces' => $place]);
            }
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching reservation places'], 500);
        }
    }*/
    
    
    public function getAllPetAzukePlaces()
    {
        try {
            $places = $this->azukePlaceService->getAllPlaces();
            return view('petAzukePlaces', ['petAzukePlaces' => $places]);
            //return $places;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching reservation places'], 500);
        }
    }

    public function getPetAzukePlace($place_id)
    {
        // Search for the place using the provided place_id
        $place = $this->azukePlaceService->getPlaceById($place_id);
        $holidays = $this->azukePlaceService->getPlaceholidaysById($place_id);
        //dump($holidays);


        //return response()->json([
        //    'result' => true,
        //    'place' => $place
        //]);
        //return view('petAzukedetail', ['place' => $place, 'holidays' => $holidays]);
        return $place;


        if (!$place) {
            return response()->json(['message' => 'Place not found'], 404);
        }

        //return response()->json($place);
    }
}
