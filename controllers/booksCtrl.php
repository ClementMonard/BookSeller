<?php
//Déclaration du tableau pour stocker les messages d'erreur
$formErrorComment = [];

//Instanciation des classes
$books = new books();
$comments = new comments();


//Si l'id existe et qu'il est de type numérique
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    //Attribition de l'id récupéré grâce au get dans l'attribut id de la classe books
    $books->id = $_GET['id'];
    //Attribition de l'id récupéré grâce au get dans l'attribut idBook de la classe comments  
    $comments->idBook = $_GET['id'];
    //Stockage des données de la méthode detailsBooksById() dans $displayAllComments
    $displayDetailsOfBooks = $books->detailsBooksById();
    //Stockage des données de la méthode displayCommentsByBook() dans $displayAllComments    
    $displayAllComments = $comments->displayCommentsByBook();

}

if (isset($_POST['submitComment'])) {
    if (isset($_POST['message'])) {
        //Conversion des caractères spéciaux en entités HTML pour la sécurité
        $message = htmlspecialchars($_POST['message']);
        //Si le champ n'est pas complété, affiche un message d'erreur
        if (empty($message)) {
            $formErrorComment['message'] = 'Champs obligatoire';
        }
    }
    //Si la comptabilisation du tableau d'erreur est de 0
    if (count($formErrorComment) == 0) {
    //Attribution de la valeur de la variable $message dans l'attribut message de la classe comments    
    $comments->message = $message;
    //Attribution de l'id récupéré grâce au get dans l'attribut id_DZOPD_books(clé étrangère) qui permettra de lier le livre a ce commentaire
    $comments->id_DZOPD_books = $_GET['id'];
    //Attribution de l'id récupéré grâce à la superglobal $_SESSION dans l'attribut id_DZOPD_users(clé étrangère)
    //Qui permettra de lier le user au commentaire    
    $comments->id_DZOPD_users = $_SESSION['id'];
    //Méthode qui permettra d'insérer le commentaire dans la base de données
    $comments->insertComments();
  }
}
   
?>
