<?php

namespace App\Dao;

use App\Model\Customer;

class CustomerDao extends BaseDao
{

    public function findcustomer()
    {
        $req = $this->bd->query('SELECT * FROM customers');
        $customers = [];
        while ($donnees = $req->fetch()) {
            $customer = new Customer();
            $customer->setId($donnees['id']);
            $customer->setPrenom($donnees['prenom']);
            $customer->setNom($donnees['nom']);
            $customer->setEmail($donnees['email']);
            $customers[] = $customer;
        }
        return $customers;
    }

    public function createcustomer($prenom, $nom, $email, $budget, $niveau, $saison)
    {
        $statement = $this->bd->prepare("INSERT INTO customers(prenom, nom, email, budget, niveau, saison) VALUES(:prenom, :nom, :email, :budget, :niveau, :saison)");
        $statement->bindParam(':prenom', $prenom);
        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':budget', $budget);
        $statement->bindParam(':niveau', $niveau);
        $statement->bindParam(':saison', $saison);
        $statement->execute();
    }

    public function delete($id)
        {
            $statement = $this->bd->prepare("DELETE FROM customers WHERE id=:id");
            $statement->bindParam(':id', $id);
            $statement->execute();
        }
}
