<?php
//When the session starts we are able to retrieve data to check if the users is logged in or not
session_start();
require "./src/connect-db.php";
require "./src/Model/Review.php";
require "./src/Model/Movie.php";
require "./src/Model/WishList.php";
require "./src/Repository/MovieRepository.php";
require "./src/Repository/ReviewRepository.php";
require "./src/Repository/WishListRepository.php";

//Getting the id of the movie that the user clicked on the index page
$id = $_GET['id'];


//Instanciate the Repository where thre are the PDO to connect to the database and methods that will brings data from the database
$reviewRepository = new ReviewRepository($pdo);
$movieRepository = new MovieRepository($pdo);
$wishListRepository = new WishListRepository($pdo);

//Passing as paramenter the id that has been gotten above so you can use the somemethods to retireve data from ReviewRepository and MovieRepositiry
$dataReview = $reviewRepository->review($id);
$movieId = $movieRepository->movieId($id);
$reviewMovie = $reviewRepository->rating($id);
$watchListDisplay = $wishListRepository->watchListDisplayInfo();


//Registering a new review object into the database   
if (isset($_POST['watchlist'])) {
   
    //Intaciating a Review object and passing in the contructor the data to populate the review column in the database
    $watchList = new WishList(null, 
    $_POST['movieid'],
    $_POST['ctid'],
    $_POST['useremail']);

    //Instanciate the Repository where thre are the PDO to connect to the database and methods that will brings data from the database
    $wishListRepository = new WishListRepository($pdo);
    $wishList= $wishListRepository -> wishList($watchList);
    
    //When register is done, user is redirected to the index page
    header("Location: wishlist.php");
 }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/reset.css">
    <title>Hey Movies</title>
    <!-- BOOTSTRAP - ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/movie.css">
</head>

<body>
    <div class="divider-nav-to-main"></div>

    <!-- Bring the menu to the page -->
    <?php require "./partials/nav.php"?>

    <div class="container mx-auto d-block">

        <div class="">
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
                    <div class="container-movie-info">
                        <div class="container-tags-list">
                            <ul class="tag-list">
                                <li>
                                    <div class="genre">
                                        <i class="fa fa-comments"><?= $dataMovie->getMovieGenere() ?></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="streming">
                                        <i class="fa fa-comments"><?= $dataMovie->getStreamingService() ?></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="year">
                                        <i class="fa fa-comments"><?= $dataMovie->getMovieReleaseYear() ?></i>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <hr>
                        <div class="container-description">
                            <div class="bullet-style">
                                <span class="bullet"></span>
                                <h2 class="sub-title">Description:</h2>
                            </div>
                            <p class="content"><?= $dataMovie->getMovieDescription() ?></p>
                        </div>

                        <div class="container-description">
                            <div class="bullet-style">
                                <span class="bullet"></span>
                                <h2 class="sub-title">Director:</h2>
                            </div>
                            <p class="content"><?= $dataMovie->getMovieDirector() ?></p>
                        </div>

                        <div class="container-description">
                            <div class="bullet-style">
                                <span class="bullet"></span>
                                <h2 class="sub-title">Main Actors:</h2>
                            </div>
                            <p class="content"><?= $dataMovie->getMovieMainActors() ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="container ps-0">
            <div class="container-review">
                <div class="container-review-content">
                    <div class="bullet-style">
                        <span class="bullet"></span>
                        <h2 class="sub-title">Reviews</h2>
                        <div class="container-rating">
                            <i><i class="bi bi-star-fill"></i></i>
                            <!-- Retreiving from the databse the average Rating -->
                            <p class="content"><?php echo $reviewMovie["AverageRating"] ?> / 5</p>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="container-add-review">
                           <!-- <input type="text"  value="teste" name="useremail"> -->
                            <?php foreach ($watchListDisplay as $dataMovie) : ?>
                            <input type="hidden"  value="<?=$dataMovie->getMovieId()?>" name="movieid">
                                <input type="hidden"  value="<?=$dataMovie->getCustomerId()?>" name="ctid">
                                <?php endforeach; ?>
                                <!-- <input type="submit" name="watchlist" value="Add to my Watch List"> -->
                                <a href="wishlist.php?id=<?= $id?>" class="btn btn-primary btn-sm">View my wish List</a>
                            </div>
                    </form>

                    <!-- Loop that will retrive the movie id, so we can use it to pass the id trhough the href link to the page_review  -->
                    <?php foreach ($movieId as $dataMovie) : ?>
                        <a href="./page_review.php?id=<?= $dataMovie->getId() ?>">
                            <div class="container-add-review">
                                <i class="bi bi-plus-square-fill"></i>
                                <p class="content">Add a Review for this ttile</p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>

                <?php foreach ($dataReview as $review) : ?>
                    <!-- Loop that will retrive from the database colunm reviews the comments and name -->
                    <div class="container-reviews">
                        <div class="review-username">
                            <p class="content-review">Name:</p>
                            <p class="content-review"><?= $review->getName() ?></p>
                        </div>
                        <p class="review"><?= $review->getComments() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- END CONTAINER CONFIG -->
    <br>
    <br>
    </div>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2021 Hey Movie Review. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>