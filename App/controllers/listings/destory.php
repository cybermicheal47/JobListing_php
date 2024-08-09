<?php 
use Framework\Database;
$config = require basePath("config/db.php");
$db = new Database($config);

// // Check if the request method is POST and the _method field is 'DELETE'
// $isDelete = $_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'DELETE';

// if ($isDelete) {
//     $id = $_POST['id'] ?? null;

//     // Ensure that an ID was provided
//     if ($id) {
//         $sql = 'DELETE FROM listings WHERE id = :id';

//         $params = [
//             'id' => $id
//         ];

//         // Prepare and execute the delete statement
//         $stm = $db->prepare($sql);
//         $stm->execute($params);

//         // Redirect to the index page after deletion
//         header('Location: index.php');
//         exit();
//     } else {
//         // Handle cases where the ID was not provided
//         echo "No ID provided for deletion.";
//     }
// }


$isDelete = $_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'DELETE';



if ($isDelete) {
        $id = $_POST['id'] ?? null;
    
        // Ensure that an ID was provided
        if ($id) {
            // $query = 'DELETE FROM listings WHERE id = :id';
    
            $params = [
                'id' => $id
            ];
            $listing = $db->query('SELECT * FROM listings WHERE id= :id', $params)->fetch();
        }

        $query = 'DELETE FROM listings WHERE id = :id';
        $db->query($query, $params );

         // Redirect to the index page after deletion
         header('Location: /listings');
         exit();
    }



?>

