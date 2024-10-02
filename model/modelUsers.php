<?php

include_once("../services/connectionDB.php");

class modelUsers {

    protected $salt = "Tit0s2024";

    public function save($data) {
        try {

            $firstname = htmlspecialchars($data["firstname"], ENT_NOQUOTES);
            $lastname = htmlspecialchars($data["lastname"], ENT_NOQUOTES);
            //Usuário e E-mail = username
            $username = htmlspecialchars($data["username"], ENT_NOQUOTES);
            $password = htmlspecialchars($data["password"], ENT_NOQUOTES);
            $birthday = htmlspecialchars($data["birthday"], ENT_NOQUOTES);
            $cpf = htmlspecialchars($data["cpf"], FILTER_SANITIZE_NUMBER_INT);
            // Permissão
            $permission = htmlspecialchars($data["permission"], ENT_NOQUOTES);

           //Irá chamar a função de criptografia de senha
            $password_secure = $this->tokenize($password);

            $conn = connectionDB::connect();
            $conn->prepare("INSERT INTO tblUsers VALUES(':firstname',':lastname',':username',':password_secure',':birthday',':cpf',':emai', 1,NOW() )");
            $save->bindParam(":firstname", $firstname);
            $save->bindParam(":lastname", $lastname);
            $save->binParam(":username", $username);
            $save->bindParam(":password_secure", $password_secure);
            $save->bindParam(":birthday", $birthday);
            $save->bindParam(":cpf", $cpf);
            $save->bindParam(":email", $email);
            $save->execute();
                         

        } catch (PDOException $e) {
            return false;
        }
    }

    protected function tokenize($value){
        $try {

            $combinedPassword = $value . $this->salt;

            return password_hash($combinedPassword, PASSWORD_BCRYPT);

        } catch (\Thorowable $th) {
            return false;
        }
    }


    private function searchUserByEmail($username) {
        try {

            $conn = connectionDB::connect();
            search = conn->prepare("SELECT id_user FROM tblUser WHERE username = ':username' ");
            search->bindParam(":username", $username);
            $search->bindParam(":username", $username);
            search->execute();
            $result = $search->fetch(PDO:: FETCH_ASSOC );

            return $result;

        } catch(PDOExeception $e)
    }


}
?>