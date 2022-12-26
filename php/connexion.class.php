<?php
    class Connexion {
        private $servername;
        private $username;
        private $dbname;
        private $password;
        private $con;

        public function __construct($sn, $db, $un, $pw){
            $this->servername = $sn;
            $this->dbname = $db;
            $this->username = $un;
            $this->password = $pw;
        }

        private function connect(){
            try{
                $this->con = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->username, $this->password);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                $this->con = null;
                return $e->getMessage();
            }
        }

        public function getMaxId(){
            try{
                $this->connect();
                $sql = "SELECT id FROM personne WHERE id=(SELECT max(id) FROM personne)";
                $sth = $this->con->prepare($sql);
                $sth->execute();
                $nbre = $sth->fetch();
                if($nbre){
                    return intVal($nbre[0]) + 1;
                }else{
                    return "new";
                }
            }catch(PDOException $e){
                $this->con = null;
                return $e->getMessage();
            }
        }

        public function getDataPersonne(){
            try{
                $this->connect();
                $sql = "SELECT * FROM personne ORDER BY id";
                $sth = $this->con->prepare($sql);
                $sth->execute();
                $data = $sth->fetchAll();
                return $data;
            }catch(PDOException $e){
                $this->con = null;
                return $e->getMessage();
            }
        }

        public function modifyData($id, $nom, $genre, $ville){
            try{
                $this->connect();
                $sql = "UPDATE personne SET nom=?, genre=?, ville=? WHERE id=?";
                $sth = $this->con->prepare($sql);
                $sth->bindParam(1, $nom);
                $sth->bindParam(2, $genre);
                $sth->bindParam(3, $ville);
                $sth->bindParam(4, $id);
                $sth->execute();
            }catch(PDOException $e){
                $this->con = null;
                echo $e->getMessage();
            }
        }
    }