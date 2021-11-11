<section class="bg-light">
    <?php
    $session = \Config\Services::session(); ?>
    <?php if (isset($session->success)) : ?>
        <div class="alert alert-success text-center alert-dismissible fade show mb-0" role="alert">
            <?= $session->success ?>
            <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close">
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="container-sm">
        <h1 class="display-4 fw-bolder">Dummy Blog site</h1>
        <p>Demo Code Igniter Project</p>
        <hr>
        <p class="text-secondary">Trying out php 8</p>
        <p><a href="/about" class="btn btn-primary btn-lg" role="button">Learn More</a></p>
    </div>
</section>
<section class="container-fluid">
    <div class="container-sm">
        <!-- Checking if news articles exist -->
        <?php if ($news) : ?>
            <?php foreach ($news as $newsItem) : ?>
                <h3><a href="/blog/<?= $newsItem['slug'] ?>"><?= $newsItem['title'] ?></a></h3>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center">No posts have been found</p>
        <?php endif; ?>
    </div>
</section>