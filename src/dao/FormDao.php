<?php

namespace App\Dao;

use App\Model\Budget;
use App\Model\Niveau;
use App\Model\Saison;

class FormDao extends BaseDao
{
    public function findbudget()
    {
        $req = $this->bd->query('SELECT * FROM budgets');
        $budgets = [];
        while ($donnees = $req->fetch()) {
            $budget = new Budget();
            $budget->setId($donnees['id']);
            $budget->setValeur($donnees['valeur']);
            $budgets[] = $budget;
        }
        return $budgets;
    }

    public function findniveau()
    {
        $req = $this->bd->query('SELECT * FROM niveaux');
        $niveaux = [];
        while ($donnees = $req->fetch()) {
            $niveau = new Niveau();
            $niveau->setId($donnees['id']);
            $niveau->setValeur($donnees['valeur']);
            $niveaux[] = $niveau;
        }
        return $niveaux;
    }

    public function findsaison()
    {
        $req = $this->bd->query('SELECT * FROM saisons');
        $saisons = [];
        while ($donnees = $req->fetch()) {
            $saison = new Saison();
            $saison->setId($donnees['id']);
            $saison->setMois($donnees['mois']);
            $saisons[] = $saison;
        }
        return $saisons;
    }
}
