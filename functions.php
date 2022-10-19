<?php include "db.php";

    function createTable(){
        global $connection;
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            $query = "INSERT INTO users(username,password) ";
            $query .= "VALUES('$username','$password')";
            $result = mysqli_query($connection, $query);
        
            if (!$result) {
                die('Query FAILED' . mysqli_error($connection));
            }else{
                echo "record created";
            }
        }
    }
    function showAllData(){
        global $connection;
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('Query FAILED');
        }
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            echo "<option value='$id'>$id</option>";
        }
    }

    function updateTable(){

        global $connection;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id ";
        // $query .= "username = '$username', ";
        // $query .= "password = '$password' ";
        // $query .= "WHERE id = $id ";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }

    function deleteRows(){

        global $connection;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $query = "DELETE FROM users WHERE id = $id ";
        // $query .= "username = '$username', ";
        // $query .= "password = '$password' ";
        // $query .= "WHERE id = $id ";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        }
    }
?>
