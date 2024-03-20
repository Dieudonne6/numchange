<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumController extends Controller
{
    public function index () {
        return view ('accueil');
    }


//     public function convertNumber(Request $request)
// {
//     // Validation du formulaire - assurez-vous de configurer vos règles de validation

//     $oldNumber = $request->input('old_number');

//     // Utiliser une expression régulière pour extraire les deux premiers chiffres
//     preg_match('/^\d{2}/', $oldNumber, $matches);
//     $firstTwoDigits = $matches[0];

//     // Votre logique de conversion ici...

//     // Sauvegarder les résultats dans la base de données ou effectuer d'autres actions nécessaires
//     Conversion::create([
//         'old_number' => $oldNumber,
//         'new_number' => $newNumber, // Remplacez cela par votre nouvelle valeur de numéro
//     ]);

//     // Rediriger avec un message de succès
//     return redirect()->route('conversion.form')->with('success', 'Conversion réussie !');
// }

public function convertnum(Request $request) {
    $num = $request->input('number');

    preg_match('/^\d{2}/', $num, $matches);
        $prefix = $matches[0];

    // dd($prefix);

    if (($prefix == 97) || ($prefix == 96) || ($prefix == 66) || ($prefix == 42) || ($prefix == 46) || ($prefix == 50) || ($prefix == 51) || ($prefix == 52) || ($prefix == 53) || ($prefix == 54) || ($prefix == 56) || ($prefix == 57) || ($prefix == 59) || ($prefix == 61) || ($prefix == 62) || ($prefix == 67) || ($prefix == 69) || ($prefix == 90) || ($prefix == 91))  {

        // Session::put('client', $client);
        // print('Votre nouveau numero est : +229 01'.''.$num);
        return back()->with("status", 'Le nouveau numero est : +229 01'.''.$num);

    }
    elseif (($prefix == 55) || ($prefix == 58) || ($prefix == 60) || ($prefix == 63) || ($prefix == 64) || ($prefix == 65) || ($prefix == 68) || ($prefix == 94) || ($prefix == 95) || ($prefix == 98) || ($prefix == 99)) {

        return back()->with("status", 'Le nouveau numero est : +229 02'.''.$num);

    }
    elseif (($prefix == 40) || ($prefix == 41)) {

        return back()->with("status", 'Le nouveau numero est : +229 03'.''.$num);

    }
    else {

        return back()->with("danger", 'Veuillez entrer un numero valide .');

    }

    
}
}
