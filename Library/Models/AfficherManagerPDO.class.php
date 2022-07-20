<?php

namespace Library\Models;



class AfficherManagerPDO extends \Library\Models\AfficherManager
{
    public function rapports($type)
    {
        $requete = $this->dao->prepare(" SELECT * FROM tblrapports WHERE RefTypeRapport=:type");
        $requete->bindValue(':type', $type);
        $requete->execute();
        $results = $requete->fetchAll();
        return $results;
    }

    public function getKpis($mois, $annee, $pole, $entreprise)
    {
        $requete = "SELECT  dashboard.*,SUM(moisencours) AS Smoisencours,SUM(moisn1) AS Smoisn1,SUM(moisprecedent) AS Smoisprecedent,SUM(previsions) AS Sprevisions FROM dashboard";
        if (!empty($mois) or !empty($annee) or !empty($pole) or !empty($entreprise)) {
            $requete .= " WHERE";
        }
        if (!empty($annee)) {
            $requete .= " annee=$annee";
        }
        if (!empty($mois) && !empty($annee)) {
            if (!empty($annee)) {
                $requete .= " AND";
            }
            $requete .= " RefMois=$mois";
        }
        if (!empty($annee) && !empty($pole) && empty($entreprise)) {

            $requete .= " AND RefPole=$pole";
        }
        if (!empty($annee) && !empty($entreprise)) {
            $requete .= "  AND RefEntreprise=$entreprise";
        }
        $query = $this->dao->prepare($requete);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function UserCharts()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblchart INNER JOIN tblrapportelements ON tblrapportelements.RefRapportElements=tblchart.RefRapportElements WHERE RefUsers=:id");
        $requete->bindValue(':id', $_SESSION['RefUsers']);
        $requete->execute();
        $results = $requete->fetchAll();
        return $results;
    }



    public function getElementsValue($rapport)
    {
        $requete = $this->dao->prepare("SELECT * FROM dashboard WHERE RefRapport=:rapport");
        $requete->bindValue(':rapport', $rapport);
        $requete->execute();
        $results = $requete->fetchAll();
        return $results;
    }




    public function getDash($mois, $annee, $pole, $entreprise)
    {
        $requete = "SELECT  dashboard.*,SUM(moisencours) AS Smoisencours,SUM(moisn1) AS Smoisn1,SUM(moisprecedent) AS Smoisprecedent,SUM(previsions) AS Sprevisions FROM dashboard";
        if (!empty($mois) or !empty($annee) or !empty($pole) or !empty($entreprise)) {
            $requete .= " WHERE";
        }
        if (!empty($annee)) {
            $requete .= " annee=$annee";
        }
        if (!empty($mois) && !empty($annee)) {
            if (!empty($annee)) {
                $requete .= " AND";
            }
            $requete .= " RefMois=$mois";
        }
        if (!empty($annee) && !empty($pole) && empty($entreprise)) {

            $requete .= " AND RefPole=$pole";
        }
        if (
            !empty($annee)
            && !empty($entreprise)
        ) {
            $requete .= "  AND RefEntreprise=$entreprise";
        }
        if ($_SESSION['Statut'] == 'user') {
            $requete .= " AND RefEntreprise=" . $_SESSION['RefEntreprise'];
        }

        $requete .= " GROUP BY RefRapport";
        $query = $this->dao->prepare($requete);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }



    public function getCharts($mois, $annee, $pole, $entreprise)
    {
        $requete = "SELECT  dashboard.*,tblmois.Mois,tblmois.RefMois,SUM(moisencours) AS Smoisencours,SUM(moisn1) AS Smoisn1,SUM(moisprecedent) AS Smoisprecedent,SUM(previsions) AS Sprevisions FROM dashboard INNER JOIN tblchart ON tblchart.RefRapportElements=dashboard.RefRapportElements INNER JOIN tblmois ON tblmois.RefMois=dashboard.RefMois ";
        if (!empty($mois) or !empty($annee) or !empty($pole) or !empty($entreprise)) {
            $requete .= " WHERE";
        }

        if (!empty($mois) && !empty($annee)) {

            $requete .= " (annee < $annee OR  (tblmois.RefMois < $mois AND annee=$annee) )";
        }
        if (!empty($annee) && !empty($pole) && empty($entreprise)) {

            $requete .= " AND RefPole=$pole";
        }
        if (
            !empty($annee)
            && !empty($entreprise)
        ) {
            $requete .= "  AND RefEntreprise=$entreprise";
        }
        if ($_SESSION['Statut'] == 'user') {
            $requete .= " AND RefEntreprise=" . $_SESSION['RefEntreprise'];
        }
        $requete .= " AND tblchart.RefUsers=" . $_SESSION['RefUsers'];



        $requete .= " GROUP BY RefRapportElements ORDER BY annee,tblmois.RefMois DESC LIMIT 12 ";
        $query = $this->dao->prepare($requete);
        $query->execute();
        $results = $query->fetchAll();
        echo $requete;
        return $results;
    }























    public function getKpises($mois, $annee, $pole, $entreprise)
    {
        $requete = "SELECT  dashboard.*,SUM(moisencours) AS Smoisencours,SUM(moisn1) AS Smoisn1,SUM(moisprecedent) AS Smoisprecedent,SUM(previsions) AS Sprevisions FROM dashboard";
        if (!empty($mois) or !empty($annee) or !empty($pole) or !empty($entreprise)) {
            $requete .= " WHERE";
        }
        if (!empty($annee)) {
            $requete .= " annee=$annee";
        }
        if (!empty($mois) && !empty($annee)) {
            if (!empty($annee)) {
                $requete .= " AND";
            }
            $requete .= " RefMois=$mois";
        }
        if (!empty($annee) && !empty($pole) && empty($entreprise)) {

            $requete .= " AND RefPole=$pole";
        }
        if (!empty($annee) && !empty($entreprise)) {
            $requete .= "  AND RefEntreprise=$entreprise";
        }
        $query = $this->dao->prepare($requete);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }
}