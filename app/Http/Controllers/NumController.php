<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use League\Csv\Writer;


class NumController extends Controller
{

    public function index () {
        return view ('accueil');
    }



 public function convertContacts(Request $request)
    {
        // Validation des fichiers acceptés (CSV, XLSX, VCF)
        // $request->validate([
        //     'contacts_file' => 'required|mimes:csv,xlsx,vcf,text/vcard|max:5048',
        // ]);

    
        
        $file = $request->file('contacts_file');
        $extension = $file->getClientOriginalExtension();
        
        \Log::info('Extension détectée : ' . $extension);
        // Lire le contenu du fichier
        $content = file_get_contents($file->getRealPath());

            // Log pour voir l'extension détectée
        
        // dd($extension);
        // Si le fichier est un VCF, traiter les numéros
        if ($extension === 'vcf') {
            $updatedContent = $this->processVcfContent($content);

            // Sauvegarder le fichier mis à jour
            $updatedFileName = 'updated_contacts.vcf';
            Storage::put($updatedFileName, $updatedContent);

            // Télécharger le fichier mis à jour
            return response()->download(storage_path("app/{$updatedFileName}"));
        } else {
            return back()->with('danger', 'Format de fichier non pris en charge.');
        }
    }

    private function processVcfContent($content)
    {
        $lines = explode("\n", $content);
        $updatedLines = [];
    
        foreach ($lines as $line) {
            // Identifier les lignes contenant les numéros de téléphone dans TEL ou CELL
            if (strpos($line, 'TEL') !== false || strpos($line, 'CELL') !== false) {
                // Extraire le numéro et vérifier s'il est sous le format 416-353-75 ou similaire
                preg_match('/(\+?\d{1,4}[-\s]?\d{1,4}[-\s]?\d{1,4}[-\s]?\d{0,4})/', $line, $matches);  // Match les numéros avec ou sans +, avec des tirets ou espaces
                if (isset($matches[1])) {
                    $oldNumber = $matches[1];
                    
                    // Si le numéro commence par +229, on conserve le préfixe et on ajoute '01' après le préfixe
                    if (preg_match('/^\+229/', $oldNumber)) {
                        $newNumber = preg_replace('/^\+229/', '+22901', $oldNumber);  // Ajouter '01' après le préfixe +229
                    } else {
                        // Sinon, on va ajouter '01' après le premier bloc de chiffres, en préservant les tirets
                        // Retirer tous les caractères non numériques sauf les tirets
                        $numberWithoutSpecialChars = preg_replace('/[^0-9-]/', '', $oldNumber);
                        
                        // Ajouter '01' après le premier bloc de chiffres et les réorganiser sous la forme aaa-bbb-ccc-ddd
                        // Ici, on découpe la chaîne en chiffres, insère '01' et reformate le numéro
                        $numberWithoutSpecialChars = preg_replace('/(\d+)([-\s])/', '01$1$2', $numberWithoutSpecialChars, 1);
    
                        // Réorganiser le numéro sous le format aaa-bbb-ccc-ddd
                        // On enlève les tirets et on découpe les chiffres en groupes de 3 ou 4
                        $numberWithoutSpecialChars = preg_replace('/[^0-9]/', '', $numberWithoutSpecialChars);  // Supprimer tous les tirets
                        $formattedNumber = substr($numberWithoutSpecialChars, 0, 3) . '-' . substr($numberWithoutSpecialChars, 3, 3) . '-' . substr($numberWithoutSpecialChars, 6, 3) . '-' . substr($numberWithoutSpecialChars, 9, 4);
    
                        $newNumber = $formattedNumber;
                    }
    
                    // Remplacer le numéro original par le nouveau format
                    $line = str_replace($oldNumber, $newNumber, $line);
                }
            }
            $updatedLines[] = $line;
        }
    
        return implode("\n", $updatedLines);
    }
    
    
    
    
    
}


