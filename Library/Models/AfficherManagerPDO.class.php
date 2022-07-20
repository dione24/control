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
        $requete = "SELECT  dashboard.*,SUM(moisencours) AS Smoisencours,SUM(moisn1) AS Smoisn1,SUM(moisprecedent) AS Smoisprecedent,SUM(previsions) AS Sprevisions FROM dashboard INNER JOIN tblrapports ON dashboard.RefRapport=tblrapports.RefRapport";
        if (!empty($mois) or !empty($annee) or !empty($pole) or !empty($entreprise)) {
            $requete .= " WHERE";
        }
        if (!empty($annee)) {
            $requete .= " tblrapports.annee=$annee";
        }
        if (!empty($mois) && !empty($annee)) {
            if (!empty($annee)) {
                $requete .= " AND";
            }
            $requete .= " tblrapports.RefMois=$mois";
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
        $requete .= " AND tblrapports.status=2";

        $requete .= " GROUP BY RefRapport";
        $query = $this->dao->prepare($requete);
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }



    public  function ElementsUser()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblrapportelements INNER JOIN tblchart ON  tblchart.RefRapportElements=tblrapportelements.RefRapportElements WHERE tblchart.RefUsers=:id");
        $requete->bindValue(':id', $_SESSION['RefUsers']);
        $requete->execute();
        $results = $requete->fetchAll();
        return $results;
    }


    public function getMois($moisencours, $annee)
    {
        $requete = $this->dao->prepare("(SELECT *,($annee -1) AS year FROM tblmois WHERE RefMois >:moisencours ORDER BY RefMois DESC) UNION (SELECT *,$annee AS year FROM tblmois WHERE RefMois <=:moisencours ORDER BY RefMois DESC) ");
        $requete->bindValue(':moisencours', $moisencours);
        $requete->execute();
        $results = $requete->fetchAll();
        return $results;
    }

    public function getContent($mois, $annee, $pool, $entreprise, $elements)
    {
        $requete = "SELECT dashboard.*,SUM(moisencours) AS Smoisencours,SUM(moisn1) AS Smoisn1,SUM(moisprecedent) AS Smoisprecedent,SUM(previsions) AS Sprevisions FROM dashboard INNER JOIN tblrapports ON dashboard.RefRapport=tblrapports.RefRapport WHERE RefRapportElements=$elements AND tblrapports.annee=$annee AND tblrapports.RefMois=$mois";
        if (!empty($entreprise)) {
            $requete .= " AND RefEntreprise=$entreprise";
        } elseif (!empty($pool)) {
            $requete .= " AND RefPole=$pool";
        }
        $requete .= " AND tblrapports.status=2";
        $query = $this->dao->prepare($requete);
        $query->execute();
        $results = $query->fetch();
        return $results;
    }
}