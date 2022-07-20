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
        $stats = $this->managers->getManagerOf("Afficher")->ElementsUser();
        $getMois = $this->managers->getManagerOf("Afficher")->getMois($month, $year);

        foreach ($dash as $key => $value) {
            $dash[$key]['elements'] = $this->managers->getManagerOf("Afficher")->getElementsValue($value['RefRapport']);
        }
        foreach ($stats as $key1 => $value1) {
            //  $stats[$key1]['content'] = $this->managers->getManagerOf("Afficher")->getChartsContent($month, $year, $request->postData('RefPole'), $request->postData('RefEntreprise'), $value1['RefRapportElements']);
            foreach ($getMois as $cle => $value) {
                $getMois[$key1][$cle]['data'] = $this->managers->getManagerOf("Afficher")->getContent($value['RefMois'], $value['year'], $request->postData('RefPole'), $request->postData('RefEntreprise'), $value1['RefRapportElements']);
            }
        }


        $this->page->addVar("dash", $dash);
        $this->page->addVar("stats", $stats);
        $this->page->addVar("getMois", $getMois);
    }

    public function executeControl(\Library\HTTPRequest $request)
    {
        $rapports = $this->managers->getManagerOf("Administrer")->getFullRapport();
        $this->page->addVar("rapports", $rapports);
    }
}