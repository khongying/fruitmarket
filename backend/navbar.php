<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
<style>
body{
    font-family: 'Kanit', sans-serif;
  }
a.name{
  font-size:16pt;
}
nav#navbar{
  background-color: #000000;
}
</style>
<nav class="navbar navbar-inverse  navbar-fixed-top" id="navbar">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a id="menu-toggle"><img src="logo/menu.png"  /></a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a class="name" href="home.php" style="color: #FFFFFF;"><img src="logo/analytics.png" /> ระบบบริหารจัดการสวนผลไม้</a></li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
          <li>
            <a class="name" class="dropdown-toggle" type="button" data-toggle="dropdown">ยินดีต้อนรับ <?php echo $_SESSION['name_admin']; ?> <img src="logo/chevron-sign-down.png" /></a>
              <ul class="dropdown-menu">
                <li>
                <a href="logout.php" ><img src="logo/off-button.png"  /> Logout</a>
                </li>
              </ul>
          </li>
        </ul>
    </div>
</nav>
