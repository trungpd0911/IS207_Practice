<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ques 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        thead {
            background-color: #f2f2f2;
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        td,
        th {
            padding: 6px 10px;
        }
    </style>
</head>

<body>
    <?php
    require('navbar.php');
    ?>
    <div class="d-flex justify-content-center mt-3">
        <div class="card border-1 shadow p-3" style="width: 600px; font-size: 16px;">
            <input type="hidden" name="action" value="addDestination">
            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <h3>Số điểm du lịch</h3>
            </div>
            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <div style="min-width: 200px; padding: 0 10px 0 0;  ">Số điểm du lịch đã đi qua : </div>
                <input type="text" class="form-control" name="destinationCount" placeholder="Nhập số điểm du lịch" onkeypress="getDestinationByCount(event)">
            </div>
            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <table>

                </table>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("ques-5").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>