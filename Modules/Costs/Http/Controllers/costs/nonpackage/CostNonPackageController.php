<?php

namespace Modules\Costs\Http\Controllers\costs\nonpackage;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Costs\Models\CostNonPackage;

class CostNonPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('costs::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('costs::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('costs::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('costs::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Crée une chaine aléatoire de longueur 20 par défaut
     * selectionne la longueur maximum par apport aux nombre de caractères
     * créé une chaine aléatoire parmis les caractéres de la longueur saisi en paramétre
     * 20 par défaut
     * @param int $longueur = 20 longueur en entier du mot aléatoire, 20 par defaut
     * @return string $chaineAleatoire la chaine de caractére aléatoire
     */
    private function generateJustificateName($longueur = 20)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++)
        {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }

        if(CostNonPackage::where('justificate_name', '=', $chaineAleatoire))
        {
            generateJustificateName();
        }else
        {
            return $chaineAleatoire;
        }
    }
}
