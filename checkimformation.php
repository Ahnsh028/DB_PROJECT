<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>busticketingmainpage</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">빠른 고속버스 예약</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="busmainpage.html">메인 페이지</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.html">로그인</a></li>
                        <li class="nav-item"><a class="nav-link" href="user_create.html">회원가입</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">마이 페이지</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="search.html">예약확인</a></li>
                                <li><a class="dropdown-item" href="cancel.html">예약취소</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>빠른 예약 페이지입니다.</h1>
                <hr>
                <form method="post" action="tc.php">
                    <?php

                    $con = mysqli_connect("localhost","dkstjdgh98","1234","buspj");
                    $departure = $_POST['a1'];
                    $departure = addslashes($departure);
                    $arrival = $_POST['a2'];
                    $arrival = addslashes($arrival);
                    $departure_date = $_POST['a3'];
                    $departure_date = addslashes($departure_date);
                    $departure_time = $_POST['a4'];
                    $departure_time = addslashes($departure_time);

                    $sql = "SELECT * FROM SERVICE_B where departure ='$departure' and arrival = '$arrival' and departure_date = '$departure_date' and departure_time = '$departure_time'";
                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_assoc($result)) {
                        
                        echo "출발 지역은 ".$row['departure']." 입니다."."<br>";
                        echo "도착 지역은 ".$row['arrival']." 입니다."."<br>";
                        echo "출발 날짜는 ".$row['departure_date']." 입니다."."<br>";
                        echo "출발 시간은 ".$row['departure_time']." 입니다."."<br>";

                    }
                    ?>
                    <?php

                    $con = mysqli_connect("localhost","dkstjdgh98","1234","buspj");
                    $class = $_POST['b1'];
                    $seats = $_POST['b2'];

                    $sql = "SELECT * FROM BUS where class = '$class' and seats = '$seats'";
                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_assoc($result)) {
                        
                        echo "터미널 번호는 ".$row['bus_no']."번 입니다."."<br>";
                        echo "버스 등급은 ".$row['class']."버스 입니다."."<br>";
                        echo "버스 좌석은 ".$row['seats']."번 입니다."."<br>";
                        echo "총 요금은 ".$row['charge']."원 입니다."."<br>";

                    }

                    // print "<br><a href='tc.php'>예약 완료</a>";
                    ?>

                    <?php
                    $con = mysqli_connect("localhost","dkstjdgh98","1234","buspj");
                    $departure = $_POST['a1'];
                    $departure = addslashes($departure);
                    $arrival = $_POST['a2'];
                    $arrival = addslashes($arrival);
                    $departure_date = $_POST['a3'];
                    $departure_date = addslashes($departure_date);
                    $departure_time = $_POST['a4'];
                    $departure_time = addslashes($departure_time);
                    $class = $_POST['b1'];
                    $seats = $_POST['b2'];
                    
                    $sql = "insert into TICKETING (
                    departure,
                    arrival,
                    departure_date,
                    departure_time,
                    class,
                    seats
                    )"; 
                    
                    $sql = $sql. "values (
                    '$departure',
                    '$arrival',
                    '$departure_date',
                    '$departure_time',
                    '$class',
                    '$seats'
                    )";

                    if($con
                        ->query($sql)){ 
                        echo '<script>alert("success inserting")</script>'; 
                    }else{ 
                        echo '<script>alert("fail to insert sql")</script>';
                    }
                    mysqli_close($mysqli);
                    ?>
                    <input type="submit" value="예약 확인하기">
                </form>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
