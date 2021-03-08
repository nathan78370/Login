<?php

if (isset($_POST['submit']))

{
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $db = new PDO('mysql:host=localhost;dbname=loginsystem','root','');


    foreach($db->query('SELECT * from user') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();



    $sql = "SELECT * FROM user where username = '$username' ";
    $result = $db->prepare($sql);
    $result->execute();

    if($result->rowCount() > 0)
    {

    }
    else
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (username, password) VALUES ('$username','$pass')";
        $req = $db->prepare($sql);
        $req->execute();
        echo "Enregistrement effectué";
        echo('<br />');
        echo $username;
        echo('<br />');
        echo $pass;
    }

}

?>