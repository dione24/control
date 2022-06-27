<?php

namespace Applications\App\Modules\Administrer;

class AdministrerController extends \Library\BackController
{

    public function executeFinancier(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un Rapport Financier");

        $mois = $this->managers->getManagerOf("Administrer")->getMois();
        $this->page->addVar("mois", $mois);

        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->addClient($request);
            $this->app()->httpResponse()->redirect("/clients");
        }
    }
}