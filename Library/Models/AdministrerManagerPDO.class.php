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
        if ($_SESSION['Statut'] == 'user') {
            $requete = $this->dao->prepare("SELECT * FROM tbltyperapport INNER JOIN chmodrapports ON tbltyperapport.RefTypeRapport = chmodrapports.RefTypeRapport WHERE chmodrapports.RefEntreprise=:RefEntreprise");
            $requete->bindValue(':RefEntreprise', $_SESSION['RefEntreprise'], \PDO::PARAM_INT);
            $requete->execute();
            $lesTypesRapport = $requete->fetchAll();
            return $lesTypesRapport;
        } else {
            $requete = $this->dao->prepare("SELECT * FROM tbltyperapport");
            $requete->execute();
            $lesTypesRapport = $requete->fetchAll();
            return $lesTypesRapport;
        }
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

    public function singleRapport($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tbltyperapport WHERE RefTypeRapport=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
        $lesTypesRapport = $requete->fetch();
        return $lesTypesRapport;
    }

    public function addRapport()
    {

        $query = $this->dao->prepare("INSERT INTO tblrapports(RefTypeRapport,RefEntreprise,RefMois,annee) VALUES(:RefTypeRapport,:RefEntreprise,:RefMois,:annee)");
        $query->bindValue(':RefTypeRapport', $_POST['RefTypeRapport'], \PDO::PARAM_INT);
        $query->bindValue(':RefEntreprise', $_POST['RefEntreprise'], \PDO::PARAM_INT);
        $query->bindValue(':RefMois', $_POST['RefMois'], \PDO::PARAM_INT);
        $query->bindValue(':annee', $_POST['annee'], \PDO::PARAM_INT);
        $query->execute();
        $rapportid = $this->dao->lastInsertId();

        foreach ($_POST['RefRapportElements'] as $key => $value) {
            $request = $this->dao->prepare("INSERT INTO rapportscontent(RefRapport,moisencours,moisn1,moisprecedent,previsions,RefRapportElements) VALUES (:RefRapport,:moisencours,:moisn1,:moisprecedent,:previsions,:RefRapportElements)");
            $request->bindValue(':RefRapport', $rapportid, \PDO::PARAM_INT);
            $request->bindValue(':moisencours', $_POST['moisencours'][$key], \PDO::PARAM_STR);
            $request->bindValue(':moisn1', $_POST['moisn1'][$key], \PDO::PARAM_STR);
            $request->bindValue(':moisprecedent', $_POST['moisprecedent'][$key], \PDO::PARAM_STR);
            $request->bindValue(':previsions', $_POST['previsions'][$key], \PDO::PARAM_STR);
            $request->bindValue(':RefRapportElements', $value, \PDO::PARAM_INT);
            $request->execute();
        }
    }

    public function VerifChmod($rapport, $entreprise)
    {
        $requete = $this->dao->prepare("SELECT * FROM chmodrapports WHERE RefTypeRapport=:RefTypeRapport AND RefEntreprise=:RefEntreprise");
        $requete->bindValue(':RefTypeRapport', $rapport, \PDO::PARAM_INT);
        $requete->bindValue(':RefEntreprise', $entreprise, \PDO::PARAM_INT);
        $requete->execute();
        $lesChmod = $requete->fetch();
        return $lesChmod['RefEntreprise'];
    }


    public function addChmod()
    {
        $requeteDelete = $this->dao->prepare('DELETE FROM chmodrapports WHERE RefTypeRapport=:RefTypeRapport');
        $requeteDelete->bindValue(':RefTypeRapport', $_POST['RefTypeRapport'], \PDO::PARAM_INT);
        $requeteDelete->execute();
        if (!empty($_POST['RefEntreprise'])) {
            foreach ($_POST['RefEntreprise'] as $key => $value) {
                $requeteInsert = $this->dao->prepare('INSERT INTO chmodrapports(RefTypeRapport,RefEntreprise) VALUES(:RefTypeRapport,:RefEntreprise)');
                $requeteInsert->bindValue(':RefTypeRapport', $_POST['RefTypeRapport'], \PDO::PARAM_INT);
                $requeteInsert->bindValue(':RefEntreprise', $value, \PDO::PARAM_INT);
                $requeteInsert->execute();
            }
        }
    }

    public function getEntrepriseRapport($rapport)
    {
        $requete = $this->dao->prepare("SELECT * FROM tblrapports INNER JOIN tblentreprise ON tblrapports.RefEntreprise = tblentreprise.RefEntreprise INNER JOIN tblmois ON tblmois.RefMois=tblrapports.RefMois INNER JOIN tbltyperapport ON tbltyperapport.RefTypeRapport=tblrapports.RefTypeRapport  WHERE tblrapports.RefEntreprise=:RefEntreprise AND tblrapports.RefTypeRapport=:RefTypeRapport");
        $requete->bindValue(':RefEntreprise', $_SESSION['RefEntreprise'], \PDO::PARAM_INT);
        $requete->bindValue(':RefTypeRapport', $rapport, \PDO::PARAM_INT);
        $requete->execute();
        $lesEntreprises = $requete->fetchAll();
        return $lesEntreprises;
    }


    public function getRapportName($rapport)
    {
        $requete = $this->dao->prepare("SELECT * FROM tblrapports INNER JOIN tbltyperapport ON tbltyperapport.RefTypeRapport=tblrapports.RefTypeRapport WHERE tblrapports.RefRapport=:RefRapport");
        $requete->bindValue(':RefRapport', $rapport, \PDO::PARAM_INT);
        $requete->execute();
        $lesRapports = $requete->fetch();
        return $lesRapports;
    }

    public function getValeur($element, $rapport)
    {
        $requete = $this->dao->prepare("SELECT * FROM rapportscontent WHERE RefRapportElements=:RefRapportElements AND RefRapport=:RefRapport");
        $requete->bindValue(':RefRapportElements', $element, \PDO::PARAM_INT);
        $requete->bindValue(':RefRapport', $rapport, \PDO::PARAM_INT);
        $requete->execute();
        $lesRapports = $requete->fetch();
        return $lesRapports;
    }



    public function updateRapport()
    {

        $query = $this->dao->prepare("UPDATE tblrapports SET RefTypeRapport=:RefTypeRapport,RefEntreprise=:RefEntreprise,RefMois=:RefMois,annee=:annee WHERE RefRapport=:RefRapport");
        $query->bindValue(':RefTypeRapport', $_POST['RefTypeRapport'], \PDO::PARAM_INT);
        $query->bindValue(':RefEntreprise', $_POST['RefEntreprise'], \PDO::PARAM_INT);
        $query->bindValue(':RefMois', $_POST['RefMois'], \PDO::PARAM_INT);
        $query->bindValue(':annee', $_POST['annee'], \PDO::PARAM_INT);
        $query->bindValue(':RefRapport', $_POST['RefRapport'], \PDO::PARAM_INT);
        $query->execute();

        foreach ($_POST['RefRapportElements'] as $key => $value) {
            $request = $this->dao->prepare("UPDATE rapportscontent SET moisencours=:moisencours,moisn1=:moisn1,moisprecedent=:moisprecedent,previsions=:previsions WHERE RefRapportElements=:RefRapportElements AND RefRapport=:RefRapport");
            $request->bindValue(':RefRapport', $_POST['RefRapport'], \PDO::PARAM_INT);
            $request->bindValue(':moisencours', $_POST['moisencours'][$key], \PDO::PARAM_STR);
            $request->bindValue(':moisn1', $_POST['moisn1'][$key], \PDO::PARAM_STR);
            $request->bindValue(':moisprecedent', $_POST['moisprecedent'][$key], \PDO::PARAM_STR);
            $request->bindValue(':previsions', $_POST['previsions'][$key], \PDO::PARAM_STR);
            $request->bindValue(':RefRapportElements', $value, \PDO::PARAM_INT);
            $request->execute();
        }
    }


    public function verifRapport($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tblrapports WHERE RefTypeRapport=:RefTypeRapport AND RefEntreprise=:RefEntreprise ");
        $requete->bindValue(':RefTypeRapport', $id, \PDO::PARAM_INT);
        $requete->bindValue(':RefEntreprise', $_SESSION['RefEntreprise'], \PDO::PARAM_INT);
        $requete->execute();
        $lesRapports = $requete->fetch();
        return $lesRapports;
    }

    public function deleteRapport($id)
    {
        $requete = $this->dao->prepare("DELETE FROM tblrapports WHERE RefRapport=:RefRapport");
        $requete->bindValue(':RefRapport', $id, \PDO::PARAM_INT);
        $requete->execute();
    }

    public function getFullRapport()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblrapports INNER JOIN tblentreprise ON tblrapports.RefEntreprise = tblentreprise.RefEntreprise INNER JOIN tblmois ON tblmois.RefMois=tblrapports.RefMois INNER JOIN tbltyperapport ON tbltyperapport.RefTypeRapport=tblrapports.RefTypeRapport  ");
        $requete->execute();
        $lesEntreprises = $requete->fetchAll();
        return $lesEntreprises;
    }

    public function updateStatut($statut, $rapport)
    {
        $requete = $this->dao->prepare("UPDATE tblrapports SET status=:Statut WHERE RefRapport=:RefRapport");
        $requete->bindValue(':Statut', $statut, \PDO::PARAM_STR);
        $requete->bindValue(':RefRapport', $rapport, \PDO::PARAM_INT);
        $requete->execute();
    }

    public function addReporting()
    {
        $query = $this->dao->prepare("INSERT INTO tblreporting(RefPole,RefTypeRapport,RefMois,annee,reporting,RefUsers) VALUES(:RefPole,:RefTypeRapport,:RefMois,:annee,:reporting,:RefUsers)");
        $query->bindValue(':RefPole', $_POST['RefPole'], \PDO::PARAM_INT);
        $query->bindValue(':RefTypeRapport', $_POST['RefTypeRapport'], \PDO::PARAM_INT);
        $query->bindValue(':RefMois', $_POST['RefMois'], \PDO::PARAM_INT);
        $query->bindValue(':annee', $_POST['annee'], \PDO::PARAM_INT);
        $query->bindValue(':reporting', $_POST['reporting'], \PDO::PARAM_STR);
        $query->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $query->execute();
    }
}