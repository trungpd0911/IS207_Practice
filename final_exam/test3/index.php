<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ques 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php require('navbar.php'); ?>
    <div class="d-flex justify-content-center mt-3">
        <div class="card border-1 shadow p-3" style="width: 600px; font-size: 16px;">
            <form action="controller.php" method="POST">
                <input type="hidden" name="action" value="addTour">
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <h3>Thêm tour du lịch</h3>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Mã tour : </div>
                    <input type="text" class="form-control" name="tourId" placeholder="Nhập mã tour">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;  ">Tên tour : </div>
                    <input type="text" class="form-control" name="tourName" placeholder="Nhập tên tour">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;  ">Ngày khởi hành : </div>
                    <input type="date" class="form-control" name="tourBeginDate">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Số ngày : </div>
                    <input type="text" class="form-control" name="dayCount" placeholder="Nhập số ngày">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Số đêm : </div>
                    <input type="text" class="form-control" name="nightCount" placeholder="Nhập số đêm">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Giá : </div>
                    <input type="text" class="form-control" name="price" placeholder="Nhập giá">
                </div>
                <!-- button submit -->
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("ques-1").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>