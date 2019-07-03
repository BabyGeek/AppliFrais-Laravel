<?php

namespace Modules\Costs\Http\Controllers\costs\nonpackage;

use LaraFlash;
use Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Costs\Models\CostNonPackage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Costs\Http\Requests\Costs\nonpackage\CostNonPackageRequest;
use Modules\Justificates\Models\Justificate;

class CostNonPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($user_id)
    {
        try
        {
            $user = User::findOrFail($user_id);
            return view('costs::costs.nonpackage.index', compact('user'));

        } catch (ModelNotFoundException $exception) {
            LaraFlash::add('Utilisateur id : '.$user_id. ' non trouvé', array('type' => 'warning'));
            return redirect()->route('dashboard', ['user_id' => $user->id]);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($user_id)
    {
        try
        {
            $user = User::findOrFail($user_id);
            return view('costs::costs.nonpackage.create', compact('user'));
        } catch (ModelNotFoundException $exception)
        {
            LaraFlash::add('Utilisateur id : '.$user_id. ' non trouvé', array('type' => 'warning'));
            return redirect()->route('dashboard', ['user_id' => $user->id]);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store($user_id, CostNonPackageRequest $request)
    {
        try
        {
            $user = User::findOrFail($user_id);
            $nonpackage = new CostNonPackage();
            $nonpackage->label = $request->input('label');
            $nonpackage->date = $request->input('date');
            $nonpackage->value = $request->input('value');

            $nonpackage->user()
            ->associate($user);

            $nonpackage->save();

            if ($request->file('justificate')->isValid()) {

                $justificate = new Justificate();
                $justificate->name = $request->justificate->getClientOriginalName();
                $justificate->path = $request->justificate->store('justificates/'.$user->id);
                $justificate->mime_type = $request->justificate->getClientMimeType();

                $nonpackage->justificable()->associate(CostNonPackage::all()->last());

                $request->justificate->store('justificates/'.$user->id);
            }

            if ($nonpackage)
            {
                LaraFlash::add('Frais hors forfait entrée avec succès', array('type' => 'success'));
            }else
            {
                LaraFlash::add("Erreur lors de l'entrée du frais hors forfait", array('type' => 'danger'));
            }

        }catch(ModelNotFoundException $exception)
        {
            LaraFlash::add("Erreur de connexion à la base de donnée", array('type' => 'warning'));
        }
        return redirect()->route('module-costs.nonpackage.index', ['user_id' => $user->id]);
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
