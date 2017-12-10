<?php 
// include database connection 
include 'config/database.php';

try {
    // get record ID 
    // isset() is a PHP function to verify if a value is there or now 
    $id = isset($_GET[id]) ? $_GET['id'] : die('ERROR: Record ID not found');

    // delete query 
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);

    if ($stmt->execute()) {
        // redirect to read records page 
        // tell the user record was deleted
        header('Location: index.php?action=delete');
    } else {
        die('Unable to delete record.');
    }
} catch(PODException $exception) {
    die('ERROR: ' . $exception->getMessage());
}
?>