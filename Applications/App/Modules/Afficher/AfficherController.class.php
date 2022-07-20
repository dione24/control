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
        $mois = $this->managers->getManagerOf('Administrer')->getMois();
        $this->page->addVar("mois", $mois);


        $date = date('Y-m', strtotime('-1 month'));
        $month = ($request->method() == 'POST') ? $request->postData('month') : date('m', strtotime($date));
        $year = ($request->method() == 'POST') ? $request->postData('year') : date('Y', strtotime($date));
        $this->page->addVar("month", $month);
        $this->page->addVar("year", $year);
        $dash = $this->managers->getManagerOf("Afficher")->getDash($month, $year, $request->postData('RefPole'), $request->postData('RefEntreprise'));
        $charts = $this->managers->getManagerOf("Afficher")->UserCharts();
        //getCharts($month, $year, $request->postData('RefPole'), $request->postData('RefEntreprise'));
        foreach ($dash as $key => $value) {
            $dash[$key]['elements'] = $this->managers->getManagerOf("Afficher")->getElementsValue($value['RefRapport']);
        }
        $this->page->addVar("dash", $dash);
        $this->page->addVar("charts", $charts);
    }

    public function executeControl(\Library\HTTPRequest $request)
    {
        $rapports = $this->managers->getManagerOf("Administrer")->getFullRapport();
        $this->page->addVar("rapports", $rapports);
    }
}