<?php
if (isset($_POST['pseudo']))
{
    $pseudo = $_POST['pseudo'];
}

if (isset($_POST['message']))
{
    $message = $_POST['message'];
}

try {
    $db = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 'root', 'root');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$write = $db->prepare('INSERT INTO goldbook(pseudo, message) VALUES(:pseudo, :message)');
$write->execute(array(
    'pseudo' => $pseudo,
    'message' => $message
));

header('Location: livredor.php');
?>