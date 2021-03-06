<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Delete - Sunny Spot Hollidays</title>
</head>
<body>
  <header>
    <div class="content header-flex">
      <img src="Images_svg/SunnyspotLogo.svg" alt="Sunny Spot Logo">
      <div class="heading-1">
        <h1>SunnySpot Holidays</h1>
      </div>
    </div>
  </header>
  <div class="navigation content">
    <nav>
      <ul>
        <li><a href="home.html">Home</a></li>
        <li><a href="accommodation.php">Accommodation</a></li>
        <li><a href="camping.html">Camping</a></li>
        <li><a href="activities.html">Activities</a></li>
        <li><a href="climate.html">Climate</a></li>
        <li><a href="location.html">Location</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
  </div>

  <section class="gray-box align-center">
        <h2>Delete Cabin</h2>
  </section>
  <div class="content all-space-container">
  <?php
    // use include file to not repeat PHP code in all files.
    include ('inc/db.php');
    // set up SQL query
    $query = "SELECT * FROM tblCabins";
    // execute the query.
    $result = mysqli_query($link, $query);
    // test if query is faulty.
      if (!$result) {
        echo ("Query error: " . mysqli_error($link));
        mysqli_close($link);
        exit();
      }
      // find number of rows in results.
      $num_rows = mysqli_num_rows($result);
      // test the number of rows.
        if ($num_rows == 0) {
          echo "<br>No records match this query";
          mysqli_close($link);
          exit ();
        }
  ?>
      <table>
        <thead>
          <tr>
            <th>Cabin ID</th>
            <th>Cabin Type</th>
            <th>Cabin Description</th>
            <th>Price Per Night</th>
            <th>Price Per Week</th>
            <th>Photo</th>
            <th>Delete</th>
          </tr>
        </thead>
  <?php
      // fetch the result set in a loop
        while ($record = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // store fields values in variables.
          $cID = $record['cabinID'];
          $cType = $record['cabinType'];
          $cDescription = $record['cabinDescription'];
          $ppNight = $record['pricePerNight'];
          $ppWeek = $record['pricePerWeek'];
          $photo = $record['photo'];
        
  ?>
      <tbody>
        <tr>
          <td><?=$cID;?></td>
          <td><?=$cType;?></td>
          <td><?=$cDescription;?></td>
          <td><?=$ppNight;?></td>
          <td><?=$ppWeek;?></td>
          <td><?=$photo;?></td>
          <td><a href="javascript:fnConfirm('processDeleteCabin.php?CABINID=<?=$cID;?>')">Delete</a></td>
        </tr>
  <?php
        }
  ?>
      </tbody>
    </table>
  <?php 
        mysqli_free_result($result);
        mysqli_close($link);
  ?>

  <a href="adminMenu.html"><span class="return-button">Return</span></a>
  </div>
  
  <footer >
      <div class="content footer">
      <div class="social">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 80v352c0 26.5-21.5 48-48 48H154.4c9.8-16.4 22.4-40 27.4-59.3 3-11.5 15.3-58.4 15.3-58.4 8 15.3 31.4 28.2 56.3 28.2 74.1 0 127.4-68.1 127.4-152.7 0-81.1-66.2-141.8-151.4-141.8-106 0-162.2 71.1-162.2 148.6 0 36 19.2 80.8 49.8 95.1 4.7 2.2 7.1 1.2 8.2-3.3.8-3.4 5-20.1 6.8-27.8.6-2.5.3-4.6-1.7-7-10.1-12.3-18.3-34.9-18.3-56 0-54.2 41-106.6 110.9-106.6 60.3 0 102.6 41.1 102.6 99.9 0 66.4-33.5 112.4-77.2 112.4-24.1 0-42.1-19.9-36.4-44.4 6.9-29.2 20.3-60.7 20.3-81.8 0-53-75.5-45.7-75.5 25 0 21.7 7.3 36.5 7.3 36.5-31.4 132.8-36.1 134.5-29.6 192.6l2.2.8H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z"/></svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M186.8 202.1l95.2 54.1-95.2 54.1V202.1zM448 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-42 176.3s0-59.6-7.6-88.2c-4.2-15.8-16.5-28.2-32.2-32.4C337.9 128 224 128 224 128s-113.9 0-142.2 7.7c-15.7 4.2-28 16.6-32.2 32.4-7.6 28.5-7.6 88.2-7.6 88.2s0 59.6 7.6 88.2c4.2 15.8 16.5 27.7 32.2 31.9C110.1 384 224 384 224 384s113.9 0 142.2-7.7c15.7-4.2 28-16.1 32.2-31.9 7.6-28.5 7.6-88.1 7.6-88.1z"/></svg>
    </div>
    <div class="signature">
      <h2>Laize Ferraz</h2>
      <nav class="admin-link">
        <ul>
          <li><a href="login.html">Login</a></li>
          <li><a href="adminMenu.html">Admin</a></li>
        </ul>
      </nav>
      <p>&copy;Copyright 2019, relax. All rights reserved</p>
    </div>
    </div>
  </footer>
  <script src="js/confirmDelete.js"></script>     
  </body>
  </html>