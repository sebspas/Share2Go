<?php
/**
 * Class bd()
 *
 * Classe permetant de se connecter et d'effectuer des opérations sur la base de donnée
 * @package Core
 * @subpackage Class
 * @author TeamShare2Go
 */
class BD {
    /** @var PDO Connexion a la base de donner */
    private static $bdd = null;
    /** @var string Nom de la table a laquelle est connecter la classe bd */
    var $table;
    
    /**
     * Function __construct()
     *
     * Constructeur par défaut de la class bd
     * @param string $table Le nom de la table a laquel se connecter.
     */
    public function __construct($table){
        if (self::$bdd == null) {
            self::$bdd = new PDO('mysql:host=localhost;dbname=s2go', 'root', 'aqwEDCtgb7');
        }
        $this->table = $table;
    }

    /**
     * Function getUsedTable()
     *
     * Permet de connaitre la table sur laquel on travail
     */
    function getUsedTable() {
        return $this->table;
    } // getusedTable()

    /**
     * Function setUsedTable()
     *
     * Permet de modifier la table sur laquel on effectue les opérations
     * @param string $table Le nom de la nouvelle table a laquel se connecter
     */
    function setUsedTable($table) {
        $this->table = $table;
    }// setUsedTable()


    /**
     * Function select()
     *
     * Effectue une simple requete sur la table et recupere le tuple concerner, pour acceder
     * a un element de resultat il suffit de faire $result->ID_U par exemple
     * @param string $cond_att Le nom de la colonne (ex: NOM)
     * @param mixed $cond_val La valeur de la colonne rechercher (ex: Jean)
     */
    function select($cond_att,$cond_val) {

        $req = self::$bdd->prepare("SELECT * FROM $this->table WHERE $cond_att = ?");

        $req->execute(array($cond_val));
        $donnees = $req->fetch(PDO::FETCH_OBJ);

        $req->closeCursor();
        
        return $donnees;
    } // select()

    /**
     * Function count()
     *
     * Effectue une simple requete sur la table, 
     * elle renvoie le nbr d'element
     * @param string $cond_att Le nom de la colonne (ex: NOM)
     * @param mixed $cond_val La valeur de la colonne rechercher (ex: Jean)
     */
    function count($cond_att,$cond_val) {

        $req = self::$bdd->prepare("SELECT COUNT(*) as nb FROM $this->table WHERE $cond_att = ?");

        $req->execute(array($cond_val));
        $donnees = $req->fetch(PDO::FETCH_OBJ);

        $req->closeCursor();

        return $donnees->nb;
    } // count()

    /**
     * Function selectAttribut()
     *
     * Effectue une simple requete sur la table et recupere l'attribut choisi du tuple concerné
     * @param string $att_select Le nom de l'attribut selectionné (ex: NOM)
     * @param string $cond_att Le nom de la colonne (ex: NOM)
     * @param mixed $cond_val La valeur de la colonne rechercher (ex: Jean)
     */
    function selectAttribut($att_select, $cond_att,$cond_val) {

        $req = self::$bdd->prepare("SELECT ? FROM $this->table WHERE $cond_att = ?");

        $req->execute(array($att_select, $cond_val));
        $donnees = $req->fetch(PDO::FETCH_OBJ);

        $req->closeCursor();

        return $donnees;
    } // select()

    /**
     * Function selectAll()
     *
     * Recupere tout les tuples de la table sur laquel on effectue les operations,les renvoie dans 
     * un tableau ou chaque case et un tuple
     */
    function selectAll($orderatt) {
        if (isset($orderatt)) {
            $req = self::$bdd->prepare("SELECT * FROM $this->table ORDER BY $orderatt ASC"); 
            $req->execute();

            while($donnees[] = $req->fetch(PDO::FETCH_OBJ));

            $req->closeCursor();

            return $donnees;
        }

        $req = self::$bdd->prepare("SELECT * FROM $this->table");

        $req->execute();

        while($donnees[] = $req->fetch(PDO::FETCH_OBJ));

        $req->closeCursor();

        return $donnees;
    } // selectAll()

