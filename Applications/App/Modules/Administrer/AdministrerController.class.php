<?php

namespace Applications\App\Modules\Administrer;

class AdministrerController extends \Library\BackController
{

    public function executeForm(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un Rapport ");

        $mois = $this->managers->getManagerOf('Administrer')->getMois();
        $this->page->addVar("mois", $mois);

        $rapport = $this->managers->getManagerOf("Administrer")->singleRapport($request->getData('id'));
        $this->page->addVar("rapport", $rapport);

        $elements = $this->managers->getManagerOf("Administrer")->getElements($request->getData('id'));
        $this->page->addVar("elements", $elements);

        $verif = $this->managers->getManagerOf("Administrer")->verifRapport($request->getData('id'));
        $this->page->addVar("verif", $verif);

        $entreprises = $this->managers->getManagerOf("Administrer")->getEntreprise();
        $this->page->addVar("entreprises", $entreprises);
        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->addRapport($request);
            $this->app()->httpResponse()->redirect("/rapports/kpi");
        }
    }

    public function executeEntreprise(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Entreprises");

        $poles = $this->managers->getManagerOf("Administrer")->getPoles();
        $this->page->addVar("poles", $poles);
        $entreprises = $this->managers->getManagerOf("Administrer")->getEntreprise();
        $this->page->addVar("entreprises", $entreprises);

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf("Administrer")->addEntreprise($request);
            $this->app()->httpResponse()->redirect("entreprises/index");
        }
    }


    public function executePole(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Poles");

        $poles = $this->managers->getManagerOf("Administrer")->getPoles();
        $this->page->addVar("poles", $poles);

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf("Administrer")->addPole($request);
            $this->app()->httpResponse()->redirect("/poles-activites/index");
        }
    }

    public function executeRapports(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Configurations");
        $entreprises = $this->managers->getManagerOf("Administrer")->getEntreprise();
        $this->page->addVar("entreprises", $entreprises);

        $rapports = $this->managers->getManagerOf("Administrer")->getTypeRapport();
        $this->page->addVar("rapports", $rapports);

        foreach ($rapports as $key => $rapport) {
            foreach ($entreprises as $clef => $entreprise) {
                $enterprise[$rapport['RefTypeRapport']][$entreprise['RefEntreprise']] =
                    $this->managers->getManagerOf('Administrer')->VerifChmod($rapport['RefTypeRapport'], $entreprise['RefEntreprise']);
            }
        }
        $this->page->addVar("enterprise", $enterprise);

        if ($request->method() == 'POST' && !empty($_POST['nomRapport'])) {
            $this->managers->getManagerOf("Administrer")->addTypeRapport($request);
            $this->app()->httpResponse()->redirect("/rapports/config");
        }

        if ($request->method() == 'POST' && !empty($_POST['nomElement'])) {
            $this->managers->getManagerOf("Administrer")->addElement($request);
            $this->app()->httpResponse()->redirect("/rapports/config");
        }
        if ($request->method() == 'POST' && !empty($_POST['RefEntreprise'])) {
            $this->managers->getManagerOf("Administrer")->addChmod($request);
            $this->app()->httpResponse()->redirect("/rapports/config");
        }
    }

    public function executeConfigview(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Elements");

        $elements = $this->managers->getManagerOf("Administrer")->getElements($request->getData('id'));
        $this->page->addVar("elements", $elements);
    }
    public function executePannel(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "KPI");
        $rapports = $this->managers->getManagerOf("Administrer")->getTypeRapport();
        $this->page->addVar("rapports", $rapports);
    }

    public function executeView(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Rapports");
        $rapports = $this->managers->getManagerOf("Administrer")->getEntrepriseRapport($request->getData('id'));
        $this->page->addVar("rapports", $rapports);
    }
    public function executeDisplay(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Afficher");
        $name = $this->managers->getManagerOf("Administrer")->getRapportName($request->getData('id'));
        $this->page->addVar("name", $name);
        $entreprises = $this->managers->getManagerOf("Administrer")->getEntreprise();
        $this->page->addVar("entreprises", $entreprises);
        $mois = $this->managers->getManagerOf('Administrer')->getMois();
        $this->page->addVar("mois", $mois);
        $elements = $this->managers->getManagerOf("Administrer")->getElements($name['RefTypeRapport']);

        foreach ($elements as $key => $element) {
            $elements[$key]['content'] = $this->managers->getManagerOf('Administrer')->getValeur($element['RefRapportElements'], $request->getData('id'));
        }
        $this->page->addVar("elements", $elements);

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->updateRapport($request);
            $this->app()->httpResponse()->redirect("/rapports/view/display/" . $request->postData('RefRapport'));
        }
    }
    public function executeDelete(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Administrer')->deleteRapport($request->getData('id'));
        $this->app()->httpResponse()->redirect("/rapports/kpi");
    }

    public function executeStatut(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Administrer')->updateStatut($request->getData('statut'), $request->getData('rapport'));
        $this->app()->httpResponse()->redirect("/rapports/control/index");
    }
}