<?php

    namespace App\Interfaces;
    
    interface ClientServiceInterface
    {
        public function storeClient($request);
        public function deleteClient($id);
        public function getClients();
        public function getClient($id);
        public function updateClient($client,$id);
    }