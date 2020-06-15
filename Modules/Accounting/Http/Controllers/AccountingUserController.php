<?php

namespace Modules\Accounting\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Models\User;

class AccountingUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($user_id, $profile_id)
    {
        try
        {
            $user = User::findOrFail($user_id);
            $profile = User::findOrFail($profile_id);
            return view('accounting::profile', compact('user', 'profile'));
        }catch(ModelNotFoundException $exception)
        {
            laraflash()->message()->content('Utilisateur introuvable')->title('Erreur')->type('danger');
            return redirect()->route('user');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('accounting::create');
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
        return view('accounting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('accounting::edit');
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
}
