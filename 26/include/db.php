<?php

/* wersja proceduralna

$conn = mysqli_connect(
    hostname: '127.0.0.1',
    username: 'php',
    password: 'php',
    database: '4Bg2',
    port: '3306'
);

if (mysqli_connect_errno()){
    echo "Failed to connect to mySQL" . mysqli_connect_errno();
} else {
    echo "Connection successful";
}

*/

// wersja obiektowa

$conn = new mysqli(
    hostname: '127.0.0.1',
    username: 'php',
    password: 'php',
    database: '4Bg2',
    port: '3306'
);

if($conn->connect_errno){
    echo "Failed to connect to mySQL" . mysqli_connect_errno();
    die;
}


function storeMessage(string $email, string $message): bool
{
    global $conn;

    $sql = sprintf(
        'INSERT INTO contact_messages (email, message) values ("%s" , "%s")',
        $email,
        $message
    );

    $result = $conn->query($sql);

    $conn->close();

    return $result;
}