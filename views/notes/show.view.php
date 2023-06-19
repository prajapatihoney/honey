<?php require base_path('views/partials/header.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

    <a href="/notes" class="mt-6">Go Back....</a>

    <p><?= $note['body'] ?></p>
    <footer class="mt-6">
      <a href="/note/edit?id=<?= $note['id'] ?>" class="text-gray-500 border border-current px-3 py-1 rounded">Edit</a>
    </footer>

  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>