<?php

        // $inputName = $_POST['name'];
        // $inputTel = $_POST['tel'];
        // $inputMail = $_POST['email'];
        // $inputContact = $_POST['contact']; 
        echo($inputName);
        echo($inputTel);
        echo($inputMail);
        echo($inputContact);


 try{$pdo = new PDO('mysql:host=localhost;dbname=casteria;charset=utf8','root','');
        $query = 'INSERT INTO contacts(name,tel,email,body,created_at)VALUES(:inputName, :inputTel, :inputMail, :inputContact, :now())';
        $pdo->beginTransaction();
        $sth->bindValue(':name',$inputName);
        $sth->bindValue(':tel',$inputTel);
        $sth->bindValue(':email',$inputMail);
        $sth->bindValue(':body',$inputContact);
        $query->execute();

        $pdo->commit();
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }finally{
        $pdo = null;
    }
    // $stmt = $this->dbh->prepare($query);
    // $params = array(':inputName' => 'test', ':inputTel' => '01000001111',':inputMail' => 'xxxxxx@xxxxx.xx.xx', ':inputContact' => 'test');
    header('Location: /contacts/contact-views');

?>