<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <?php require('navbar.php'); ?>
    <div class="d-flex justify-content-center mt-3">

        <form action="controller.php" method="post" class="form">
            <h2>Thêm khách hàng</h2>
            <input type="hidden" name="action" value="create-customer">
            <div class="row">
                <div class="label">
                    <label for="makh"> Mã khách hàng :</label>
                </div>
                <input type="text" class="input" name="makh" placeholder="Mã khách hàng">
            </div>
            <div class="row">
                <div class="label">
                    <label for="tenkh">Tên khách hàng : </label>
                </div>
                <input type="text" class="input" name="tenkh" placeholder="Tên khách hàng">

            </div>
            <div class="row">
                <div class="label">
                    <label for="sdt"> Số điện thoại : </label>
                </div>
                <input type="text" class="input" name="sdt" placeholder="Số điện thoại">

            </div>
            <div class="row">
                <div class="label">
                    <label for="cccn">Căn cước công nhân : </label>
                </div>
                <input type="text" class="input" name="cccn" placeholder="Căn cước công nhân">
            </div>
            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>



    <script>
        document.getElementById("ques-1").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>