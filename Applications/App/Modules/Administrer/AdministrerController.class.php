<?php

namespace Applications\App\Modules\Administrer;

class AdministrerController extends \Library\BackController
{

    public function executeFinancier(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un Rapport Financier");

        $mois = $this->managers->getManagerOf('Administrer')->getMois();
        $this->page->addVar("mois", $mois);
        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->addRapportFinancier($request);
            $this->app()->httpResponse()->redirect("/rapports");
        }
    }
    public function executeOperations(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un Rapport des Operations");

        $mois = $this->managers->getManagerOf('Administrer')->getMois();
        $this->page->addVar("mois", $mois);
        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->addRapportFinancier($request);
            $this->app()->httpResponse()->redirect("/operations");
        }
    }

    public function executeMarketing(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un Rapport Marketing");

        $mois = $this->managers->getManagerOf('Administrer')->getMois();
        $this->page->addVar("mois", $mois);
        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->addRapportMarketing($request);
            $this->app()->httpResponse()->redirect("/marketing");
        }
    }

    public function executeRh(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un Rapport RH");

        $mois = $this->managers->getManagerOf('Administrer')->getMois();
        $this->page->addVar("mois", $mois);
        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->addRapportRh($request);
            $this->app()->httpResponse()->redirect("/rh");
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

        if ($request->method() == 'POST' && !empty($_POST['nomRapport'])) {
            $this->managers->getManagerOf("Administrer")->addTypeRapport($request);
            $this->app()->httpResponse()->redirect("/rapports/config");
        }


        if ($request->method() == 'POST' && !empty($_POST['nomElement'])) {
            $this->managers->getManagerOf("Administrer")->addElement($request);
            $this->app()->httpResponse()->redirect("/rapports/config");
        }
    }

    public function executeConfigview(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Elements");

        $elements = $this->managers->getManagerOf("Administrer")->getElements($request->getData('id'));
        $this->page->addVar("elements", $elements);
    }
}