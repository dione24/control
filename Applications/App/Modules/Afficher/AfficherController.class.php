<?php

namespace Applications\App\Modules\Afficher;

class AfficherController extends \Library\BackController
{
    public function executeHome(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Accueil");

        $poles = $this->managers->getManagerOf("Administrer")->getPoles();
        $this->page->addVar("poles", $poles);
        $kpis = $this->managers->getManagerOf("Afficher")->getKpis();
        $moisencours = 0;
        $moisn1 = 0;
        $moisprecedent = 0;
        $previsions =  0;

        $this->page->addVar("moisencours", $moisencours);
        $this->page->addVar("moisn1", $moisn1);
        $this->page->addVar("moisprecedent", $moisprecedent);
        $this->page->addVar("previsions", $previsions);

        $this->page->addVar("kpis", $kpis);
    }

    public function executeControl(\Library\HTTPRequest $request)
    {
        $rapports = $this->managers->getManagerOf("Administrer")->getFullRapport();
        $this->page->addVar("rapports", $rapports);
    }
}