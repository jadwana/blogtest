<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>tous les postes</title>
</head>
<body>
    <?php
    //connection datebase
    try{
        $conn = new PDO("mysql:host=localhost;dbname=blogsp", "root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connection réussie";
    }catch(PDOException $e){
        echo "connection ko :". $e->getMessage();
    }

    //on recupère le contenu des posts
    $sqlQuery = 'SELECT * FROM posts';
    $poststatement = $conn->prepare($sqlQuery);
    $poststatement->execute();
    $posts = $poststatement->fetchAll();

    //on affiche chaque post un à un
    foreach($posts as $post){
    ?>    
    
    <p><?='post id '. $post['post_id']?></p> 
    <p><?='titre ' .$post['title']?></p> 
    <p><?= 'contenu : '.$post['content']?></p> 
    <p><?= 'date : '.$post['date']?></p> 
    <p><?= 'user id : '.$post['user_id']?></p> 
    <a href="post.php?postId=<?=$post['post_id']?>">afficher ce post</a> <br> <br>

    <?php
    }

    ?>

</body>
</html>