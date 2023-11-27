<!-- user_model.php -->

<?php
class UserModel {
    public function getUsers() {
        Database::connect();
        $users = [];
        $result = Database::$connection->query("SELECT * FROM termekek");
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;

        /*
        Meghivas:

        $userModel = new UserModel();
        $users = $userModel->getUsers();
        var_dump($users);

         */
    }

    function getPassword($username) {
        Database::connect();
        $password = [] ;
        //$query = "SELECT felhasznalo_jelszo FROM felhasznalok WHERE felhasznalo_nev = '$username'";
        $result = Database::$connection->query("SELECT * FROM felhasznalok WHERE felhasznalo_nev = '$username'");
        
        while ($row = $result->fetch_assoc()) {
            $password[] = $row;
        }
        //var_dump($password);
        
        return $password;
    }
    
}
?>
