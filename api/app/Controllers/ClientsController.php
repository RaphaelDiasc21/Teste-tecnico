<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\ClientRequest;
use App\Services\ClientService;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClientService $clientService)
    {
        $clients = $clientService->getClients();

        return response()->json(["clients"=>$clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request, ClientService $clientService)
    {
        $result = $clientService->storeClient($request);
        return response()->json($result[0],$result[1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ClientService $clientService)
    {
        $result = $clientService->getClient($id);

        return response()->json($result[0],$result[1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ClientService $clientService, $id)
    {
        $client = $clientService->updateClient($request,$id);
        return response()->json(["cliente"=>$client],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ClientService $clientService)
    {
        $result = $clientService->deleteClient($id);
        return response()->json($result[0],$result[1]);
    }

    public function deletePlanVincle($userId,$planId, ClientService $clientService)
    {
        $result = $clientService->deletePlanVincle($userId,$planId);
        return response()->json($result[0],$result[1]);
    }

    public function addPlan($userId,$planId, ClientService $clientService)
    {
        $result = $clientService->addPlan($userId,$planId);
        return response()->json(["Menssagem"=> $result]);
    }
}
