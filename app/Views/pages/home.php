<section class="bg-light">
    <?php
    $session = \Config\Services::session(); ?>
    <?php if (isset($session->success)) : ?>
        <div class="alert alert-success text-center alert-dismissible fade show mb-0" role="alert">
            <?= $session->success ?>
            <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close">
            </button>
        </div>
    <?php endif; ?>
    <div class="container-sm">
        <h1 class="display-4 fw-bolder">Dummy Blog site</h1>
        <p>Demo Code Igniter Project</p>
        <hr>
        <p class="text-secondary h3">Available Articles</p>
    </div>
</section>
<section class="container-fluid">
    <div class="container-sm py-3">
        <!-- Checking if news articles exist -->

        <?php if ($posts) : ?>
            <ul class="list-group list-group-numbered">
                <?php foreach ($posts as $post) : ?>
                    <li class="list-group-item list-group-item-action list-group-item-light">
                        <a class="text-decoration-none text-reset" href="/blogsite/blog/<?= $post['slug'] ?>">
                            <?= $post['title'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p class="text-center">No posts have been found</p>
        <?php endif; ?>
    </div>
</section>