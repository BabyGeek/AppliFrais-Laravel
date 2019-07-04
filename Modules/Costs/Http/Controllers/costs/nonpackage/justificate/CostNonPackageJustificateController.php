<?php

namespace Modules\Costs\Http\Controllers\costs\nonpackage\justificate;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use LaraFlash;
use Modules\Justificates\Models\Justificate;
use Modules\Costs\Http\Requests\Costs\nonpackage\justificate\CostNonPackageJustificateDeleteRequest;
use Modules\Costs\Http\Requests\Costs\nonpackage\justificate\CostNonPackageJustificateRequest;
use Modules\Costs\Models\CostNonPackage;
use Models\User;

class CostNonPackageJustificateController extends Controller
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
    public function create($user_id, $nonpackage_id)
    {
        try
        {
            $nonpackage = CostNonPackage::findOrFail($nonpackage_id);
            $user = $nonpackage->user;
            return view('costs::costs.nonpackage.justificate.create', compact('user', 'nonpackage'));
        } catch (ModelNotFoundException $exception)
        {
            LaraFlash::add('Forfait id : '.$nonpackage_id. ' non trouvé', array('type' => 'warning'));
            return redirect()->route('costs.nonpackage.index', ['user_id' => $user_id, 'id' => $nonpackage_id]);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store($user_id, $nonpackage_id, CostNonPackageJustificateRequest $request)
    {
        try
        {
            $user = User::findOrFail($user_id);
            $nonpackage=CostNonPackage::findOrFail($nonpackage_id);

            $justificate = new Justificate();
            $justificate->name = $request->justificate->getClientOriginalName();
            $justificate->path = $request->justificate->store('justificates/'.$user->id);
            $justificate->mime_type = $request->justificate->getClientMimeType();

            $justificate->justificable()->associate($nonpackage);

            Storage::files('/public/justificates/'.$user->id);

            if ($justificate->save())
            {
                LaraFlash::add('Justificatif ajouté avec succès', array('type' => 'success'));
            }else
            {
                LaraFlash::add("Erreur lors de l'ajout du justificatif", array('type' => 'danger'));
            }

        }catch(ModelNotFoundException $exception)
        {
            LaraFlash::add("Erreur de connexion à la base de donnée", array('type' => 'warning'));
        }
        return redirect()->route('module-costs.nonpackage.show', ['user_id' => $user->id, 'nonpackage_id' => $nonpackage->id]);
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
    public function destroy($user_id, $nonpackage_id, $id, CostNonPackageJustificateDeleteRequest $request)
    {
        try
        {
            $justificate = Justificate::findOrFail($id);

            $nonpackage = $justificate->justificable;


            $nonpackage->user()->dissociate();

            if($justificate->delete())
            {
            LaraFlash::add("Le justificatif a bien été supprimé", array('type' => 'success'));
            }else
            {
                LaraFlash::add("Le justificatif n'a pas été supprimé", array('type' => 'danger'));

            }
        }catch(ModelNotFoundException $exception)
        {
            LaraFlash::add("Erreur de connexion à la base de donnée", array('type' => 'warning'));

        }
        return redirect()->route('module-costs.nonpackage.show', ['user_id' => $user_id, 'id' => $nonpackage_id]);
    }
}
