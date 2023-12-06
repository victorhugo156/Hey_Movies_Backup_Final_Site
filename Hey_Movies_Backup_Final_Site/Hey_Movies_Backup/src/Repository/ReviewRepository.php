<?php 

class ReviewRepository{

   private PDO $pdo;

   public function __construct(PDO $pdo)
   {
      $this->pdo = $pdo;
   }

   public function review($id): array
   {
      $sql1 = "SELECT * FROM reviews WHERE Movies_ID = $id";
      $statement = $this->pdo->query($sql1);
      $dataInfoReview = $statement->fetchAll(PDO::FETCH_ASSOC);

      $dataReview = array_map(function($review) {
      return new Review($review['Reviews_ID'], $review['Customer_username'], $review['rating'], $review['comments'], $review['Movies_ID'], $review['Customer_ID'], $review['customer_email']);
   }, $dataInfoReview);

   return $dataReview;
   }

   public function getId($id): array
   {

      $sql = "SELECT * FROM movies WHERE Movies_ID = $id";

      $statement = $this->pdo->query($sql);

      $dataIdsMovie = $statement->fetchAll(PDO::FETCH_ASSOC);

      $idMovie = array_map(function($id) {
      return new Movie($id['Movies_ID'], $id['Movies_title'], $id['Movies_Description'], $id['Movies_Releaseyear'], $id['Movies_language'], $id['Movies_Genre'], $id['Movies_Classification'], $id['Movies_Mainactors'], $id['Movies_director'], $id['Movies_Sourceinformation'], $id['Streaming_service'], $id['image_url'], $id['image2_url'], $id['Youtube_ID']
   );
   }, $dataIdsMovie);

   return $idMovie;
   }

   public function saveData(Review $data){

      $sql = "INSERT INTO `reviews` ( `Reviews_ID`, `Customer_username`, `rating`, `comments`, `Movies_ID`, `Customer_ID`) VALUES ( ?, ?, ?, ?, ?, ? )";
      //$sql = "INSERT INTO reviews ( Reviews_ID, Customer_username, rating, comments, Movies_ID, Customer_ID) VALUES ( ?, ?, ?, ?, ?, ? )";


      // $sql = "INSERT INTO reviews (Customer_username, rating, comments, Movies_ID, Customer_ID) VALUES(?,?,?,?,?)";
      $statement = $this->pdo->prepare($sql);
      
      $statement->bindValue(1, $data->getId());
      $statement->bindValue(2, $data->getName());
      $statement->bindValue(3, $data->getRate());
      $statement->bindValue(4, $data->getComments());
      $statement->bindValue(5, $data->getMovieId());
      $statement->bindValue(6, $data->getCustomerId());
      $statement->execute();
   }


   public function rating($id): array
   {

      $sql = "SELECT AVG(rating) AS AverageRating FROM reviews WHERE Movies_ID = $id";

      $statement = $this->pdo->query($sql);

      $dataRating = $statement->fetch(PDO::FETCH_ASSOC);

   return $dataRating;
   }

   /*

   public function wishList(Review $data){

      $sql = "INSERT INTO wishlist ( `wishlistID`,`Customer_ID`, `Movies_ID`, `customer_email`) VALUES ( ?, ?, ?, ?)";

      //INSERT into wishlist (`wishlistID`, `Customer_ID`, `Movies_ID`, `customer_email`) VALUES (1, 23, 101, 'karah@gmail.com');

      // $sql = "INSERT INTO reviews (Customer_username, rating, comments, Movies_ID, Customer_ID) VALUES(?,?,?,?,?)";
      $statement = $this->pdo->prepare($sql);

      $statement->bindValue(1, $data->get);
      $statement->bindValue(1, $data->getCustomerId());
      $statement->bindValue(2, $data->getMovieId());
      $statement->bindValue(3, $data->getCustomerEmail());
      $statement->execute();
   }

   public function watchListDisplay($email): array
   {
      $sql1 = "SELECT * FROM wishlist WHERE customer_email = $email";
      $statement = $this->pdo->query($sql1);
      $dataInfoReview = $statement->fetchAll(PDO::FETCH_ASSOC);

      $dataReview = array_map(function($review) {
      return new Review($review['Reviews_ID'], $review['Customer_username'], $review['rating'], $review['comments'], $review['Movies_ID'], $review['Customer_ID'], $review['customer_email']);
   }, $dataInfoReview);

   return $dataReview;
   }*/

}
?>