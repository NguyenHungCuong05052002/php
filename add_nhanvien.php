<?php
require_once("./entities/nhansu_model.php");
require_once("./entities/phongban_model.php");
$phongBan = phongban::get();

if (isset($_POST["btnsubmit"])) {
    $Ma_NV = $_POST["Ma_NV"];
    $Ten_NV = $_POST["Ten_NV"]; 
    $Phai = $_POST["Phai"];
    $Noi_Sinh = $_POST["Noi_Sinh"];
    $Ma_Phong = $_POST["Ma_Phong"];
    $Luong = $_POST["Luong"];
   

        $newProduct = new nhanvien($Ma_NV, $Ten_NV, $Phai, $Noi_Sinh, $Ma_Phong, $Luong);

        $result = $newProduct->save();

        if (!$result) {
            header("Location: add_nhanvien.php?failure");
        } else {
            header("Location: add_nhanvien.php?inserted");
        }   
}
?>

<?php
if (isset($_GET["inserted"])) {
    echo "<h2 style='color: green;'>Product Added Successfully!</h2>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form method="post">
  <div class="form-group">
    <label for="Ma_NV">Mã Nhân Viên</label>
    <input type="text" class="form-control" id="Ma_NV" name="Ma_NV" value="<?php echo isset($_POST["Ma_NV"]) ? $_POST["Ma_NV"] : "" ?> " placeholder="Ma_NV">
  </div>
  <div class="form-group">
    <label for="Ten_NV">Tên Nhân Viên</label>
    <input type="text" class="form-control" id="Ten_NV" name="Ten_NV" value="<?php echo isset($_POST["Ten_NV"]) ? $_POST["Ten_NV"] : "" ?> " placeholder="Ten_NV">
  </div>
  <div class="form-group">
    <label for="Phai">Giới Tính</label>
    <input type="text" class="form-control" id="Phai" name="Phai" value="<?php echo isset($_POST["Phai"]) ? $_POST["Phai"] : "" ?> " placeholder="Phai">
  </div>
  <div class="form-group">
    <label for="Noi_Sinh">Nơi Sinh</label>
    <input type="text" class="form-control" id="Noi_Sinh" name="Noi_Sinh" value="<?php echo isset($_POST["Noi_Sinh"]) ? $_POST["Noi_Sinh"] : "" ?> " placeholder="Noi_Sinh">
  </div>
  <div class="form-group">
  <div class="row" >
        <label for="Ma_Phong" >Mã Phòng:</label>
        <select id="Ma_Phong" name="Ma_Phong">
            <option value="">-- Select Mã Phòng --</option>
            <?php
            foreach ($phongBan as $val) {
                echo "<option value=\"" . $val['Ma_Phong'] . "\">" . $val['Ten_Phong'] . "</option>";
            }
            ?>
        </select>
    </div>
    </div>
  <div class="form-group">
    <label for="Luong">Lương</label>
    <input type="text" class="form-control" id="Luong" name="Luong" value="<?php echo isset($_POST["Luong"]) ? $_POST["Luong"] : "" ?> " placeholder="Luong">
  </div>
  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>

