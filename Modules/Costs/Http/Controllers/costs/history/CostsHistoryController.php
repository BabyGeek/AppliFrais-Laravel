<?php

namespace Modules\Costs\Http\Controllers\costs\history;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CostsHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($user_id)
    {
        try{
            $user = User::findOrFail($user_id);
            return view('costs::history.index', compact('user'));
        }catch(ModelNotFoundException $exception){
            redirect()->route('user');
        }
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
}
