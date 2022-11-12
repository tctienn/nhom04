<?php
     require_once ("../../classes/dbConnection.php");
     $dbConnection = new dbConnection();
     $conn = $dbConnection->getConnection();
     //đếm số lượng sản phẩm hiện tại
     $sql = "SELECT * FROM hoadon where `time`= '".date('Ymd')."' ";
     $result = $conn->query($sql);
    //  echo date('Ymd');
    //array tong
    $arr=array();
    // array_push($arr, $tong);
    $tong=0;
     if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
             $tong +=$row['money'] ;
        }
    }
    echo $tong;
    // $date = '2012-10-11';
    // $date= date('Y-m-d');
    // $day  = 1;
    // $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
    // echo date('Y-m-d', strtotime($days[$day], strtotime($date)));
    // $weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    // foreach($weekdays as $day)
    // {
    //     // echo $day;
    //     $day=$day." this week";
    //     echo date("Y-m-d", strtotime($day)). "\n";
    // }
///////////lấy ngày trong tuần hiện tại
    // echo date("YmdH:i:s", strtotime('Friday this week'));exit;
    

    // $weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    // $days = [];
    // foreach($weekdays as $k => $v){
    //     echo $days[$k] = date('d/m/y', strtotime(''.$v.' 0 week')) ." <br>";
    // }exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Document</title>
</head>

<body>
    <div>
        <canvas id="myChart"></canvas>
    </div>
    <script>
        const labels = [
            'thứ 2',
            'thứ 3',
            'thứ 4',
            'thứ 5',
            'thứ 7',
            'CN',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 0, 20, 30, 45],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

</body>

</html>