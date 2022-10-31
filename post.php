<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1 post</title>
</head>
<body>
    <?= "id du post : ". $_GET['postId']; ?>
    <?php
    $id = $_GET['postId'];

    //connection datebase
    try{
        $conn = new PDO("mysql:host=localhost;dbname=blogsp", "root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connection réussie";
    }catch(PDOException $e){
        echo "connection ko :". $e->getMessage();
    }

    //on recupère le contenu du post
    $sqlQuery = "SELECT * FROM posts WHERE post_id = $id";
    $poststatement = $conn->prepare($sqlQuery);
    $poststatement->execute();
    $post = $poststatement->fetch();


    
    //on recupère les commentaires du post
    $commentsQuery = "SELECT * FROM comments WHERE post_id =$id";
    $commentstatement = $conn->prepare($commentsQuery);
    $commentstatement->execute();
    $comments = $commentstatement->fetchAll();

    //on recupère le nom et prenom de l'auteur des commentaires
    $commentAuthor ="SELECT * FROM users";
    $commentAuthorstatement = $conn->prepare($commentAuthor);
    $commentAuthorstatement->execute();
    $authors = $commentAuthorstatement->fetchAll();

    ?>

    <p>titre : <?=$post['title'] ;?></p>
    <p>date : <?=$post['date'] ;?></p>
    <p>contenu : <?=$post['content'] ;?></p>
    <p>chapo : <?=$post['chapo'] ;?></p>
    <p>user id : <?=$post['user_id'] ;?></p>
    <?php
    foreach($authors as $author){
        if($post['user_id']== $author['user_id']){
            echo "auteur de l'article : ".$author['surname']. " ".$author['firstName'];
    }
    
    }

    ?>
    <p>commentaires :</p>

    <?php
    foreach($comments as $comment){
        ?>
        
        <p>le : <?= $comment['date'] ?></p>
        <p>contenu : <?= $comment['content'] ?></p>
        <?php
        foreach($authors as $author){
        if($comment['user_id']== $author['user_id']){
            echo "auteur du commentaire : ".$author['surname']. " ".$author['firstName'];
        }
        
        }?>
    <?php
    }
    ?>
</body>
</html>