<?php

namespace Library\Models;



class AdministrerManagerPDO extends \Library\Models\AdministrerManager
{
    public function getMois()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblmois");
        $requete->execute();
        $mois = $requete->fetchAll();
        return $mois;
    }
}