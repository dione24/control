<?php

namespace Library\Models;



class AfficherManagerPDO extends \Library\Models\AfficherManager
{
    public function ListeClient()
    {
        $requete = $this->dao->prepare(" SELECT * FROM clients");
        $requete->execute();
        $results = $requete->fetchAll();
        return $results;
    }
    public function getClient($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM clients WHERE id=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
        $results = $requete->fetch();
        return $results;
    }

    public function updateClient()
    {
        $requete = $this->dao->prepare("UPDATE clients SET nom=:nom,prenom=:prenom,telephone=:telephone,adresse=:adresse,email=:email WHERE id=:id");
        $requete->bindValue(':id', $_POST['id'], \PDO::PARAM_STR);
        $requete->bindValue(':nom', $_POST['nom'], \PDO::PARAM_STR);
        $requete->bindValue(':prenom', $_POST['prenom'], \PDO::PARAM_STR);
        $requete->bindValue(':telephone', $_POST['telephone'], \PDO::PARAM_STR);
        $requete->bindValue(':adresse', $_POST['adresse'], \PDO::PARAM_STR);
        $requete->bindValue(':email', $_POST['email'], \PDO::PARAM_STR);

        $requete->execute();
    }

    public function deleteClient($id)
    {
        $requete = $this->dao->prepare(" DELETE  FROM clients WHERE id=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
    }

    public function ListeService()
    {
        $requete = $this->dao->prepare(" SELECT * FROM services ");
        $requete->execute();
        $results = $requete->fetchAll();
        return $results;
    }

    public function getService($id)
    {
        $requete = $this->dao->prepare(" SELECT * FROM espaces WHERE id_espaces=:id_espaces");
        $requete->bindValue(':id_espaces', $id, \PDO::PARAM_INT);
        $requete->execute();
        $results = $requete->fetch();
        return $results;
    }

    public function updateService()
    {
        $requete = $this->dao->prepare("UPDATE espaces SET numero=:numero,id_type=:id_type,superficie=:superficie,position=:position,bloc=:bloc WHERE id_espaces=:id_espaces ");
        $requete->bindValue(':id_espaces', $_POST['id_espaces'], \PDO::PARAM_INT);
        $requete->bindValue(':numero', $_POST['numero'], \PDO::PARAM_INT);
        $requete->bindValue(':id_type', $_POST['id_type'], \PDO::PARAM_INT);
        $requete->bindValue(':superficie', $_POST['superficie'], \PDO::PARAM_STR);
        $requete->bindValue(':position', $_POST['position'], \PDO::PARAM_STR);
        $requete->bindValue(':bloc', $_POST['bloc'], \PDO::PARAM_STR);
        $requete->execute();
    }

    public function deleteService($id)
    {
        $requete = $this->dao->prepare(" DELETE  FROM espaces WHERE id_espaces=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
    }

    public function ListeAb()
    {
        $requete = $this->dao->prepare(" SELECT * FROM abonnements INNER JOIN clients ON abonnements.RefClient=clients.id INNER JOIN services ON abonnements.RefService=services.RefServices WHERE abonnements.statut=0");
        $requete->execute();
        $results = $requete->fetchAll();
        return $results;
    }


    public function disable($id)
    {
        $requete = $this->dao->prepare(" UPDATE abonnements SET statut=1 WHERE RefAb=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
    }
}