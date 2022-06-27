<?php

namespace Library\Models;


abstract class UsersManager extends \Library\Manager
{
    abstract protected function add();

    abstract protected function modify();

    abstract public function login($Login, $Password);

    abstract public function delete($id);

    abstract public function get($id);

    abstract public function getListeOf();
    abstract public function CheckPassword();
    abstract public function ValidPassword();
    abstract public function Statut();
    abstract public function UsersInfo($id);

    public function save(Users $Users)
    {
        if ($Users->isValid()) {
            $Users->isNew() ? $this->add($Users) : $this->modify($Users);
        } else {
            throw new \RuntimeException('Le Articleaire doit être valide pour être enregistrer');
        }
    }
}