<!DOCTYPE html>
<html lang='en'>
<?php 
  session_start();
  //------------database communication--------------//
  require_once("connection.php");
  $query = "SELECT * FROM pin_blogs";
  $infos = fetch($query);
?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>USMall美猫商城</title>
    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript">
      $(document).ready( function() {
            //     alert("hhehe");

            // $('#blog_show').imagesLoaded(
            //   function() {
            //     alert("ss");

            //   }
            // );
        // $('.grid').masonry({
        //   columnWidth: 200,
        //   itemSelector: '.grid-item'
        // });
      });
    </script>
    <link rel="icon" href="http://www.usmall.us/skin/frontend/default/theme373/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="http://www.usmall.us/skin/frontend/default/theme373/favicon.ico" type="image/x-icon">
    <!-- <script type="text/javascript" src="http://www.usmall.us/skin/frontend/default/theme373/js/jquery-1.7.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="/blog/assets/css/style.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div id="container" class="container">
      <h3>宝贝分享</h3>

      <a href="newPin.php"><h5>分享心得</h5></a>
  <?php 
          if (isset($_SESSION['main_errors'])){
            for($i=0; $i<count($_SESSION['main_errors']);$i++){
  ?>
                <h4 style="color: red"> <?php echo $_SESSION['main_errors'][$i];?> </h4>
  <?php
            }
          unset($_SESSION['main_errors']);
          }
  ?>

        <br><br>
      <div id="blog_show" class="grid panel-group">
      <div class="grid" data-masonry='{ "columnWidth": 5, "itemSelector": ".grid-item" }'>
  <?php 

        foreach($infos as $info){
          $_SESSION['pin_id'] = $info['id'];
   ?>
          <div class="grid-item box panel panel-default">
             <div class="show_window panel-heading">
              <a href="/blog/show.php?id=<?php echo $_SESSION['pin_id'];?>">
                <img class="photo" src="<?php echo $info['image']; ?>" width="100%" hight="100%" />
              </a>
             </div>
            <div class="panel-footer text-center">
              <h4>
                <a href="/blog/show.php?id=<?php echo $_SESSION['pin_id'];?>">
                  <?php echo $info['title'] ?>
                </a>
              </h4>
            </div>

          </div>
  <?php
        }
  ?>
        </div>
        <center><h3>Welcome to USMALL</h3></center>
      <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    </div>
  </body>
</html>













