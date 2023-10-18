<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <title>Le blog de l'AVBN</title>
   <link href="style.css" rel="stylesheet" />
</head>

<body>
   <?php
   // Connexion à la base de données
   try {
      $database = new PDO(
         'mysql:host=localhost;dbname=blog;charset=utf8',
         'root',
         'root'
      );
   } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
   }
   // We retrieve the 5 last blog posts.
   $statement = $database->query(
      "SELECT id, titre, contenu, DATE_FORMAT(date_creation,
         '%d/%m/%Y à %Hh%imin%ss') AS date_creation_fr
         FROM billets ORDER BY date_creation DESC LIMIT 0, 5"
   );
   $posts = [];
   while (($row = $statement->fetch())) {
      $post = [
         'title' => $row['titre'],
         'french_creation_date' => $row['date_creation_fr'],
         'content' => $row['contenu'],
      ];
      $posts[] = $post;
   }

   require('templates/homepage.php');
   ?>
</body>

</html>