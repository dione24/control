<?php

namespace Applications\App\Modules\Connexion;

class ConnexionController extends \Library\BackController
{

    public function executeIndex(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Page de Connexion"); // Titre de la page
        $this->page->setTemplate('login');
        if ($request->method() == 'POST') {
            $User = $this->managers->getManagerOf('Users')->login($request->postData('login'), $request->postData('password'));
            if (!empty($User)) {
                $this->app()->user()->setAuthenticated();
                $_SESSION['id'] = $User['id'];
                $_SESSION['login'] = $User['login'];
                $_SESSION['Nom'] = $User['Nom'];
                 $_SESSION['Prenom'] = $User['Prenom'];
                $this->app()->httpResponse()->redirect('/');
            }
        }
    }


       public function executeProfile(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Mon Profil");
    }

       public function executeCheckPassword(\Library\HTTPRequest $request)
         {
        $this->page->addVar("titles", "Change Password");
         $CheckPassword =  $this->managers->getManagerOf('Users')->CheckPassword($request);
       }

      public function executeNewPassword(\Library\HTTPRequest $request)
        {
        $this->page->addVar("titles", "Nouveau Mot de Passe");
     }

     public function executeValidPassword(\Library\HTTPRequest $request)
         {
            $this->page->addVar("titles", "Change Password");
        $ValidPassword =  $this->managers->getManagerOf('Users')->ValidPassword($request);
       }

       public function executePannel(\Library\HTTPRequest $request)
        {
          $this->page->addVar("titles", "Liste des Utilisateurs");
              $ListeUsers =  $this->managers->getManagerOf('Users')->getListeOf();
              $this->page->addVar("ListeUsers", $ListeUsers);
               $Statut =  $this->managers->getManagerOf('Users')->Statut();
              $this->page->addVar("Statut", $Statut);
        }


     public function executeAddUsers(\Library\HTTPRequest $request)
         {
            $this->page->addVar("titles", "Ajouter un Utilisateur");
             $add =  $this->managers->getManagerOf('Users')->add($request);
            $this->app()->httpResponse()->redirect("/Pannel"); 
       }

          public function executeDeleteUsers(\Library\HTTPRequest $request)
    {
                $this->page->addVar("titles", "Delete Users");
                $this->managers->getManagerOf('Users')->delete($request->getData('id'));
                $this->app()->httpResponse()->redirect('/Pannel');
    }


       public  function executeEditUsers(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modification des informations ");
        $Info = $this->managers->getManagerOf('Users')->UsersInfo($request->getData('id'));
        $this->page->addVar('usesinfo', $Info);
          $Statut =  $this->managers->getManagerOf('Users')->Statut();
              $this->page->addVar("Statut", $Statut);
    }

     public function executeUpdateUsers(\Library\HTTPRequest $request)
         {
            $this->page->addVar("titles", "Update Users");
             $Update =  $this->managers->getManagerOf('Users')->modify($request);
            $this->app()->httpResponse()->redirect("/Pannel"); 
       }

    public function executeLogout(\Library\HTTPRequest $request)
    {
        $this->page->addVar('titles', 'Logout');
        $this->app()->user()->setAuthenticated(false); //deconnexion de user
        $this->app()->user()->setFlash('Logout Successul');
        $this->app()->httpResponse()->redirect('/');
    }
}
