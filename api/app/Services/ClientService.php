<?php

 namespace App\Services;
 use App\Interfaces\ClientServiceInterface;
 use App\Client;
 use App\Services\PlanService;
use Exception;

class ClientService implements ClientServiceInterface
 {

     public function storeClient($request)
     {
        $client = $request->validated();
    
        $planId = $request->only('plan_id');

        if(!empty($planId)){
            $planService = new PlanService();
            $plan = $planService->getPlan($planId);

            if(count($plan) != 0){
                $clientInfo = $request->only('nome','email','telefone','estado','cidade','data_de_nascimento');

                $client = Client::create($clientInfo);

                $client->plans()->attach($plan);

                return array(["client" => $client],201);
            }else{
                return array(["Menssagem"=> "Plano não encontrado !"],404);
            }
        }else{
            return array(["Menssagem"=>"Plano deve ser um identificador válido !"],404);
        }
     }

     public function deletePlanVincle($userId,$planId)
     {
        $client = Client::find($userId);
        
        if($client->plans()->where("plans.id",$planId)->first() != null){
        $planService = new PlanService();
        $plan = $planService->getPlan($planId);

        $client->plans()->detach($plan);
        return array(["Menssagem"=>"Plano desvinculado do cliente"],200);

        }else{
            return array(["Menssagem"=>"Determinado cliente não possuí o plano !"],404);
        }
     }

     public function deleteClient($id)
     {
        $client = Client::find($id);
        if($client !== null){
            if(($client->plans()->where("nome","Free")->first() != null) && ($client->estado === "São Paulo"))
            {
                return array(
                ["Menssagem"=>"Clientes de São Paulo que assinam o plano free não podem ser deletados !"],
                404);
            }else
            {
                $client->delete();
                return array(["Menssagem"=>"Cliente deletado"],202);
            }
        }else{
            return array(["Menssagem"=>"Cliente não existe ou já foi removido !"],404);
        }

     }

     public function getClients()
     {
        $clients = Client::all();

        foreach($clients as $key => $client)
        {
            $plans = $client->plans()->get();
            $clients[$key]["planos"] = $plans;
        }

        return $clients;
     }

     public function getClient($id)
     {
         $client = Client::find($id);

         if($client !== null){
             return array(["cliente" => $client],200);
         }else{
             return array(["Menssagem"=>"Cliente não encontrado"],404);
         }
     }
     public function updateClient($clientInfo,$id)
     {
        $client = Client::find($id);
        $client->nome = $clientInfo->nome;
        $client->email = $clientInfo->email;
        $client->telefone = $clientInfo->telefone;
        $client->estado = $clientInfo->estado;
        $client->cidade = $clientInfo->cidade;
        $client->data_de_nascimento = $clientInfo->data_de_nascimento;

        $client->save();

        return $client;
     }

     public function addPlan($userId,$planId)
     {
        $client = Client::find($userId);
        
        $planService = new PlanService();
        $plan = $planService->getPlan($planId);

        return $client->plans()->attach($plan);
     }
 }