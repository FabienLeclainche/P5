<?php

namespace App\Dao;

use App\Model\Spot;
use PDO;

class SpotDao extends BaseDao
{

    public function findSpotsByBudget($budgetId)
    {
        $req = $this->bd->prepare('SELECT *
FROM spots 
INNER JOIN spots_budgets ON id = spots_id
WHERE spots_budgets.budgets_id = :budget');
        $spots = [];
        $req->execute(['budget' => $budgetId]);
        while($donnees = $req->fetch()) {
            $spot = new Spot();
            $spot->setId($donnees['id']);
            $spot->setLocalisation($donnees['localisation']);
            $spot->setLatitude($donnees['latitude']);
            $spot->setLongitude($donnees['longitude']);
            $spots[] = $spot;
        }
        return $spots;
    }

    public function findSpotsByNiveau($niveauId)
    {
        $req = $this->bd->prepare('SELECT *
FROM spots 
INNER JOIN spots_niveaux ON id = spots_id
WHERE spots_niveaux.niveaux_id = :niveau');
        $spots = [];
        $req->execute(['niveau' => $niveauId]);
        while($donnees = $req->fetch()) {
            $spot = new Spot();
            $spot->setId($donnees['id']);
            $spot->setLocalisation($donnees['localisation']);
            $spot->setLatitude($donnees['latitude']);
            $spot->setLongitude($donnees['longitude']);
            $spots[] = $spot;
        }
        return $spots;
    }

    public function findSpotsBySaison($saisonId)
    {
        $req = $this->bd->prepare('SELECT *
FROM spots 
INNER JOIN spots_saisons ON id = spots_id
WHERE spots_saisons.saisons_id = :saison');
        $spots = [];
        $req->execute(['saison' => $saisonId]);
        while($donnees = $req->fetch()) {
            $spot = new Spot();
            $spot->setId($donnees['id']);
            $spot->setLocalisation($donnees['localisation']);
            $spot->setLatitude($donnees['latitude']);
            $spot->setLongitude($donnees['longitude']);
            $spots[] = $spot;
        }
        return $spots;
    }
}
