<?php if (isset($_GET['submit'])) : ?>

  <h1><?php echo htmlspecialchars($_GET['name']); ?></h1>

  <p>You are a stupid <?php echo htmlspecialchars($_GET['gender']); ?></p>
  <p>You live in <?php echo htmlspecialchars($_GET['state']); ?></p>

<?php endif; ?>
