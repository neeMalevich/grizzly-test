<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberCheckRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {

        return view('index');
    }

    public function store(NumberCheckRequest $request)
    {
        $data = $request->validated();

        $phoneWithoutSpaces = str_replace(['+',' ', '.', '-', '(', ')'], '', $data['phone']);
        $phoneGetTwoCharacters = substr($phoneWithoutSpaces, 0, 5);

        $phoneСountryURL = 'https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json';
        $phoneСountryJson = json_decode(file_get_contents($phoneСountryURL), true);

        foreach($phoneСountryJson as $phoneItem){
            $phoneMask = str_replace(['+','#','-', '(', ')'], '', $phoneItem['mask']);

            $phoneMaskPos = strpos($phoneGetTwoCharacters, $phoneMask);

            if ($phoneMaskPos !== false){
                $countryRegion = 'Номер:' . $data['phone'] . '  принодлижит стране - ' . $phoneItem['name_ru'];
               return back()->with('success', $countryRegion);
            }
        }

        return back()->with('error', 'Странны с такой маской нету');
    }

//    public function cookies(Request $request){
//        $value = session()->all();
//
//    }

}
