<?php session_start();
  if(!isset($_SESSION['id_user'])){
    header("Location: ../login/login_event_creator.php") ;
  }
include_once('koneksi.php');
$id_event_creator = $_SESSION['id_event_creator'];
$sql_user = "SELECT * FROM `event_creator` WHERE id_event_creator = '{$id_event_creator}'" ;

$eksekusi = mysqli_query($conn, $sql_user);
$hasil = mysqli_fetch_assoc($eksekusi);
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Sponsorship Event</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='se1.png' rel='shortcut icon'> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
* {
  box-sizing: border-box;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
}

html {
  font-family: "Lucida Sans", sans-serif;
}

.header {
  background-color: #9933cc;
  color: #ffffff;
  padding: 15px;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu li {
  padding: 8px;
  margin-bottom: 7px;
  background-color: #b2ede0;
  color: #000000;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.menu li:hover {
  background-color: #71f20f;
}

.aside {
  background-color: #33b5e5;
  padding: 1vw;
  color: #ffffff;
  text-align: center;
  font-size: 1vw;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.footer {
  color: #fefffe;
  text-align: center;
  font-size: 15px;
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #001f00;
  text-align: center;
  padding-top: 0.3vw;
  padding-bottom: 0.3vw;
}

/* For mobile phones: */
[class*="col-"] {
  width: 100%;
}

@media only screen and (min-width: 600px) {
  /* For tablets: */
  .col-s-1 {width: 8.33%;}
  .col-s-2 {width: 16.66%;}
  .col-s-3 {width: 25%;}
  .col-s-4 {width: 33.33%;}
  .col-s-5 {width: 41.66%;}
  .col-s-6 {width: 50%;}
  .col-s-7 {width: 58.33%;}
  .col-s-8 {width: 66.66%;}
  .col-s-9 {width: 75%;}
  .col-s-10 {width: 83.33%;}
  .col-s-11 {width: 91.66%;}
  .col-s-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}
/**table {
  border-collapse: collapse;
  width: 100%;

}

th, td {
  text-align: left;
  padding: 2vw;
  margin-top:1vw;
}
**/
ul li {
  padding: 5px;
  margin-left: 10px;
  color:#cce5ff;
}

ul li:hover {
  background-color: #9ebf0a;
}
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
tr:nth-child(even) {background-color: #f2f2f2;}
.mySlides {display:none;}
</style>
</head>
<body>

        <div class="jumbotron">
                <div class="container text-center">
                  <br/>
                  <h1>Sponsorship Event</h1>      
                  <p>Get Sponsors For Your Event</p>
                </div>
        </div>

<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #001f00;">
  <div class="container-fluid" style="font-weight: bold; ;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="w3-bar-item w3-button w3-theme-l1" href="index.php"><img src="se1.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Event <?php echo $hasil['nama_eo'] ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="read_event.php">Event <?php echo $hasil['nama_eo'] ?></a></li>
            <li><a href="read_event_diajukan.php">Event Diajukan</a></li>
            <li><a href="read_event_diterima.php">Event Di Terima</a></li>
            <li><a href="read_event_ditolak.php">Event Di Tolak</a></li>
          </ul>
        </li>
        <li><a href="read_sponsorship.php">Sponsor</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Rekapitulasi
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="read_jumlah_sponsorship_yang_sering.php">Sponsorship Paling Sering Mendanai</a></li>
            <li><a href="read_sponsorship_berdasarkan_dana.php">Sponsorship Berdasarkan Dana</a></li>
            <li><a href="form_sponsorship_berdasarkan_kategori.php">Sponsorship Berdasarkan Kategori Event</a></li>
            <li><a href="form_event_perperiode.php">Event Tersponsori Berdasarkan Tanggal</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="read_user_umum.php"><span class="glyphicon glyphicon-user"></span> <?php echo $hasil['nama_eo'] ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid"> 
<div class="row" style="margin-top:1em; margin-bottom:10em;">
  
    