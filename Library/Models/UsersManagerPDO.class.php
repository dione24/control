<?php

namespace Library\Models;


class UsersManagerPDO extends UsersManager
{

    public function login($login, $Password)
    {
        $requete = $this->dao->prepare("SELECT *  FROM users WHERE login=:login");
        $requete->bindValue(':login', $login, \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        if (password_verify($_POST['password'], $resultat['password'])) {

            return $resultat;
        }
    }
    public function add()
    {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $requete = $this->dao->prepare("INSERT INTO users(login,password,Nom,Prenom,email,id_statut) VALUES(:login,:password,:Nom,:Prenom,:email,:id_statut)");
                $requete->bindValue(':login', $_POST['login'], \PDO::PARAM_STR);
                $requete->bindValue(':password', $password, \PDO::PARAM_STR);
                 $requete->bindValue(':Nom', $_POST['Nom'], \PDO::PARAM_STR);
                $requete->bindValue(':Prenom', $_POST['Prenom'], \PDO::PARAM_STR);
                 $requete->bindValue(':email', $_POST['email'], \PDO::PARAM_STR);   
                 $requete->bindValue(':id_statut', $_POST['id_statut'], \PDO::PARAM_INT);       

        $requete->execute();
    }
    public function modify()
    {
           if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $requete = $this->dao->prepare("UPDATE users SET login=:login,password=:password,Nom=:Nom,Prenom=:Prenom,email=:email,id_statut=:id_statut  WHERE id=:id");
                 $requete->bindValue(':login', $_POST['login'], \PDO::PARAM_STR);
                $requete->bindValue(':password', $password, \PDO::PARAM_STR);
                 $requete->bindValue(':Nom', $_POST['Nom'], \PDO::PARAM_STR);
                $requete->bindValue(':Prenom', $_POST['Prenom'], \PDO::PARAM_STR);
                 $requete->bindValue(':email', $_POST['email'], \PDO::PARAM_STR);   
                 $requete->bindValue(':id_statut', $_POST['id_statut'], \PDO::PARAM_INT);      
              $requete->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);       
 
            $requete->execute();
            header("location: /Pannel");
        } else {
                $requete = $this->dao->prepare("UPDATE users SET login=:login,Nom=:Nom,Prenom=:Prenom,email=:email,id_statut=:id_statut  WHERE id=:id");
                 $requete->bindValue(':login', $_POST['login'], \PDO::PARAM_STR);
                 $requete->bindValue(':Nom', $_POST['Nom'], \PDO::PARAM_STR);
                 $requete->bindValue(':Prenom', $_POST['Prenom'], \PDO::PARAM_STR);
                 $requete->bindValue(':email', $_POST['email'], \PDO::PARAM_STR);   
                 $requete->bindValue(':id_statut', $_POST['id_statut'], \PDO::PARAM_INT);      
                 $requete->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);    
              $requete->execute();
            header("location: /Pannel");
        }

    }
    public function getListeOf()
    {
        $requete = $this->dao->prepare("SELECT * FROM users INNER JOIN statut ON statut.id_statut=users.id_statut ");
        $requete->execute();
        $Users = $requete->fetchAll();
        return $Users;
    }
    public function get($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM users WHERE id=:id');
        $requete->bindValue(':id', (int)$id, \PDO::PARAM_INT);
        $requete->execute();
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\User');
        return $requete->fetch();
    }
    public function delete($id)
    {
        $requete = $this->dao->prepare("DELETE FROM users WHERE id=:id");
        $requete->bindValue(':id', (int)$id, \PDO::PARAM_INT);
        $requete->execute();
    }

    public function CheckPassword(){
        $query = $this->dao->prepare("SELECT * FROM users WHERE id=:id ");
        $query->bindValue(':id', $_SESSION['id'], \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();
        if (password_verify($_POST['password'], $data['password'])) {
            header('Location: /NewPassword');
        }else{
             header('Location: /ListeClient');
        }
    }
    public function ValidPassword(){
         $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
         $requete = $this->dao->prepare("UPDATE users SET password=:password WHERE id=:id");
         $requete->bindValue(':id', $_SESSION['id'], \PDO::PARAM_INT);
         $requete->bindValue(':password', $password, \PDO::PARAM_STR);
         $requete->execute();
         header('Location: /Profile');
    }
    public function Statut(){
        $requete = $this->dao->prepare("SELECT * FROM statut");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
      }

    public function UsersInfo($id){
            $requete  = $this->dao->prepare("SELECT * FROM users WHERE id=:id");
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
        $usersinfo = $requete->fetch();
        return $usersinfo;
    }


}
