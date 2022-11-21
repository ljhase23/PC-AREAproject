<!doctype html>
<html lang="ko">
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styletest.css?after">
  </head>
  <body>
    <div class="wrap">
      <div class="intro_bg">
        <div class="header">
          <div class="logo_png" id="home">
            <a href="home.html"> <img src="image/logo.png" width="180px" height="100px">
            </a>
            
          </div>
          <div class="arrow">
            <a href="#home">
            <img src="image/arrow.png" width="50px" height="50px">
            </a>
          </div>
          <div class="searchArea">
            <form>
              <input type="search" placeholder="search">
              <span>검색</span>
            </form>
          </div>
          <ul class="nav">
            <li>
              <a href="home.html">HOME</a>
            </li>
            <li>
              <a href="#about">ABOUT</a>
              <ul class = "dep2">
                <li style = "height: 30px;"><a href="listtest.php"><span class="quary">손님리뷰</span></a></li>
                <li style = "height: 30px;"><a href="listtest2.php"><span class="quary">알바생 모집</span></a></li>
                <li style = "height: 30px;"><a href="pcinfo.html"><span class="quary">PC방 정보</span></a></li>
              </ul>
            </li>
            <li>
              <a href="#news">NEWS</a>
            </li>
            <li>
              <a href="#contact">CONTACT</a>
            </li>
          </ul>
        </div>
        <div class="intro_text">
          <h1>PC방에 대한 모든것</h1>
          <h4 class="contents1">우리 집 주변에있는 PC방 정보를 한 눈에 보기쉽게 보여줍니다</h4>
        </div>
      </div>
    </div>
      <!-- intro end-->
      <!-- 사이드 메뉴-->
      <div class = "wrapper">
        <div class="sidebar">
          <div class="profile">
            <img src="image/human.png" alt = "프로필 사진">
            <h3>관리자</h3>
            <p>관리자 화면</p>
          </div>
          <div>
            <ul>
              <li>
                <a href = "home.html" class= "active">
                  <span class="icon"><i class="fas fa-home"></i></span>
                  <span class="item">홈 화면 바로가기</span>
                </a>
              </li>

              <li>
                <a href="listtest.php">
                  <span class="icon"><i class="minmenu1"></i></span>
                  <span class="item">공지사항</span>
                </a>
              </li>

              <li>
                <a href="listtest2.php">
                  <span class="icon"><i class="minmenu2"></i></span>
                  <span class="item">알바생 모집</span>
                </a>
              </li>

              <li>
                <a href="pcinfo.html">
                  <span class="icon"><i class="minmenu3"></i></span>
                  <span class="item">PC방 정보</span>
                </a>
              </li>

              <li>
                <a href="menu.html">
                  <span class="icon"><i class="minmenu4"></i></span>
                  <span class="item">레시피</span>
                </a>
              </li>
            </ul>
          </div>


        </div>
        <div class="section">
          <div class="top_navbor">
            <div class = "hamburger">
              <a href="#">
                <i class="fas fa-bars"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!--사이드 메뉴 끝-->
      <!-- 좌측사이드 광고 시작-->

      <div class = "addbor">
        <ul>
          <li>
            <a href="https://www.11st.co.kr/" target="_blank">
              <img src="image/11st.png" alt="광">
            </a>
          </li>
          <li>
            <a href="https://www.coupang.com/" target="_blank">
              <img src="image/coupang.jpeg" alt="고">
            </a>

          </li>
          <li>
            <a href="https://www.musinsa.com/" target="_blank">
              <img src="image/munsinsa.png" alt="배">
            </a>
          </li>
          <li>
            <a href="https://www.kurly.com/" target="_blank">
              <img src="image/kurly.png" alt="너">
            </a>
          </li>
        </ul>
      </div>
      <!--게시판-->
      <div class=" board_wrap">
        <div class="board_title">
          <strong> 알바생 모집</strong>
          <p> PC방에 직원이 필요하세요? 구인글을 작성해보세요 </p>
        </div>
        <div class="board_list_wrap">
          <table class="list-table">
            <thead>
                <tr>
                    <th width="70">번호</th>
                      <th width="500">제목</th>
                      <th width="120">글쓴이</th>
                      <th width="100">작성일</th>
                      <!-- 추천수 항목 추가 -->
                      <th width="100">조회수</th>
                      <th width="100">추천수</th>
                  </tr>
              </thead>

              <?php
              $host = "localhost";
              $user = "pcarea";
              $pw = "carnival23!";
              $dbName = "pcarea";

              $conn = new mysqli($host, $user, $pw, $dbName);

              function query($query){
                global $conn;
                return $conn->query($query);
              }
  
              $conn = new mysqli($host, $user, $pw, $dbName);
              // board테이블에서 idx를 기준으로 내림차순해서 10개까지 표시
                $sql = query("select * from pcarea_job order by notice_number desc limit 0,10"); 
                  while($pcarea_job = $sql->fetch_array())
                  {
                    //title변수에 DB에서 가져온 title을 선택
                    $title=$pcarea_job["notice_title"]; 
                    if(strlen($title)>30)
                    { 
                      //title이 30을 넘어서면 ...표시
                      $title=str_replace($pcarea_job["notice_title"],mb_substr($pcarea_job["notice_title"],0,30,"utf-8")."...",$pcarea_job["notice_title"]);
                    }
              ?>
            <tbody>
              <tr>
                <td width="70"><?php echo $pcarea_job['notice_number']; ?></td>
                <td width="500"><a href="read2.php?notice_number=<?php echo $pcarea_job['notice_number']?>"><?php echo $title;?></a></td>
                <td width="120"><?php echo $pcarea_job['notice_writer']?></td>
                <td width="100"><?php echo $pcarea_job['date']?></td>
                <td width="100"><?php echo $pcarea_job['notice_view']; ?></td>
                <!-- 추천수 표시해주기 위해 추가한 부분 -->
                <td width="100"><?php echo $pcarea_job['notice_suggest']?></td>
              </tr>
            </tbody>
            <?php } ?>
          </table>
          <div id="write_btn">
          <a href="write2.php"><button>글쓰기</button></a>
          </div>
          <div class="board_page">
            <a href="#" class="bt first"> << </a>
            <a href="#" class="bt prev"> < </a>
            <a herf="#" class="num on">1</a>
            <a herf="#" class="num">2</a>
            <a herf="#" class="num">3</a>
            <a herf="#" class="num">4</a>
            <a herf="#" class="num">5</a>
            <a href="#" class="bt next"> > </a>
            <a href="#" class="bt last"> >> </a>
          </div>

          <div class="bt_wrap">
            <a href="listtest2.php" class="on">목록</a>
            <a href="listtest2.php">새로고침</a>

          </div>
        </div>

      </div>

      
      <div class="footer">
        <div>LOGO</div>
        <div>
          CEO. 김민철 <br>
          경기도 남양주시 평내동 어딘가<br>
          010 - 3239 -9796 <br>
          COPYRIGHT 2019. TAMO. ALL RIGHT RESERVED.
        </div>
      </div>
  </body>
</html>