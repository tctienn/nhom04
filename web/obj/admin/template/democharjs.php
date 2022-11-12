<?php
     require_once ("../../classes/dbConnection.php");
     function bieudo_tien()
     {
        
     
     $dbConnection = new dbConnection();
     $conn = $dbConnection->getConnection();
     //đếm số lượng sản phẩm hiện tại
     $arr=array();
     
    //                 2         3           4           5         6          7         cn
     $days = array( 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday','Sunday');
     //                 0          1          2           3         4         5          6
     foreach($days as $day)
     {  $tong=0;
        $sql = "SELECT * FROM hoadon where `time`= '".date('Ymd',strtotime( $day.' this week'))."' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                 $tong +=$row['money'] ;
            }
        }
         array_push($arr, $tong);
     }

    //  echo date('Y/m/d',strtotime( $day.'Sunday this week'));exit;
    // echo var_dump($arr);exit;

     
    
     
    // echo $tong;
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
    <div style=" width: 100%; border: solid 1px black;">
        <canvas id="myChart"></canvas>
    </div>
    <center><small>thống kê tiền hóa đơn theo tuần</small></center>
    <script>
        const labels = [
            '0',
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
                label: '',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0,<?=$arr[0]?>, <?=$arr[1]?>, <?=$arr[2]?>, <?=$arr[3]?>, <?=$arr[4]?>, <?=$arr[5]?>,<?=$arr[6]?>],
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

<?php
    }

    // bieudo_tien();
?>
