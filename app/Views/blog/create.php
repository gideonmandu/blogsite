<div class="container-sm pt-3">
    <h1>Create new post</h1>
    <?php if ($_POST) : ?>
        <?= \Config\Services::validation()->listErrors(); ?>
    <?php endif; ?>
    <form class="mx-auto" action="/blog/create" method="POST">
        <div class="form-group">
            <label for="title" class="fw-bold form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="">
        </div>
        <div class="form-group">
            <label for="body" class="fw-bold form-label">Body:</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group py-3">
            <button type="submit" class="btn btn-primary mb-3">Create</button>
        </div>
    </form>
</div>