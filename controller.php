<?php
include "form.php";
include "dbconn.php";
class crud{

    function insert(){
        global $conn;
        if(isset($_POST['submit'])){
            
            $fname= $_POST['fname'];
            $lname= $_POST['lname'];
            $email= $_POST['email'];
            $phone= $_POST['phn'];
            $pass= $_POST['password'];
            $cpass= $_POST['confirm'];

            $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `phone`, `password`, `confirm`)
            VALUES ('$fname', '$lname', '$email', '$phone', '$pass', '$cpass')";

            $stmt= $conn->exec($sql);
        }
    }

    function display(){
        global $conn;
        try {
            $store = "SELECT * FROM users";
            $stmt = $conn->query($store); // Executing the query
    
            if ($stmt) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetching results
                if ($result) {
                  
                    echo "<table class='table table-secondary'>";
                    // Output table header
                    echo "<tr>";
                    foreach(array_keys($result[0]) as $key) {
                        echo "<th>$key</th>";
                    }
                    echo "<th>Delete</th>";
                    echo "<th>Edit</th>";
                    echo "</tr>";
                    
                    // Output table data
                    foreach($result as $row) {
                        echo "<tr>";
                        foreach($row as $value) {
                            echo "<td>$value</td>";
                        }

                        echo "<td>";
                        echo "<a href='?id={$row['id']}'>Delete</a>";
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id={$row['id']}'>Edit</a>";
                        // echo "<a href=' ?id={$row['id']}'>Edit</a>";
                        echo "</td>";
                        echo "</tr>";

                    }
                    echo "</table>";
                } else {
                    echo "No records found";
                }
            } else {
                echo "Error executing query";
            }
        } catch (PDOException $e) {
            // Handle PDO exceptions
            echo "Error: " . $e->getMessage();
        }
    }

    function delete(){
        global $conn;
        if(isset($_GET['id'])){
            $id= $_GET['id'];
            $delete= "DELETE FROM `users` WHERE id=$id";
            $run= $conn->query($delete);
                echo '<script>location.replace("'.$_SERVER ['PHP_SELF'].'");</script>';
           exit();
        }
    }

}

$obj= new crud;
$obj->insert();
$obj->display();
$obj->delete();
?>