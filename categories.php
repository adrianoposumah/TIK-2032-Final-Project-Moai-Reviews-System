<?php include 'navbar.php'; ?>
    <section>
      <div class="category">
        <h2>Categories</h2>
        <div class="list-category">         
          <ul>
            <?php foreach($categories as $category) : ?>
              <li><a href="#"><?= $category['name'] ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </section>
<?php include 'footer.php'; ?>
