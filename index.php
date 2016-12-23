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
    <ul class="tab">
      <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</a></li>
      <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Paris')">Paris</a></li>
      <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</a></li>
    </ul>
    <div class="main">
        <?php
          include 'conn.php';
          mysqli_set_charset($conn,"utf8");
          $result1 = $conn->query('SELECT id, name, title, img, nomination1 FROM candidates ORDER BY nomination1 DESC');
          $result2 = $conn->query('SELECT id, name, title, img, nomination2 FROM candidates ORDER BY nomination2 DESC');
          $result3 = $conn->query('SELECT id, name, title, img, nomination3 FROM candidates ORDER BY nomination3 DESC');
        ?>
      <div id="London" class="tabcontent">
        <?php if ($result1->num_rows > 0) : ?>
            <?php while($row = $result1->fetch_assoc()) : ?>
              <div class="candidate1" style="background-image:url(images/<?php echo $row['img']; ?>);" data-id="<?php echo $row['id']; ?>">
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
      <div id="Paris" class="tabcontent">
        <?php if ($result2->num_rows > 0) : ?>
            <?php while($row = $result2->fetch_assoc()) : ?>
              <div class="candidate2" style="background-image:url(images/<?php echo $row['img']; ?>);" data-id="<?php echo $row['id']; ?>">
                <img src="images/1.png" />
                <div class="sub">
                  <div class="voted" style="display:none;"><i class="fa fa-plus-square" aria-hidden="true"></i></div>
                  <div class="vote" data-id="<?php echo $row['id']; ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
                  <div class="point"><?php echo $row['nomination2']; ?></div>
                  <p class="name"><?php echo $row['name']; ?></p>
                  <p class="position"><?php echo $row['title']; ?></p>
                </div>
              </div>
            <?php endwhile; ?>
        <?php endif; ?> 
      </div>
      <div id="Tokyo" class="tabcontent">
        <?php if ($result3->num_rows > 0) : ?>
            <?php while($row = $result3->fetch_assoc()) : ?>
              <div class="candidate3" style="background-image:url(images/<?php echo $row['img']; ?>);" data-id="<?php echo $row['id']; ?>">
                <img src="images/1.png" />
                <div class="sub">
                  <div class="voted" style="display:none;"><i class="fa fa-plus-square" aria-hidden="true"></i></div>
                  <div class="vote" data-id="<?php echo $row['id']; ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
                  <div class="point"><?php echo $row['nomination3']; ?></div>
                  <p class="name"><?php echo $row['name']; ?></p>
                  <p class="position"><?php echo $row['title']; ?></p>
                </div>
              </div>
            <?php endwhile; ?>
        <?php endif; ?> 
      </div>

    </div>
    <script src="js/script.js"></script>
  </body>
</html>
