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

    public function getListeOf()
    {
        $requete = $this->dao->prepare("SELECT *  FROM users");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function SendUserinfo($to, $login, $Password)
    {
        $subject = "Identifiants de connexion | CAISSE MLC";
        $message = "Veuillez recevoir vos Identifiants de connexion. Votre login est: $login et le mot de passe est: $Password  le lien d'acces du site est : https://app.malicreances-sa.com/  Merci de modifier votre mot de passe dès reception de ce mail. ";
        $headers = 'From: no-reply@malicreances-sa.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }

    public function AddUsers($request)
    {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $requete = $this->dao->prepare("INSERT INTO users (login, password,status, nom, prenom, email, RefEntreprise) VALUES (:login, :password, :status, :nom, :prenom, :email,:RefEntreprise)");
        $requete->bindValue(':login', $request->postData('login'), \PDO::PARAM_STR);
        $requete->bindValue(':password', $password, \PDO::PARAM_STR);
        $requete->bindValue(':status', $request->postData('status'), \PDO::PARAM_STR);
        $requete->bindValue(':nom', $request->postData('nom'), \PDO::PARAM_STR);
        $requete->bindValue(':prenom', $request->postData('prenom'), \PDO::PARAM_STR);
        $requete->bindValue(':email', $request->postData('email'), \PDO::PARAM_STR);
        $requete->bindValue(':RefEntreprise', $request->postData('RefEntreprise'), \PDO::PARAM_STR);
        $requete->execute();
        $this->SendUserinfo($_POST['email'], $_POST['login'], $_POST['password']);
    }
}