    /**
     * Function selectMult()
     *
     * Recupere tout les tuples de la table sur laquel on effectue les operations,les renvoie dans 
     * un tableau ou chaque case et un tuple
     */
    function selectMult($cond_att,$cond_val) {

        $req = self::$bdd->prepare("SELECT * FROM $this->table WHERE $cond_att = ?");

        $req->execute(array($cond_val));

        while($donnees[] = $req->fetch(PDO::FETCH_OBJ));

        $req->closeCursor();

        return $donnees;
    } // selectMult()

    /**
     * Function selectTwoParam()
     *
     * Recupere tout les tuples de la table sur laquel on effectue les operations,les renvoie dans 
     * un tableau ou chaque case et un tuple depuis la table trajet correspondant aux parametres
     */
    function selectTwoParam($cond_att,$cond_val,$cond_att2,$cond_val2,$orderatt) {
        if (isset($orderatt)) {

            $req = self::$bdd->prepare("SELECT * FROM $this->table WHERE $cond_att = ? AND $cond_att2 = ? ORDER BY $orderatt ASC");

            $req->execute(array($cond_val,$cond_val2));

            while($donnees[] = $req->fetch(PDO::FETCH_OBJ));

            $req->closeCursor();

            return $donnees;
        }

        $req = self::$bdd->prepare("SELECT * FROM $this->table WHERE $cond_att = ? AND $cond_att2 = ?");

        $req->execute(array($cond_val,$cond_val2));

        while($donnees[] = $req->fetch(PDO::FETCH_OBJ));

        $req->closeCursor();

        return $donnees;
    } // selectTwoParam()

