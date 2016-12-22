<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Poll</title>
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title">
    <link href="https://fonts.googleapis.com/css?family=Roboto&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  </head>
  <body>
    <header>

    </header>
    <div class="main">
        <?php
          $conn = new mysqli('localhost', 'root', '123', 'poll');
          mysqli_set_charset($conn,"utf8");
          $result = $conn->query('SELECT * FROM candidates ORDER BY nomination1 DESC');
        ?>

        <?php if ($result->num_rows > 0) : ?>
            <?php while($row = $result->fetch_assoc()) : ?>
              <div class="candidate" style="background-image:url(images/<?php echo $row['img']; ?>);" data-id="<?php echo $row['id']; ?>">
                <img src="images/1.png" />
                <div class="sub">
                  <div class="voted" style="display:none;"><i class="fa fa-plus-square" aria-hidden="true"></i></div>
                  <div class="vote" data-id="<?php echo $row['id']; ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
                  <div class="point"><?php echo $row['nomination1']; ?></div>
                  <p class="name"><?php echo $row['name']; ?></p>
                  <p class="position"><?php echo $row['title']; ?></p>
                </div>
              </div>
            <?php endwhile; ?>
        <?php endif; ?> 
    </div>
    
    <script>
      if (document.cookie.match(/polled=([^;]*)/) == null ) {
        document.cookie = 'polled=0';
      }
      var cookie = document.cookie.match(/polled=([^;]*)/)[1];
      var candidates = document.getElementsByClassName('candidate');
      for (i=0, l=candidates.length; i<l; i+=1) {
        var el = candidates[i];
        var id = el.dataset.id;
        var vote_button = el.getElementsByClassName('vote')[0];
        var voted_element = el.getElementsByClassName('voted')[0];
 
        vote_button.addEventListener('click', function() {
          var that = this;
          var id = that.dataset.id;
          var point_element = that.nextSibling.nextSibling;
          var point = parseInt(point_element.innerHTML);
          var voted_element = that.previousSibling.previousSibling;
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
              point_element.innerHTML = point + 1;
              document.cookie = 'polled=' + cookie + ',' + id;
              cookie = document.cookie.match(/polled=([^;]*)/)[1];
              that.style.display = 'none';
              voted_element.style.display = 'block';
            }
          };
          xhttp.open("POST", "api.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("nomination_id=1&id=" + id);
        });
 
        if (cookie.match(new RegExp("(?:^|,)" + id + "(?:,|$)"))) {
          voted_element.style.display = 'block';
          vote_button.style.display = 'none';
        }
      }
    </script>
  </body>
</html>
