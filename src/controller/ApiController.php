<?php

namespace App\Controller;

use App\Dao\CustomerDao;
use App\Dao\FormDao;
use App\Dao\SpotDao;

class ApiController
{

    private $customerDao;
    private $formDao;
    private $spotDao;

    public function __construct()
    {
        $this->customerDao = new CustomerDao();
        $this->formDao = new FormDao();
        $this->spotDao = new SpotDao();
    }

    public function getDestinations($budgetId, $niveauId, $saisonId)
    {
        $spotsByBudget = $this->spotDao->findSpotsByBudget($budgetId);
        $spotsByBudgetIds = $this->extractIds($spotsByBudget);
        $spotsByNiveau = $this->spotDao->findSpotsByNiveau($niveauId);
        $spotsByNiveauIds = $this->extractIds($spotsByNiveau);
        $spotsBySaison = $this->spotDao->findSpotsBySaison($saisonId);
        $spotsBySaisonIds = $this->extractIds($spotsBySaison);
        $allSpots = array_merge($spotsByBudget, $spotsByNiveau, $spotsBySaison);
        $matchingSpots = [];

        /* Get the largest spots array to iterate over it */
        $largestArray = count($spotsByBudgetIds);
        if (count($spotsByNiveauIds) > $largestArray) {
            $largestArray = $spotsByNiveauIds;
        }
        if (count($spotsBySaisonIds) > $largestArray) {
            $largestArray = $spotsBySaisonIds;
        }

        foreach ($largestArray as $item) {
            /* Check that each item exists in the three spots */
            $matchingByBudget = array_search($item, $spotsByBudgetIds);
            $matchingByNiveau = array_search($item, $spotsByNiveauIds);
            $matchingBySaison = array_search($item, $spotsBySaisonIds);

            if ($matchingByBudget != false && $matchingByNiveau != false && $matchingBySaison != false) {
                $matchingSpots[] = $this->findById($allSpots, $item);
            }
        }

        return $matchingSpots;

        
    }

    public function createCustomer($prenom, $nom, $email, $budget, $niveau, $saison)
    {
        $this->customerDao->createcustomer($prenom, $nom, $email, $budget, $niveau, $saison);
    }

    public function deleteCustomer($id)
    {
        $this->customerDao->delete($id);
    }

    private function extractIds($arr)
    {
        $ids = [];
        foreach ($arr as $item) {
            $ids[] = $item->getId();
        }
        return $ids;
    }

    private function findById($arr, $id)
    {
        foreach ($arr as $item){
            if($item->getId() == $id){
                return $item;
            }
        }
    }

}