    /**
     * Function addUser()
     *
     * Ajoute un utilisateur dans la base de donnees a l'aide des infos fournis
     * @param string $Nom Le nom de l'utilisateur
     * @param string $Nom Le prenom de l'utilisateur
     * @param int $Age L'age de l'utilisateur
     * @param int $Tel Le tel de l'utilisateur
     * @param string $Mail L'adresse mail de l'utilisateur
     * @param string $Pass Le mot de passe non hasher
     */
    function addUser($Nom,$Prenom,$Age,$Sexe,$Pass,$Tel,$Mail,$Permis) {
        $req = self::$bdd->prepare("INSERT INTO `user`
            (nom, prenom, age, sexe, mdp, tel, mail, permis, dateinscription)
             VALUES (?,?,?,?,?,?,?,?,?)");
        $Pass = sha1($Pass);
        $req->execute(array($Nom,$Prenom,$Age,$Sexe,$Pass,$Tel,$Mail,$Permis,date('Y/m/j')));
        $req->closeCursor();
    } // addUser()

    /**
     * Function addeffectue()
     *
     * Ajoute un utilisateur dans la base de donnees a l'aide des infos fournis
     * @param string $Nom Le nom de l'utilisateur
     * @param string $Nom Le prenom de l'utilisateur
     * @param int $Age L'age de l'utilisateur
     * @param int $Tel Le tel de l'utilisateur
     * @param string $Mail L'adresse mail de l'utilisateur
     * @param string $Pass Le mot de passe non hasher
     */
    function addeffectue($idtrajet,$iduser) {
        $req = self::$bdd->prepare("INSERT INTO `effectue`
            (idtrajet, iduser)
             VALUES (?,?)");
        $req->execute(array($idtrajet,$iduser));
        $req->closeCursor();
    } // addeffectue()

    /**
     * Function addTrajet()
     *
     * Ajoute un trajet dans la base de donnees a l'aide des infos fournis
     * @param int $ID_C L'identifant de l'utilisateur
     * @param string $VilleDep Le nom de la ville de depart
     * @param string $VilleArr Le nom de la ville d'arriver
     * @param int $Prix Le prix du trajet
     * @param int $NbrPlace Le nombre de place du trajet
     * @param int $HeureDep L'heure du depart du trajet
     * @param int $HeureArr L'heure d'arriver du trajet
     * @param string $Vehicule Le nom du vehicule
     */
    function addTrajet($Date,$VilleDep,$VilleArr,$HeureDep,$Prix,$NbrPlace,$nonfumeur,$musique,$valise,$bavar,$com,$idauteur,$idvehicule) {
        $req = self::$bdd->prepare("INSERT INTO trajet (date,villedep,villearr,heuredep,prix,nbplace,nonfumeur,musique,valise,bavar,com,idauteur,idvehicule) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $req->execute(array($Date,$VilleDep,$VilleArr,$HeureDep,$Prix,$NbrPlace,$nonfumeur,$musique,$valise,$bavar,$com,$idauteur,$idvehicule));

        $req->closeCursor();
    } // addUser()


    /**
     * Function update()
     *
     * Met a jour la valeur de l'attribut passer en parametre, pour le tuple respectant la condition
     * elle aussi donnee en parametre
     * @param string $att Le nom de l'attribut a modifier (ex: "Age")
     * @param mixed $att_val La valeur de l'attribut a modifier' (ex: 19)
     * @param string $cond_att Le nom de la colonne (ex: "NOM")
     * @param mixed $cond_val La valeur de la colonne rechercher (ex: "Jean")
     */
    function update($att,$att_val,$cond_att,$cond_val) {
        
        $req = self::$bdd->prepare("UPDATE $this->table SET $att = ? WHERE $cond_att = ?");

        $req->execute(array($att_val,$cond_val));

        $req->closeCursor();
    } // update()

    /**
     * Function inc()
     *
     * Met a jour la valeur de l'attribut passer en parametre, pour le tuple respectant la condition
     * elle aussi donnee en parametre
     * @param string $att Le nom de l'attribut a modifier (ex: "Age")
     * @param string $cond_att Le nom de la colonne (ex: "NOM")
     * @param mixed $cond_val La valeur de la colonne rechercher (ex: "Jean")
     */
    function inc($att,$cond_att,$cond_val) {
        
        $req = self::$bdd->prepare("UPDATE $this->table SET $att = $att + 1 WHERE $cond_att = ?");

        $req->execute(array($cond_val));

        $req->closeCursor();
    } // inc()

    /**
     * Function decr()
     *
     * Met a jour la valeur de l'attribut passer en parametre, pour le tuple respectant la condition
     * elle aussi donnee en parametre
     * @param string $att Le nom de l'attribut a modifier (ex: "Age")
     * @param string $cond_att Le nom de la colonne (ex: "NOM")
     * @param mixed $cond_val La valeur de la colonne rechercher (ex: "Jean")
     */
    function decr($att,$cond_att,$cond_val) {
        
        $req = self::$bdd->prepare("UPDATE $this->table SET $att = $att - 1 WHERE $cond_att = ?");

        $req->execute(array($cond_val));

        $req->closeCursor();
    } // decr()

    /**
     * Function delete()
     *
     * Supprime le tuple pour la condition donnee
     * @param string $cond_att Le nom de la colonne (ex: "NOM")
     * @param mixed $cond_val La valeur de la colonne rechercher (ex: "Jean")
     */
    function delete($cond_att,$cond_val = null) {
    
        $req = self::$bdd->prepare("DELETE FROM $this->table WHERE $cond_att = ?");

        $req->execute(array($cond_val));

        $req->closeCursor();
    } // delete()

    function deleteTwoParam($cond_att,$cond_val = null,$cond_att2,$cond_val2 = null) {
        $req = self::$bdd->prepare("DELETE FROM $this->table WHERE $cond_att = ? AND $cond_att2 = ?");

        $req->execute(array($cond_val,$cond_val2));

        $req->closeCursor();
    }

    /**
     * Function isInBd()
     *
     * Renvoie vrai ou faux si le tuple est présent dans la base pour la condition donnée
     * @param string $cond_att Le nom de la colonne (ex: "NOM")
     * @param mixed $cond_val La valeur de la colonne rechercher (ex: "Jean")
     */
    function isInDb($cond_att,$cond_val)
    {
        $req = self::$bdd->prepare("SELECT COUNT(*) as nbr FROM $this->table WHERE $cond_att = ?");
        $req->execute(array($cond_val));
        $donnees = $req->fetch(PDO::FETCH_OBJ);
        if ($donnees->nbr)
        {
            $req->closeCursor();
            return true;
        }
        else
        {
            $req->closeCursor();
            return false;
        }
    } // isInDb()

    /**
     * Function addVehicule()
     *
     * Ajoute un utilisateur dans la base de donnees a l'aide des infos fournis
     * @param string $Marque La marque du véhicule
     * @param string $Model Le modèle du véhicule
     * @param int $NbPlace Nombre de place
     */
    function addVehicule($Marque,$Model,$NbPlace,$Iduser) {
        $req = self::$bdd->prepare("INSERT INTO `vehicule`
            (marque, model, nbplace, iduser)
             VALUES (?,?,?,?)");
        $req->execute(array($Marque,$Model,$NbPlace,$Iduser));
        $req->closeCursor();
    } // addVehicule()

    /**
     * Function addMessage()
     *
     * Ajoute un message dans la base de donnees a l'aide des infos fournis
     * @param intval    $IdMessage          L'id du message
     * @param string    $Message            Le contenu du message
     * @param date      $Date               Date du message
     * @param int       $IdAuteur           Id de l'auteur du message
     * @param int       $IdDestinataire     Id du destinataire du message
     */
    function addMessage($Message, $IdAuteur, $IdTrajet) {
        $req = self::$bdd->prepare("INSERT INTO `message`
            (message, date, idauteur, idtrajet)
             VALUES (?,?,?,?)");
        $req->execute(array($Message, date('y/m/d H:i:s'), $IdAuteur, $IdTrajet));
        $req->closeCursor();
    } // addMessage()

    /**
     * Function getConversations()
     *
     * Récupère les conversations et les informations associées pour un IdUser donné
     */
    function getConversations($IdUser) {

        $req = self::$bdd->prepare("SELECT DISTINCT trajet.idtrajet, trajet.date, villedep, villearr FROM trajet, message WHERE trajet.idtrajet = message.idtrajet AND message.idauteur = ?
                                    UNION
                                    SELECT DISTINCT trajet.idtrajet, trajet.date, villedep, villearr FROM trajet WHERE trajet.idauteur = ?
                                    UNION
                                    SELECT DISTINCT trajet.idtrajet, trajet.date, villedep, villearr FROM trajet, effectue WHERE trajet.idtrajet = effectue.idtrajet AND effectue.iduser = ?");

        $req->execute(array($IdUser, $IdUser, $IdUser));
        while($donnees[] = $req->fetch(PDO::FETCH_OBJ));

        $req->closeCursor();

        return $donnees;
    } // getConversations()

    /**
     * Function getMessages()
     *
     * Récupère les messages pour un trajet donné
     */
    function getMessages($IdTrajet) {

        $req = self::$bdd->prepare("SELECT message.idauteur, nom, prenom, avatar, message.date, message FROM trajet, message, user WHERE trajet.idtrajet = message.idtrajet AND message.idauteur = iduser AND trajet.idtrajet = ? ORDER BY message.date ASC");

        $req->execute(array($IdTrajet));
        
        while($donnees[] = $req->fetch(PDO::FETCH_OBJ));

        $req->closeCursor();

        return $donnees;
    } // getMessages()

    /**
     * Function getMessagesDesc()
     *
     * Récupère les messages pour un trajet donné dans l'ordre DESC
     */
    function getMessagesDesc($IdTrajet) {

        $req = self::$bdd->prepare("SELECT message.idauteur, nom, prenom, message.date, message FROM trajet, message, user WHERE trajet.idtrajet = message.idtrajet AND message.idauteur = iduser AND trajet.idtrajet = ? ORDER BY message.date DESC");

        $req->execute(array($IdTrajet));
        
        $donnees = $req->fetch(PDO::FETCH_OBJ);

        $req->closeCursor();

        return $donnees;
    } // getMessagesDesc()


} // class bd()

?>