<header>
  <nav>
    <ul id="menu">
      <li <?php echo (($_SERVER['REQUEST_URI'] == '/') || $_SERVER['REQUEST_URI'] == '/index.php') ? 'class="active"' : ''?>><a href="index.php">Home</a></li>
      <li <?php echo ($_SERVER['REQUEST_URI'] == '/events.php') ? 'class="active"' : ''?>><a href="events.php">Events/Rules</a></li>
      <li <?php echo ($_SERVER['REQUEST_URI'] == '/gallery.php') ? 'class="active"' : ''?>><a href="gallery.php">Gallery</a></li>
      <li <?php echo ($_SERVER['REQUEST_URI'] == '/team.php') ? 'class="active"' : ''?>><a href="team.php">Team</a></li>
      <li <?php echo ($_SERVER['REQUEST_URI'] == '/itinerary.php') ? 'class="active"' : ''?>><a href="itinerary.php">Itinerary</a></li>
      <li <?php echo ($_SERVER['REQUEST_URI'] == '/contacts.php') ? 'class="active"' : ''?>><a href="contacts.php">Contacts</a></li>
    </ul>
  </nav>
  <h1 style="float: left;"><a href="index.php" id="logo">Abhuday</a></h1>
  <h1><p class="awesome" style="text-align: center;"> Registrations end on 28th December at 12:00 P.M </p></h1>
</header>
