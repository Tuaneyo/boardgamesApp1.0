<div class="container">
    <?php if(isset($_SESSION['alert'])) :?>
        <div class="container alert alert-primary" role="alert">
            This is a primary alert—check it out!
        </div>
    <?php endif; ?>
    <div class="row mt-5 mb-5">
        <div class="col-md-12 mt-5 mb-5">
            <?= $msg; ?>
            <div class="list-group">
                <?php foreach ($game as $item) :?>
                    <a href="games_update?id=<?= $item['id']; ?>" class="list-group-item list-group-item-action flex-column align-items-start ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-2 h5"><?php echo $item['name'] ?></h5>
                            <small>registratie: <?= $item['dor'] ?></small>
                        </div>
                        <p class="mb-2"><?= $item['description'] ?>
                          test etst test
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>
