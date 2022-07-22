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
        $requete = "SELECT  dashboard.*,SUM(moisencours) AS Smoisencours,SUM(moisn1) AS Smoisn1,SUM(moisprecedent) AS Smoisprecedent,SUM(previsions) AS Sprevisions FROM dashboard INNER JOIN tblrapports ON dashboard.RefRapport=tblrapports.RefRapport ";
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

            $requete .= " AND dashboard.RefPole=$pole";
        }
        if (
            !empty($annee)
            && !empty($entreprise)
        ) {
            $requete .= "  AND dashboard.RefEntreprise=$entreprise";
        }
        if ($_SESSION['Statut'] == 'user') {
            $requete .= " AND dashboard.RefEntreprise=" . $_SESSION['RefEntreprise'];
        }
        $requete .= " AND tblrapports.status=2";

        $requete .= " GROUP BY RefRapport";
        $query = $this->dao->prepare($requete);
        $query->execute();
        $results = $query->fetchAll();
        foreach ($results as $key => $value) {

            $results[$key]['reports'] = $this->getReporting($pole, $value['RefTypeRapport'], $mois, $annee, $entreprise);
        }
        return $results;
    }

    public function getReporting($pole, $typerapport, $mois, $annee, $enterprise)
    {
        if (!empty($pole) && empty($enterprise)) {
            $requete = $this->dao->prepare("SELECT * FROM tblreporting INNER JOIN tblpole ON tblpole.RefPole=tblreporting.RefPole WHERE tblreporting.RefPole=:pole AND RefTypeRapport=:typerapport AND RefMois=:mois AND annee=:annee");
            $requete->bindValue(':pole', $pole);
        } elseif (empty($enterprise) && empty($pole)) {
            $requete = $this->dao->prepare("SELECT * FROM tblreporting INNER JOIN tblpole ON tblpole.RefPole=tblreporting.RefPole  WHERE RefTypeRapport=:typerapport AND RefMois=:mois AND annee=:annee");
        } else {
            return [];
        }
        $requete->bindValue(':typerapport', $typerapport);


        $requete->bindValue(':mois', $mois);
        $requete->bindValue(':annee', $annee);
        $requete->execute();
        $results = $requete->fetchAll();
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
            $requete .= " AND dashboard.RefEntreprise=$entreprise";
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