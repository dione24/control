<?php

namespace Applications\App\Modules\Afficher;

class AfficherController extends \Library\BackController
{
    public function executeHome(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Accueil");

        $poles = $this->managers->getManagerOf("Administrer")->getPoles();
        $this->page->addVar("poles", $poles);

        $entreprises = $this->managers->getManagerOf("Administrer")->getEntreprise();
        $this->page->addVar("entreprises", $entreprises);

        if ($request->method() == "POST") {

            $month = $request->postData("month");
            $year = $request->postData("year");
            $pole = $request->postData("RefPole");
            $entreprise = $request->postData("RefEntreprise");
            $kpis = $this->managers->getManagerOf("Afficher")->getKpis();
        } else {
            $kpis = $this->managers->getManagerOf("Afficher")->getKpis(1, 2022);
        }

        $this->page->addVar("kpis", $kpis);
    }

    public function executeControl(\Library\HTTPRequest $request)
    {
        $rapports = $this->managers->getManagerOf("Administrer")->getFullRapport();
        $this->page->addVar("rapports", $rapports);
    }
}