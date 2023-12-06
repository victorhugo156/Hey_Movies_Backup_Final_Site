<?php 

class MovieRepository{
   
   private PDO $pdo;

   public function __construct(PDO $pdo)
   {
      $this->pdo = $pdo;
   }


   public function movieCard(): array
   {
      $sql1 = "SELECT * from movies";
      $statement = $this->pdo->query($sql1);
      $dataCardsMovie = $statement->fetchAll(PDO::FETCH_ASSOC);

      $dataMovie = array_map(function($movie) {
      return new Movie($movie['Movies_ID'], $movie['Movies_title'], $movie['Movies_Description'], $movie['Movies_Releaseyear'], $movie['Movies_language'], $movie['Movies_Genre'], $movie['Movies_Classification'], $movie['Movies_Mainactors'], $movie['Movies_director'], $movie['Movies_Sourceinformation'], $movie['Streaming_service'], $movie['image_url'], $movie['image2_url'], $movie['Youtube_ID']
   );
   }, $dataCardsMovie);

   return $dataMovie;
   }

   public function movieImageCarousel(): array
   {
      $sql1 = "SELECT * from movies LIMIT 3";
      $statement = $this->pdo->query($sql1);
      $dataCardsMovie = $statement->fetchAll(PDO::FETCH_ASSOC);

      $dataMovie = array_map(function($movie) {
      return new Movie($movie['Movies_ID'], $movie['Movies_title'], $movie['Movies_Description'], $movie['Movies_Releaseyear'], $movie['Movies_language'], $movie['Movies_Genre'], $movie['Movies_Classification'], $movie['Movies_Mainactors'], $movie['Movies_director'], $movie['Movies_Sourceinformation'], $movie['Streaming_service'], $movie['image_url'], $movie['image2_url'], $movie['Youtube_ID']
   );
   }, $dataCardsMovie);

   return $dataMovie;
   }

   public function movieId($id): array
   {
      $sql1 = "SELECT * FROM movies WHERE Movies_ID = $id";
      $statement = $this->pdo->query($sql1);
      $dataCardsMovie = $statement->fetchAll(PDO::FETCH_ASSOC);

      $dataMovie = array_map(function($movie) {
      return new Movie($movie['Movies_ID'], $movie['Movies_title'], $movie['Movies_Description'], $movie['Movies_Releaseyear'], $movie['Movies_language'], $movie['Movies_Genre'], $movie['Movies_Classification'], $movie['Movies_Mainactors'], $movie['Movies_director'], $movie['Movies_Sourceinformation'], $movie['Streaming_service'], $movie['image_url'], $movie['image2_url'], $movie['Youtube_ID']
   );
   }, $dataCardsMovie);

   return $dataMovie;
   }



   public function search($teste)
   {
         $q = "SELECT * FROM movies WHERE Movies_title LIKE '%$teste%' OR Movies_Genre LIKE '%$teste'";
         $statement = $this->pdo->query($q);
         $dataCardsMovie = $statement->fetchAll(PDO::FETCH_ASSOC);
         $dataMovie = array_map(function($movie) {
            return new Movie($movie['Movies_ID'], $movie['Movies_title'], $movie['Movies_Description'], $movie['Movies_Releaseyear'], $movie['Movies_language'], $movie['Movies_Genre'], $movie['Movies_Classification'], $movie['Movies_Mainactors'], $movie['Movies_director'], $movie['Movies_Sourceinformation'], $movie['Streaming_service'], $movie['image_url'], $movie['image2_url'], $movie['Youtube_ID']
         );
         }, $dataCardsMovie);

         //$sql1 = "SELECT * from movies ";
         //$statement = $this->pdo->query($sql1);
         //$dataCardsMovie = $statement->fetchAll(PDO::FETCH_ASSOC);
         //$movie = [];
/*
         $dataMovie = array_map(function($movie) {
            return new Movie($movie['Movies_ID'], $movie['Movies_title'], $movie['Movies_Description'], $movie['Movies_Releaseyear'], $movie['Movies_language'], $movie['Movies_Genre'], $movie['Movies_Classification'], $movie['Movies_Mainactors'], $movie['Movies_director'], $movie['Movies_Sourceinformation'], $movie['Streaming_service'], $movie['image_url'], $movie['image2_url'], $movie['Youtube_ID']
         );
         }, $dataCardsMovie);

         foreach ($dataMovie as $test){
            $test->getMovieGenere();
         }*/

         return $dataMovie;

/*
         while($movie = $statement->fetch(PDO::FETCH_ASSOC)){
            $mmovie = new Movie($movie['Movies_ID'], $movie['Movies_title'], $movie['Movies_Description'], $movie['Movies_Releaseyear'], $movie['Movies_language'], $movie['Movies_Genre'], $movie['Movies_Classification'], $movie['Movies_Mainactors'], $movie['Movies_director'], $movie['Movies_Sourceinformation'], $movie['Streaming_service'], $movie['image_url'], $movie['image2_url'], $movie['Youtube_ID']);
            
         }
         echo $mmovie->getMovieGenere();*/

      

      // if(isset($_POST[$key_word])){
      //    $search_word = $_POST[$key_word];
      //    $sql1 = "SELECT * FROM movies WHERE keywords LIKE '%$search_word%'";

      //    $statement = $this->pdo->prepare($sql1);
      //    $statement->bindParam('%$search_word%', $search_word, PDO::PARAM_STR);
      //    $statement->execute();

      //    $result = $statement->fetchAll(PDO::FETCH_OBJ);

      //    if(empty($result)){
      //       echo "No result";
      //    }else{ 

      //       foreach ($result as $sreult_search)
      //          $result_search -> name;

      //    }
      // }
   }

   public function rating($id): array
   {

      $sql = "SELECT AVG(rating) AS AverageRating FROM reviews WHERE Movies_ID = $id";

      $statement = $this->pdo->query($sql);

      $dataIdsMovie = $statement->fetch(PDO::FETCH_ASSOC);

      $idMovie = array_map(function($id) {
      return new Movie($id['Movies_ID'], $id['Movies_title'], $id['Movies_Description'], $id['Movies_Releaseyear'], $id['Movies_language'], $id['Movies_Genre'], $id['Movies_Classification'], $id['Movies_Mainactors'], $id['Movies_director'], $id['Movies_Sourceinformation'], $id['Streaming_service'], $id['image_url'], $id['image2_url'], $id['Youtube_ID']
   );
   }, $dataIdsMovie);

   return $dataIdsMovie;
   }

}

?>