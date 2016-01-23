<?php
/**
 * Class user()
 *
 * Classe permetant de se connecter et d'effectuer des opérations sur la base de donnée,
 * attention a l'heure actuelle cette classe n'effectue aucun controle dans les setters !!!
 * @package Core
 * @subpackage   Class
 * @author TeamShare2Go
 */
class user {
    /** @var bd Objet de la classe bd */
    var $BD;
    /** @var int Id de l'utilisateur */
    var $ID;
    /** @var string Nom de l'utilisateur */
    var $NOM;
    /** @var string Prenom de l'utilisateur */
    var $PRENOM;
    /** @var int Age de l'utilisateur */
    var $AGE;
    /** @var int Note de l'utilisateur */
    var $NOTE;
    /** @var int Tel de l'utilisateur */
    var $TEL;
    /** @var string Mail de l'utilisateur */
    var $MAIL;
    /** @var string Pass de l'utilisateur (hasher) */
    var $PASS;
    /** @var date date de connection de l'utilisateur */
    var $LASTCO;    
    /** @var date date de connection de l'utilisateur */
    var $DINSC;   
    /** @var int Nbtrajet de l'utilisateur */
    var $NB; 
    var $avatar;

    /**
     * Function __construct()
     *
     * Constructeur par défaut de la class user, construit l'utilisateur a partir de son nom passer en parametre.
     *
     * @param string $Mail Le mail de l'utilisateur concerner.
     */
    public function __construct($Mail) {
    	$this->BD = new BD("user");
    	$tab = $this->BD->select("mail",$Mail);
    	$this->ID = $tab->iduser;
    	$this->NOM = $tab->nom;
    	$this->PRENOM = $tab->prenom;
    	$this->AGE = $tab->age;
    	$this->TEL = $tab->tel;
    	$this->MAIL = $tab->mail;
    	$this->PASS = $tab->mdp;
        $this->LASTCO = $tab->lastco;
        $this->DINSC = $tab->dateinscription;
        $this->NB = $tab->nbtrajet;
        $this->avatar = $tab->avatar;
    } // construct()

    public function getAvatar() {
        return $this->avatar;
    }
    public function Afficher() {
    	echo "Nom : $this->NOM, Prenom : $this->PRENOM,
    	 Age : $this->AGE, Mail : $this->MAIL, Tel : $this->TEL </br>";
    } // Afficher()

    /**
     * Function getID()
     *
     * Renvoie l'ID de l'utilisateur sur lequel porte l'objet
     */
    public function getID() {
    	return $this->ID;
    } // getId()

    /**
     * Function getlastco()
     *
     * Renvoie la derniere date de connection de l'utilisateur sur lequel porte l'objet
     */
    public function getlastco() {
        return $this->LASTCO;
    } // getlastco()

    public function getDateInscription() {
        return $this->DINSC;
    }

    public function getNbTrajet() {
        return $this->NB;
    }
    /**
     * Function getNote()
     *
     * Renvoie la note de l'utilisateur sur lequel porte l'objet
     */
    public function getNote() {
        return $this->NOTE;
    } // getNote()

    /**
     * Function getNom()
     *
     * Renvoie le nom de l'utilisateur sur lequel porte l'objet
     */
    public function getNom() {
    	return $this->NOM;
    } // getNom()

    /**
     * Function getPrenom()
     *
     * Renvoie le Prenom de l'utilisateur sur lequel porte l'objet
     */
    public function getPrenom() {
    	return $this->PRENOM;
    } // getPrenom()

    /**
     * Function getAge()
     *
     * Renvoie l'age de l'utilisateur sur lequel porte l'objet
     */
    public function getAge() {
    	return $this->AGE;
    } // getAge()

    /**
     * Function getTel()
     *
     * Renvoie le telephone de l'utilisateur sur lequel porte l'objet
     */
    public function getTel() {
    	return $this->TEL;
    } // getTel()

    /**
     * Function getMail()
     *
     * Renvoie le Mail de l'utilisateur sur lequel porte l'objet
     */
    public function getMail() {
    	return $this->MAIL;
    } // getMail()

    /**
     * Function setNom()
     *
     * Modifie le Nom de l'utilisateur sur lequel porte l'objet
	 * @param string $Nom Nouveau Nom de l'utilisateur
     */
    public function setNom($Nom) {
    	$this->BD->update("NOM",$Nom,"iduser",$this->ID);
    	$this->NOM = $Nom;
    } // setNom()

    /**
     * Function setPrenom()
     *
     * Modifie le Prenom de l'utilisateur sur lequel porte l'objet
	 * @param string $Prenom Nouveau Prenom de l'utilisateur
     */
   	public function setPrenom($Prenom) {
    	$this->BD->update("PRENOM",$Prenom,"iduser",$this->ID);
    	$this->PRENOM = $Prenom;
    } // setPrenom()

    /**
     * Function setAge()
     *
     * Modifie l'Age de l'utilisateur sur lequel porte l'objet
	 * @param int $Age Nouvel Age de l'utilisateur
     */
   	public function setAge($Age) {
    	$this->BD->update("AGE",$Age,"iduser",$this->ID);
    	$this->AGE = $Age;
    } // setAge()

    /**
     * Function setTel()
     *
     * Modifie le Tel de l'utilisateur sur lequel porte l'objet
	 * @param int $Tel Nouveau Tel de l'utilisateur
     */
   	public function setTel($Tel) {
    	$this->BD->update("TEL",$Tel,"iduser",$this->ID);
    	$this->TEL= "0" . $Tel;
    } // setTel()

    /**
     * Function setMail()
     *
     * Modifie le Mail de l'utilisateur sur lequel porte l'objet
	 * @param string $Mail Nouveau Mail de l'utilisateur
     */
    public function setMail($Mail) {
    	$this->BD->update("MAIL",$Mail,"iduser",$this->ID);
    	$this->MAIL = $Mail;
    } // setMail())

    /**
     * Function setPass()
     *
     * Modifie le Pass de l'utilisateur sur lequel porte l'objet
	 * @param string $Pass Nouveau Pass de l'utilisateur
     */
    public function setPass($Pass) {
    	$Pass = sha1($Pass);
    	$this->BD->update("PASS",$Pass,"iduser",$this->ID);
    	$this->PASS = $Pass;
    } // setPass()
} //class user