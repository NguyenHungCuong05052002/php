
  <td>
                <a href="edit_employee.php?id=<?php echo $employee['Ma_NV']; ?>" class="btn btn-primary">Edit</a>
                <a href="delete_employee.php?id=<?php echo $employee['Ma_NV']; ?>" class="btn btn-danger">Delete</a>
            </td>


<?php
// Include the database connection file
require_once "config/db.class.php";

// Check if employee ID is provided in the URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Get the employee ID from the URL
    $employee_id = $_GET['id'];

    $db = new Db();

    $sql = "DELETE FROM nhanvien WHERE Ma_NV = '$employee_id'";

 
    $result = $db->query_execute($sql);


    if($result) {
        header("Location: index.php?delete_success=true");
        exit;
    } else {
        header("Location: index.php?delete_error=true");
        exit; 
    }
} else {
    header("Location: index.php");
    exit; 
}
?>