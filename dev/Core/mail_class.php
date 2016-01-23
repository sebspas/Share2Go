<?php
/**
 * Class mail()
 *
 * Classe permettant de créer un message automatique à envoyer à l'utilisateur
 * @package Core
 * @subpackage Class
 * @author TeamShare2Go
 */
class mail {
	
	/** @var String mail de l'utilisateur à qui envoyer le message*/
	var $Destinataire;
	/** @var String sujet du message */
	var $Sujet;
	/** @var String message, contenu du message */
	var $Message;
	/** @var String type, type du message (ex: Reservation)*/
	var $Type;

	 /**
     * Function __construct()
     *
     * Constructeur par défaut de la class mail
     * @param string $Destinataire Le mail à qui envoyer le message.
     * @param string $Sujet le sujet du mail à envoyer.
     */
    public function __construct($Destinataire, $Sujet, $Type, $Message) {
    	
    	$this->Destinataire = $Destinataire;
    	$this->Sujet = $Sujet;
    	
    	if ($Type == "Reservation")    		
    		$this->Message = 'Bonjour ! Toute l\'équipe de Share2Go vous remercie et vous souhaite la bienvenue ! <br/>'  . $Message;
    	
    	else     		
    		$this->Message = "Ceci est un message autre que pour l'inscription ! <br/>" . $Message;

    	mail ($Destinataire, $Sujet, $Message);
    	        
    } // construct ()

    /**
     * Function getDestinataire()
     *
     * Renvoie l'adresse à qui est destiné le message
     */
    public function getDestinataire () {return $this->Destinataire;} // getDestinataire ()

    /**
     * Function getSujet()
     *
     * Renvoie le sujet du message
     */
    public function getSujet () {return $this->Sujet;} // getSujet ()

    /**
     * Function getMessage()
     *
     * Renvoie le contenu du message
     */
    public function getMessage () {return $this->Message;} // getMessage ()

    /**
     * Function getNom()
     *
     * Renvoie le type du message
     */
    public function getType () {return $this->Type;} // getType ()


    /**
     * Function setDestinataire()
     *
     * Modifie l'adresse du destinataire
     * @param string $Destinataire nouvelle adresse de destination
     */
    public function setDestinataire($Destinataire) {$this->Destinataire = $Destinataire;} // setDestinataire ()

    /**
     * Function setSujet() 
     *
     * Modifie le sujet du message
     * @param string $Sujet nouveau sujet du message
     */
    public function setSujet($Sujet) {$this->Sujet = $Sujet;} // setMessage ()

    /**
     * Function setMessage()
     *
     * Modifie le contenu du message
     * @param string $Message nouveau contenu du message
     */
    public function setMessage($Message) {$this->Message = $Message;} // setMessage ()

} // class Mail

    