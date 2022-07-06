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

    public function getKpis($mois, $annee)
    {
        $requete = $this->dao->prepare(" SELECT * FROM tbltyperapport INNER JOIN tblrapports ON tbltyperapport.RefTypeRapport = tblrapports.RefTypeRapport");
        $requete->execute();
        $results = $requete->fetchAll();
        foreach ($results as $key => $value) {
            $results[$key]['moisencours'] = $this->getMoisEncours($value['RefRapport'], $mois, $annee);
            $results[$key]['moisn1'] = $this->moisn1($value['RefRapport'], $mois, $annee);
            $results[$key]['moisprecedent'] = $this->moisprecedent($value['RefRapport'], $mois, $annee);
            $results[$key]['previsions'] = $this->getPrevisions($value['RefRapport'], $mois, $annee);
        }
        return $results;
    }

    public function getMoisEncours($rapport, $mois, $annee)
    {
        $requete = $this->dao->prepare(" SELECT SUM(moisencours) AS SOLDE FROM rapportscontent INNER JOIN tblrapports ON tblrapports.RefRapport=rapportscontent.RefRapport INNER JOIN tbltyperapport ON tbltyperapport.RefTypeRapport=tblrapports.RefTypeRapport WHERE tblrapports.RefTypeRapport= :rapport AND tblrapports.RefMois= :mois AND tblrapports.Annee= :annee");
        $requete->bindValue(':rapport', $rapport);
        $requete->bindValue(':mois', $mois);
        $requete->bindValue(':annee', $annee);
        $requete->execute();
        $results = $requete->fetch();
        return $results['SOLDE'];
    }


    public function moisn1($rapport, $mois, $annee)
    {
        $requete = $this->dao->prepare(" SELECT SUM(moisn1) AS SOLDE FROM rapportscontent INNER JOIN tblrapports ON tblrapports.RefRapport=rapportscontent.RefRapport INNER JOIN tbltyperapport ON tbltyperapport.RefTypeRapport=tblrapports.RefTypeRapport WHERE tblrapports.RefTypeRapport= :rapport AND tblrapports.RefMois= :mois AND tblrapports.Annee= :annee");
        $requete->bindValue(':rapport', $rapport);
        $requete->bindValue(':mois', $mois);
        $requete->bindValue(':annee', $annee);
        $requete->execute();
        $results = $requete->fetch();
        return $results['SOLDE'];
    }

    public function moisprecedent($rapport, $mois, $annee)
    {
        $requete = $this->dao->prepare(" SELECT SUM(moisprecedent) AS SOLDE FROM rapportscontent INNER JOIN tblrapports ON tblrapports.RefRapport=rapportscontent.RefRapport INNER JOIN tbltyperapport ON tbltyperapport.RefTypeRapport=tblrapports.RefTypeRapport WHERE tblrapports.RefTypeRapport= :rapport AND tblrapports.RefMois= :mois AND tblrapports.Annee= :annee");
        $requete->bindValue(':rapport', $rapport);
        $requete->bindValue(':mois', $mois);
        $requete->bindValue(':annee', $annee);
        $requete->execute();
        $results = $requete->fetch();
        return $results['SOLDE'];
    }

    public function getPrevisions($rapport, $mois, $annee)
    {
        $requete = $this->dao->prepare(" SELECT SUM(previsions) AS SOLDE FROM rapportscontent INNER JOIN tblrapports ON tblrapports.RefRapport=rapportscontent.RefRapport INNER JOIN tbltyperapport ON tbltyperapport.RefTypeRapport=tblrapports.RefTypeRapport WHERE tblrapports.RefTypeRapport= :rapport AND tblrapports.RefMois= :mois AND tblrapports.Annee= :annee");
        $requete->bindValue(':rapport', $rapport);
        $requete->bindValue(':mois', $mois);
        $requete->bindValue(':annee', $annee);
        $requete->execute();
        $results = $requete->fetch();
        return $results['SOLDE'];
    }
}