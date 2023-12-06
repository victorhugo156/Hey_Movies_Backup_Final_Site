<?php 

class WishListRepository{

   private PDO $pdo;

   public function __construct(PDO $pdo)
   {
      $this->pdo = $pdo;
   }

   public function watchListDisplayInfo(): array
   {
      $sql1 = "SELECT * FROM `wishlist`";
      $statement = $this->pdo->query($sql1);
      $dataInfoReview = $statement->fetchAll(PDO::FETCH_ASSOC);

      $dataReview = array_map(function($review) {
      return new WishList($review['wishlistID'], $review['Customer_ID'], $review['Movies_ID'], $review['customer_email']);
   }, $dataInfoReview);

   return $dataReview;
   }

   public function watchListDisplay($email): array
   {
      $sql1 = "SELECT * FROM wishlist WHERE customer_email = $email";
      $statement = $this->pdo->query($sql1);
      $dataInfoReview = $statement->fetchAll(PDO::FETCH_ASSOC);

      $dataReview = array_map(function($review) {
      return new WishList($review['wishlistID'], $review['Customer_ID'], $review['Movies_ID'], $review['customer_email']);
   }, $dataInfoReview);

   return $dataReview;
   }


   public function wishList(WishList $data){

      $sql = "INSERT INTO wishlist ( `wishlistID`,`Customer_ID`, `Movies_ID`, `customer_email`) VALUES ( ?, ?, ?, ?)";

      //INSERT into wishlist (`wishlistID`, `Customer_ID`, `Movies_ID`, `customer_email`) VALUES (1, 23, 101, 'karah@gmail.com');

      // $sql = "INSERT INTO reviews (Customer_username, rating, comments, Movies_ID, Customer_ID) VALUES(?,?,?,?,?)";
      $statement = $this->pdo->prepare($sql);

      $statement->bindValue(1, $data->getWishListId());
      $statement->bindValue(2, $data->getCustomerId());
      $statement->bindValue(3, $data->getMovieId());
      $statement->bindValue(4, $data->getUserEmail());
      $statement->execute();
   }

}

?>