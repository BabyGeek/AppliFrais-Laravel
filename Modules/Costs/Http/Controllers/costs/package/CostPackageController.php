<?php

namespace Modules\Costs\Http\Controllers\costs\package;

use Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Costs\Enum\CostType;
use Modules\Costs\Enum\CostState;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Costs\Models\Costs\Cost;
use Modules\Costs\Models\CostPackage;
use Coderello\Laraflash\Facades\Laraflash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Costs\Http\Requests\Costs\package\CostPackageRequest;
use Modules\Costs\Http\Requests\Costs\package\CostPackageDeleteRequest;


class CostPackageController extends Controller
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
            return view('costs::costs.package.index', compact('user'));

        } catch (ModelNotFoundException $exception) {
            laraflash()->message()->content('Utilisateur id : '.$user_id. ' non trouvé')->title('Utilisateur introuble')->type('warning');
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
            $costs = Cost::all();
            return view('costs::costs.package.create', compact('user', 'costs'));
        } catch (ModelNotFoundException $exception)
        {
            laraflash()->message()->content('Utilisateur id : '.$user_id. ' non trouvé')->title('Utilisateur introuble')->type('warning');
            return redirect()->route('dashboard', ['user_id' => $user->id]);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store($user_id, CostPackageRequest $request)
    {
        try
        {
            $user = User::findOrFail($user_id);
            $month = Carbon::today()->format('mY');

            $package = CostPackage::updateOrCreate(
                [
                    'user_id' => Auth::user()->id,
                    'cost_id' => $request->input('cost_id'),
                    'month' => $month,
                ],
                [
                    'value' => $request->input('value'),
                    'date' => Carbon::today(),
                ]
                );

            $package->user()
                    ->associate($user);
            $package->cost()
                    ->associate(Cost::findOrFail($request->input('cost_id')));
            if ($package)
            {
                laraflash()->message()->content('Frais forfait entrée avec succès')->title('Frais entrée')->type('success');
            }else
            {
                laraflash()->message()->content("Erreur lors de l'entrée du frais forfait")->title('Frais non entrée')->type('danger');
            }
            }catch(ModelNotFoundException $exception)
            {
                laraflash()->message()->content("Erreur de connexion à la base de donnée")->title('Frais non entrée')->type('warning');
            }
            return redirect()->route('module-costs.package.index', ['user_id' => $user->id]);
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
    public function edit($user_id, $id)
    {
        try{
            $states = CostState::choices();
            $package = CostPackage::findOrFail($id);
            $user = $package->user;
            $costs = Cost::all();
            return view('costs::costs.package.edit', compact('user', 'package', 'states', 'costs'));
        }catch(ModelNotFoundException $exception){
            laraflash()->message()->content("Le frais forfait demandé est introuvable")->title('Frais introuvable')->type('warning');
            return redirect()->route('module-costs.package.index', ['user_id' => $user_id]);
        }
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
    public function destroy($user_id, $id, CostPackageDeleteRequest $request)
    {
        try
        {
            $package = CostPackage::findOrFail($id);
            $package->user()->dissociate();
            $package->cost()->dissociate();
            $package->delete();

            if($package)
            {
                laraflash()->message()->content("Le frais forfait à bien été supprimé")->title('Frais introuvable')->type('success');
            }else
            {
                laraflash()->message()->content("Le frais forfait n'a pas été supprimé")->title('Frais non supprimé')->type('danger');
            }
        }catch(ModelNotFoundException $exception)
        {
            laraflash()->message()->content("Erreur de connexion à la base de donnée")->title('Frais introuvable')->type('warning');
        }
        return redirect()->route('module-costs.package.index', ['user_id' => $user_id]);
    }
}
