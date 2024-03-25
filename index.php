<?php
require_once("./entities/nhansu_model.php");
?>
<?php
$nhanVien = nhanvien::get();

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet"  crossorigin="anonymous">
</head>

<body>



 
<div class="container-fluid">

    <div class="align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Thông tin nhân viên</h1>
       
    </div>
 <a href="./add_nhanvien.php" >Thêm nhân viên</a>
<table class="table dark">
  <thead style="background-color:green">
    <tr>
    <th >Mã nhân viên</th>
        <th>Tên nhân viên</th>
        <th>Giới tính</th>
        <th>Nơi sinh</th>
        <th>Tên phòng</th>
        <th>Lương</th>
        <th>Hành động</th>
    </tr>
  </thead>
<tbody>
<?php foreach($nhanVien as $val) { ?>
    <tr>
        <td><?php echo $val['Ma_NV']; ?></td>
        <td><?php echo $val['Ten_NV']; ?></td>
        <td><?php $gioitinh = $val['Phai']; $image = ($gioitinh == 'NAM') ? './images/man.png'  : './images/woman.png' ; ?><img style="width: 10%;height:10%" src="<?php echo $image; ?>"></td>
        <td><?php echo $val['Noi_Sinh']; ?></td>
        <td><?php echo $val['Ma_Phong']; ?></td>
        <td><?php echo $val['Luong']; ?></td>
        <td>   
          <a class="btn" href="./update_nhanvien.php" ><i class="fas fa-trash-alt btn-success"></i></a>
        <a class="btn" href="./delete_nhanvien.php" ><i class="fas fa-edit btn-danger"></i></a>
        </td>
    </tr>    
<?php  } ?>
  </tbody>
</table>
</div>


</body>

</html>


<script>
    function confirmDelete() {
        // Display a confirmation dialog
        var confirmDelete = confirm("Are you sure you want to delete this employee?");

        // Check user's choice
        if (confirmDelete) {
            // If user confirms deletion, proceed with the deletion
            return true;
        } else {
            // If user cancels, prevent the default action (deletion)
            return false;
        }
    }
</script>