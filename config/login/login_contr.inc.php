<?php

declare(strict_types=1);


function is_input_empty(string $email, string $pwd){
    if( !$email || !$pwd){
        return true;
    }
    return false;
}

# check email used ?

function get_by_email(PDO $pdo, string $email){
    $sql = "SELECT * FROM user_table WHERE email = :email;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    return $res;
}
function is_email_exist(bool|array $results){
    if(!$results) return false;
    return true;
}


function is_password_wrong(string $pwd, string $hashedPwd){
    if(password_verify($pwd,$hashedPwd)){
        return false;
    }
    return true;
}