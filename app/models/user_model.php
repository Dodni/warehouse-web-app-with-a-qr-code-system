<!-- user_model.php -->

<?php
class UserModel {
    // Ide jönnek az adatbáziskapcsolathoz szükséges részek

    public function getUserByUsername($username) {
        // Itt lehetőség van egy adatbáziskérésre, hogy lekérdezzük a felhasználó adatait
        // Ez csak egy példa, valódi adatbázis-kapcsolat szükséges
        $users = [
            ['id' => 1, 'username' => 'valós_felhasználónév', 'password' => '$2y$10$MwU4OrI'],
            // További felhasználók adatai
        ];

        // Keresd meg a felhasználót a felhasználónév alapján a valós adatokban
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }

        return null; // Ha nem található a felhasználó
    }
}
?>
