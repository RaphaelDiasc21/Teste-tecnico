<?php

    namespace App\Services;

    use App\Plan;

    class PlanService
    {
        public function getPlan($id)
        {
            return Plan::find($id); 
        }

        public function getPlans()
        {
            return Plan::all();
        }
    }