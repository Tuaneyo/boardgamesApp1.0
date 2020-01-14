<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body>

    <!-- navigation -->
    <?php include "public/nav.php"; ?>
    <!-- notification messager -->
    <?php if(isset($_SESSION['alert'])) :?>
        <div id="msgAlert" class="alert <?= $_SESSION['alert']['type'] ?>" role="alert">
            <div class="d-flex flex-row justify-content-between align-items-center text-center">
                <span class="text-right alert-btn mr-2" style="font-size: 18px;color:grey;"><i class="fas fa-times"></i></span>
                <p class="m-0"><?= $_SESSION['alert']['msg'] ?></p>
            </div>
        </div>
    <?php unset($_SESSION['alert']); endif; ?>

    <?php include_once($pagePath) ?>

    <!-- footer -->
    <?php include "footer.php"; ?>

        <!-- SCRIPTS -->
        <!-- JQuery -->
    <?php include "foot.php"; ?>

</body>
</html>