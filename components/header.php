<header>
  <nav>
    <ul id="menu">
      <li <?php echo (($_SERVER['REQUEST_URI'] == '/') || $_SERVER['REQUEST_URI'] == '/index.php') ? 'class="active"' : ''?>><a href="index.php">Home</a></li>
      <li <?php echo ($_SERVER['REQUEST_URI'] == '/parties.php') ? 'class="active"' : ''?>><a href="parties.php">Events/Rules</a></li>
      <li <?php echo ($_SERVER['REQUEST_URI'] == '/gallery.php') ? 'class="active"' : ''?>><a href="gallery.php">Gallery</a></li>
      <li <?php echo ($_SERVER['REQUEST_URI'] == '/residents.php') ? 'class="active"' : ''?>><a href="residents.php">Co-ordinators</a></li>
      <li <?php echo ($_SERVER['REQUEST_URI'] == '/news.php') ? 'class="active"' : ''?>><a href="news.php">Itinerary</a></li>
      <li <?php echo ($_SERVER['REQUEST_URI'] == '/contacts.php') ? 'class="active"' : ''?>><a href="contacts.php">Contacts</a></li>
    </ul>
  </nav>
  <h1><a href="index.php" id="logo">Abhyudya</a></h1>
</header>
