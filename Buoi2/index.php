<?php
session_start();


// isset() kiểm tra sự tồn tại của biến.
//if (!isset($_SESSION['students'])): Kiểm tra xem session 'students' đã tồn tại chưa.
//Nếu chưa tồn tại, khởi tạo mảng chứa thông tin sinh viên mẫu.
// Dữ liệu mẫu (thêm vào nếu cần. ngược lại nếu không cần thì để mảng rỗng)
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [ ];
}
// Xử lý tìm kiếm
$students = $_SESSION['students']; // Hiển thị toàn bộ danh sách sinh viên ban đầu
if (isset($_POST['search'])) {
    //isset($_POST['search']): Kiểm tra xem người dùng đã gửi yêu cầu tìm kiếm chưa.
    $search = strtolower($_POST['search']);
    //Lấy từ khóa tìm kiếm từ form và chuyển về chữ thường (không phân biệt hoa/thường).
    $students = array_filter($students, function ($student) use ($search) 
    //nó tìm kiếm từ mảng student
    {
        // Lọc mảng $students để chỉ giữ lại những sinh viên có tên hoặc năm sinh chứa từ khóa tìm kiếm.
        // Nếu muốn lọc thêm id thì thêm chỗ return vào 
        // lệnh || là or
        return strpos(strtolower($student['name']), $search) !== false || 
               strpos(strtolower($student['dob']), $search) !== false;
               // strpos() Tìm vị trí của chuỗi con (từ khóa) trong chuỗi. Nếu tìm thấy, hàm này trả về vị trí, nếu không thì trả về false.
    });
}

// Xử lý xóa sinh viên
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $_SESSION['students'] = array_filter($_SESSION['students'], function ($student) use ($delete_id) {
        return $student['id'] != $delete_id;
    });
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: left;
        }
        table {
            width: 100%;
        }
        th {
            background-color: #f2f2f2;
        }
        .search-bar {
            margin-bottom: 10px;
        }
        .add-new {
            margin-top: 10px;
            text-align: center;
        }
        .search-bar {
            margin-bottom: 10px;
            text-align: center;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <div class="search-bar">
        <form method="post" action="">
            <input type="text" name="search" placeholder="Nhập từ khóa cần tìm">
            <button type="submit">Tìm</button>
            <button type="submit" name="reset">Tất cả</button>
        </form>
    </div>

    <table>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Ngày sinh</th>
            <th>Ngành học</th>
            <th>Tác vụ</th>
        </tr>
        <?php if (!empty($students)): ?>
            <!-- Điều kiện này kiểm tra xem mảng $students có chứa dữ liệu hay không.
              Hàm empty() sẽ trả về true nếu mảng rỗng và false nếu mảng có ít nhất một phần tử. -->
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['name']; ?></td>
                <td><?php echo $student['gender']; ?></td>
                <td><?php echo $student['hometown']; ?></td>
                <td><?php echo $student['dob']; ?></td>
                <td><?php echo $student['major']; ?></td>
                <td>
                    <a href="edit_student.php?id=<?php echo $student['id']; ?>">Sửa</a> |
                    <a href="index.php?delete_id=<?php echo $student['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- else:: Nếu mảng $students rỗng (không có sinh viên), đoạn mã này sẽ được thực hiện. -->
            <tr>
                <td colspan="7">Không tìm thấy sinh viên nào.</td>
            </tr>
        <?php endif; ?>
        <!-- endif;: Kết thúc khối điều kiện if. -->
    </table>

    <div class="add-new">
        <button onclick="window.location.href='add_student.php'">Thêm mới</button>
    </div>
</body>
</html>
