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
                <h1>예약 확인 페이지입니다</h1>
                <hr>
                <?php
                $con = mysqli_connect("localhost","dkstjdgh98","1234","buspj");
                $sql = "SELECT T.t_id, T.departure,T.arrival,T.departure_date,T.departure_time,T.class,T.seats,B.charge,B.bus_no
                FROM TICKETING T join BUS B
                on T.class = B.class 
                GROUP BY t_id desc limit 1";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_assoc($result)) {



                    echo "예약 번호는 ".$row['t_id']." 입니다."."<br>";
                    echo "출발 지역은 ".$row['departure']." ";
                    echo "도착 지역은 ".$row['arrival']." 입니다."."<br>";
                    echo "출발 날짜와 시간은 ".$row['departure_date']." ";
                    echo " ".$row['departure_time']." 입니다."."<br>";
                    echo "터미널 번호는 ".$row['bus_no']."번 입니다."."<br>";
                    echo "버스 등급은 ".$row['class']."버스 입니다."."<br>";
                    echo "버스 좌석은 ".$row['seats']."번 입니다."."<br>";
                    echo "총 요금은 ".$row['charge']."원 입니다."."<br>";
                
                }

                print "<br><a href='busmainpage.html'>메인 화면으로</a>";
                ?>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
