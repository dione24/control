<?php

namespace Library\Models;



class AdministrerManagerPDO extends \Library\Models\AdministrerManager
{
    public function getMois()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblmois");
        $requete->execute();
        $lesMois = $requete->fetchAll();
        return $lesMois;
    }
    public function getEntreprise()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblentreprise INNER JOIN tblpole ON tblentreprise.RefPole = tblpole.RefPole");
        $requete->execute();
        $lesEntreprises = $requete->fetchAll();
        return $lesEntreprises;
    }
    public function getPoles()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblpole");
        $requete->execute();
        $lespoles = $requete->fetchAll();
        return $lespoles;
    }

    public function addPole()
    {
        $requete = $this->dao->prepare("INSERT INTO tblpole(nomPole) VALUES (:nomPole)");
        $requete->bindValue(':nomPole', $_POST['nomPole'], \PDO::PARAM_STR);
        $requete->execute();
    }

    public function addEntreprise()
    {
        $requete = $this->dao->prepare("INSERT INTO tblentreprise(nomEntreprise, RefPole) VALUES (:nomEntreprise, :RefPole)");
        $requete->bindValue(':nomEntreprise', $_POST['nomEntreprise'], \PDO::PARAM_STR);
        $requete->bindValue(':RefPole', $_POST['RefPole'], \PDO::PARAM_STR);
        $requete->execute();
    }

    public function getTypeRapport()
    {
        $requete = $this->dao->prepare("SELECT * FROM tbltyperapport");
        $requete->execute();
        $lesTypesRapport = $requete->fetchAll();
        return $lesTypesRapport;
    }
    public function addTypeRapport()
    {
        $requete = $this->dao->prepare("INSERT INTO tbltyperapport(nomRapport) VALUES (:nomRapport)");
        $requete->bindValue(':nomRapport', $_POST['nomRapport'], \PDO::PARAM_STR);
        $requete->execute();
    }
    public function addElement()
    {
        $requete = $this->dao->prepare("INSERT INTO tblrapportelements(nomElement, RefTypeRapport) VALUES (:nomElement, :RefTypeRapport)");
        $requete->bindValue(':nomElement', $_POST['nomElement'], \PDO::PARAM_STR);
        $requete->bindValue(':RefTypeRapport', $_POST['RefTypeRapport'], \PDO::PARAM_STR);
        $requete->execute();
    }

    public function getElements($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tblrapportelements INNER JOIN tbltyperapport ON tblrapportelements.RefTypeRapport = tbltyperapport.RefTypeRapport WHERE tblrapportelements.RefTypeRapport = :id");
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
        $lesElements = $requete->fetchAll();
        return $lesElements;
    }
}