<?php include 'navbar_user.php'; ?>
    <section>
      <div class="category section-margin">
        <h2>Categories</h2>
        <div class="list-category">         
          <ul>
            <?php foreach($categories as $category) : ?>
              <li><a href="categories-detail_user.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </section>
<?php include 'footer.php'; ?>
