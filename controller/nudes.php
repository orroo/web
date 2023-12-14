<?php
require_once '../model/User.php';
require_once '../connexion.php';

class registerC{
    function addUser($user){
        $sql = "INSERT INTO user
        VALUES (:Username,:Email,:Password,:img,:bio,:country,:phone)";
        $db=config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Username' => $user->getUsername(),
                'Email' => $user->getEmail(),
                'Password' => $user->getPassword(),
                'img' => $user->getimg(),
                'bio' => $user->getbio(),
                'country' => $user->getcountry(),
                'phone' => $user->getphone()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function veriflogin($Username){
        $sql = 'SELECT *FROM user WHERE Username=:Username';
        $rb=config::getConnexion();
        try {
            $query = $rb->prepare($sql);
            $query->execute([
                'Username'=> $Username
            ]);
            $user= $query->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showUser(){
        $sql="SELECT * FROM user";
        $db=config::getConnexion();
        try {
            $user=$db->query($sql);
            return $user;
        } catch (Exception $e) {
            die('Error:'. $e->getMessage());
        }
    }
    function DeleteUser($Username)
    {
        $sql = "DELETE FROM user WHERE Username = :Username";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':Username',$Username);

        try {
            $query->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function UpdateUser($user)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET
                    Password = :Password,
                    Email = :Email,
                    img=:img,
                    bio =:bio,
                    country =:country,
                    phone =:phone
                WHERE Username=:Username'
            );
            
            $query->execute([
                'Username' => $user->getUsername(),
                'Password' => $user->getPassword(),
                'Email' => $user->getEmail(),
                'img'=> $user->getimg(),
                'bio' => $user->getbio(),
                'country' => $user->getcountry(),
                'phone' => $user->getphone()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Updateimg($img,$Username)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET
                    img=:img
                WHERE Username=:Username'
            );
            
            $query->execute([
                'Username' => $Username,
                'img'=> $img
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function UpdateEmail($Email,$Username)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET
                    Email=:Email
                WHERE Username=:Username'
            );
            
            $query->execute([
                'Username' => $Username,
                'Email'=> $Email
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function Updatebio($bio,$Username)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET
                    bio=:bio
                WHERE Username=:Username'
            );
            
            $query->execute([
                'Username' => $Username,
                'bio'=> $bio
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Updatecountry($country,$Username)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET
                    country=:country
                WHERE Username=:Username'
            );
            
            $query->execute([
                'Username' => $Username,
                'country'=> $country
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Updatephone($phone,$Username)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET
                    phone=:phone
                WHERE Username=:Username'
            );
            
            $query->execute([
                'Username' => $Username,
                'phone'=> $phone
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


}
class loginC{
    function login($email, $password){
        $sql = 'SELECT Username as Username , img as img , bio as bio , country as country , phone as phone FROM user WHERE Email=:email AND Password=:password';
        $rb=config::getConnexion();
        try {
            $query = $rb->prepare($sql);
            $query->execute([
                'email'=> $email,
                'password'=> $password
            ]);
            $user= $query->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
 
    function mail($Email, $Username){
        $sql = 'SELECT * FROM user WHERE Email=:Email AND Username=:Username';
        $rb=config::getConnexion();
        try {
            $query = $rb->prepare($sql);
            $query->execute([
                'Email'=> $Email,
                'Username'=> $Username
            ]);
            $user= $query->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}



