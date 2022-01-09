<nav>
  <img src="">
  <ul style="list-style: none; display: flex; gap: 15px; padding-left: 0; margin: 5px 5px 50px 5px">
    <li>
      <a href="/">Home</a>
    </li>
    <li>
      <a href="/login">My OLX</a>
    </li>
    <li>
      <a href="#">Favoritos</a>
    </li>
    <li>
      <a href="/ads/create">Criar anúncio</a>
    </li>
    <?php 
    if(isset($_SESSION["user_name"])) {
      echo "
      <li>
        <a href='/logout'>Logout</a>
      </li>
      ";
    }
    ?>
  </ul>
</nav>
