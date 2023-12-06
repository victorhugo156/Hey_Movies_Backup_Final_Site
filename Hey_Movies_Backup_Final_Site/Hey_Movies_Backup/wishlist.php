<?php 
//When the session starts we are able to retrieve data to check if the users is logged in or not
session_start();
require "./src/connect-db.php";
require "./src/Model/Review.php";
require "./src/Model/Movie.php";
require "./src/Model/WishList.php";
require "./src/Repository/MovieRepository.php";
require "./src/Repository/ReviewRepository.php";

//Getting the id of the movie that the user clicked on the index page
$id = $_GET['id'];
$userId;
$userEmail;

// if(isset($_POST['movieid'])){
//    $id = $_POST['movieid'];
//    //$watchList = $reviewRepository->wishList($id);
// }
// if(isset($_POST['ctid'])){
//    $userId = $_POST['ctid'];
// }

// if(isset($_POST['useremail'])){
//    $userEmail = $_POST['useremail'];
// }

//Instanciate the Repository where thre are the PDO to connect to the database and methods that will brings data from the database
//$watchListRepository = new WishListRepository($pdo);
$movieRepository = new MovieRepository($pdo);
$movieId = $movieRepository->movieId($id);

//Passing as paramenter the id that has been gotten above so you can use the somemethods to retireve data from ReviewRepository and MovieRepositiry

//$watchList = $watchListRepository->watchListDisplayInfo();

// var_dump($watchList);
// exit();

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./style/reset.css">
   <title>Document</title>
   <!-- BOOTSTRAP - ICON -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
   <!-- Bring the menu to the page -->
   <?php require "./partials/nav.php"?>
   <main>
      <div class="row">
         <!-- Loop that will populate the Video Trailler and Movie Banner Section-->
         <?php foreach ($movieId as $dataMovie) : ?>
            <div class="container-title-rating">
               <h1 class="title"><?= $dataMovie->getMovieTitle() ?></h1>
            </div>
            <div class="container-midia">
                        <div class="container-banner-img">
                            <img src="<?= $dataMovie->getImageUrl() ?>" class="banner-img" alt="<?= $dataMovie->getMovieTitle() ?>">
                        </div>
                        <div class="embed-responsive embed-responsive-16by9 video">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $dataMovie->getVideoYoutube() ?>" allowfullscreen></iframe>
                        </div>
                    </div>
            <?php endforeach; ?>


   </main>
   <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2021 Hey Movie Review. All rights reserved.</p>
    </footer>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>