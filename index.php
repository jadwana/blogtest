<?php



require('vendor/autoload.php');

use App\Classes\Posts;
// use App\Classes\Comments;
// use \Colors\RandomColor;
// use App\Classes\Enum;
// use App\Classes\Enum\CommentStatus;

// require_once('classes/Posts.php');


// $post1 = new Posts('titre du 1er post','contenu du 1er post');

// $commentStatus = new Comments();

// var_dump($commentStatus);
// if(CommentStatus::APPROBAL_PENDING === $commentStatus->status) echo 'en attente';

// var_dump($post1->getTitle());

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

foreach($posts as $post){

    $post1 = new Posts($post['title'], $post['content'])
    ?>    
    
    
    <p><?='titre ' .$post1->getTitle()?></p> 
    <p><?= 'contenu : '.$post1->getContent()?></p> 
    

    <?php
    }

    ?>
