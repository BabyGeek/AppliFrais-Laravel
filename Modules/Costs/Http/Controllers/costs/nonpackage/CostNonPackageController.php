<?php

namespace Modules\Costs\Http\Controllers\costs\nonpackage;

use Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Costs\Models\CostNonPackage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Costs\Http\Requests\Costs\nonpackage\CostNonPackageRequest;
use Modules\Justificates\Models\Justificate;
use Modules\Costs\Http\Requests\Costs\nonpackage\CostNonPackageDeleteRequest;
use Coderello\Laraflash\Facades\Laraflash;

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
            laraflash()->message()->content('Utilisateur id : '.$user_id. ' non trouvé')->title('Erreur de connexion à la base de donnée')->type('warning');
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
            laraflash()->message()->content('Utilisateur id : '.$user_id. ' non trouvé')->title('Erreur de connexion à la base de donnée')->type('warning');
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

            if ($request->file('justificate') !== null && $request->file('justificate')->isValid() && $nonpackage)
            {
                try
                {
                    $justificate = new Justificate();
                    $justificate->name = $request->justificate->getClientOriginalName();
                    $justificate->path = $request->justificate->store('justificates/'.$user->id);
                    $justificate->mime_type = $request->justificate->getClientMimeType();

                    $justificate->justificable()->associate(CostNonPackage::all()->last());
                    $justificate->save();

                    Storage::files('/public/justificates/'.$user->id);



                }catch(ModelNotFoundException $exception)
                {
                    laraflash()->message()->content('Utilisateur id : '.$user_id. ' non trouvé')->title('Erreur de connexion à la base de donnée')->type('warning');
                }
            }

            if ($nonpackage)
            {
                laraflash()->message()->content('Frais hors forfait entrée avec succès')->title('Frais enregistré')->type('success');
            }else
            {
                laraflash()->message()->content('Erreur lors de l\'entrée du frais hors forfait')->title('Frais non enregistré')->type('danger');
            }

        }catch(ModelNotFoundException $exception)
        {
            laraflash()->message()->content('Erreur de connexion à la base de donnée')->title('Problèmede connexion')->type('warning');
        }
        return redirect()->route('module-costs.nonpackage.index', ['user_id' => $user->id]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($user_id, $id)
    {
        try
        {
            $user = User::findOrFail($user_id);
            $nonpackage = CostNonPackage::findOrFail($id);
            return view('costs::costs.nonpackage.show', compact('user', 'nonpackage'));
        } catch (ModelNotFoundException $exception)
        {
            laraflash()->message()->content('Utilisateur id : '.$user_id. ' non trouvé')->title('Erreur de connexion à la base de donnée')->type('warning');
            return redirect()->route('dashboard', ['user_id' => $user->id]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($user_id, $id)
    {
        try
        {
            $user = User::findOrFail($user_id);
            $nonpackage = CostNonPackage::findOrFail($id);
            return view('costs::costs.nonpackage.edit', compact('user', 'nonpackage'));
        } catch (ModelNotFoundException $exception)
        {
            laraflash()->message()->content('Utilisateur id : '.$user_id. ' non trouvé')->title('Erreur de connexion à la base de donnée')->type('warning');
            return redirect()->route('dashboard', ['user_id' => $user->id]);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update($user_id, $id, CostNonPackageRequest $request)
    {
        try
        {
            $user = User::findOrFail($user_id);
            $nonpackage = CostNonPackage::findOrFail($id);
            $nonpackage->label = $request->input('label');
            $nonpackage->date = $request->input('date');
            $nonpackage->value = $request->input('value');
            $nonpackage->save();

            if ($request->file('justificate') !== null && $request->file('justificate')->isValid() && $nonpackage)
            {
                try
                {
                    $justificate = new Justificate();
                    $justificate->name = $request->justificate->getClientOriginalName();
                    $justificate->path = $request->justificate->store('justificates/'.$user->id);
                    $justificate->mime_type = $request->justificate->getClientMimeType();

                    $justificate->justificable()->associate(CostNonPackage::all()->last());
                    $justificate->save();

                    Storage::files('/public/justificates/'.$user->id);

                }catch(ModelNotFoundException $exception)
                {
                    laraflash()->content("Erreur de connexion à la base de donnée")->title('Forfait hors forfait introuvable')->type('warning');
                }
            }

            if ($nonpackage)
            {
                laraflash()->content('Frais hors forfait mit à jour avec succès')->title('Forfait hors forfait ajouté')->type('success');
            }else
            {
                laraflash()->content("Erreur lors de la mise à jour du frais hors forfait")->title('Forfait hors forfait non ajouté')->type('danger');
            }

        }catch(ModelNotFoundException $exception)
        {
            laraflash()->content("Erreur de connexion à la base de donnée")->title('Forfait hors forfait introuvable')->type('warning');
        }
        return redirect()->route('module-costs.nonpackage.index', ['user_id' => $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($user_id, $id, CostNonPackageDeleteRequest $request)
    {
        try
        {
            $nonpackage = CostnonPackage::findOrFail($id);

            if($nonpackage->justificates())
            {
                foreach($nonpackage->justificates as $justificate)
                {
                    $justificate->delete();
                    Storage::delete($justificate->path);
                }
            }


            $nonpackage->user()->dissociate();

            if($nonpackage->delete())
            {
                laraflash()->content("Le frais hors forfait a bien été supprimé")->title('Forfait hors forfait supprimé')->type('success');
            }else
            {
                laraflash()->content("Le frais hors forfait n'a pas été supprimé")->title('Forfait hors forfait non supprimé')->type('danger');
            }
        }catch(ModelNotFoundException $exception)
        {
            laraflash()->content("Erreur de connexion à la base de donnée")->title('Forfait hors forfait introuvable')->type('warning');
        }
        return redirect()->route('module-costs.nonpackage.index', ['user_id' => $user_id]);
    }
}
