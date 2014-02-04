  <!-- User Login -->
  <script type="text/javascript" src ="js/jquery.1.10.2.js"></script>
  <script type="text/javascript" src = "js/loginvalidate.js"></script>
  <script type="text/javascript" src = "js/loginvalidate2.js"></script>
  <script src="js/admin.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <?php include 'Banner2.php'; ?>
    </div>
    <div class="modal-body">
        <form name = "login" method = "POST" action = "logindata.php">
              <div id = "user">
                <input type = "email" name = "user" id = "user1" placeholder = "Enter your Email/Username..." /><span id = "emailko"></span>
              </div>

              <div id = "pas">
                <input type = "password" name = "pass" id = "pass2" placeholder = "Enter your Password..." /><span id = "passwordko"></span>
              </div>
              <div><input class = "btn btn-primary" id = "log" type = "submit" value = "Login" onclick = "return loginvalidate();"/></div>
    		</form>
    </div>

    <div class="modal-footer">
      <button class="btn btn-success" data-dismiss="modal">Close</button>
    </div>
  </div>