<section>
    <div class="container-sm">
        <article>
            <h1><?= $post['title'] ?></h1>
            <div>
                Posted: <?= date('M d Y', strtotime($post['created_at'])) ?> by <a href="https://github.com/gideonmandu">Gideon Mandu</a>
            </div>
            <p><?= $post['body'] ?></p>
        </article>
    </div>
</section>