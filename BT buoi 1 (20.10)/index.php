<?php
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = isset($_POST['hoTen']) && $_POST['hoTen'] !== '' ? $_POST['hoTen'] : '<span style="color:red;">Trống (Đã vượt qua required!)</span>';
    $soDienThoai = isset($_POST['soDienThoai']) ? $_POST['soDienThoai'] : 'Không có dữ liệu';
    $role = isset($_POST['role']) ? $_POST['role'] : 'user';
    
    $message = "
        <div style='background: #e1f5fe; padding: 15px; border-radius: 5px; margin-top: 15px;'>
            <h3 style='color: #0288d1; margin-top:0;'>Server đã nhận dữ liệu Request:</h3>
            <p><strong>Họ tên:</strong> $hoTen</p>
            <p><strong>Số điện thoại:</strong> $soDienThoai</p>
            <p><strong>Quyền (Role):</strong> <span style='color: red; font-weight: bold;'>$role</span></p>
        </div>
    ";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Demo Bypass Client Validation</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; }
        .card { background: white; padding: 25px; border-radius: 8px; max-width: 450px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background: #4CAF50; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; font-weight: bold; }
    </style>
</head>
<body>

<div class="card">
    <h2>Form nhập dữ liệu</h2>
    
    <form action="" method="POST">
        <!-- Ô nhập có thuộc tính REQUIRED -->
        <div class="form-group">
            <label>Họ và Tên (Bắt buộc - Required):</label>
            <input type="text" name="hoTen" id="hoTen" required placeholder="Hãy để trống để test">
        </div>

        <!-- Ô nhập bị DISABLED -->
        <div class="form-group">
            <label>Số điện thoại (Bị khóa - Disabled):</label>
            <input type="text" name="soDienThoai" value="0912345678" disabled>
        </div>

        <!-- Trường HIDDEN -->
        <input type="hidden" name="role" value="user">

        <button type="submit">Gửi Form (Submit)</button>
    </form>

    <?php echo $message; ?>
</div>

</body>
</html>