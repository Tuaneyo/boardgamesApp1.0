<?php
    include('partials/add_player_form.php')
?>

<div class="container mt-5 mb-5 p-5">
    <?php if($auth): ?>
        <div class="d-flex flex-row justify-content-around w-100">
            <a href="games_create" class="btn bg-home-color sign-btn ft-15 font-weight-bold" style="color: white !important; ">
                Create new game
            </a>
            <a href="battles_create" class="btn bg-home-color sign-btn ft-15 font-weight-bold" style="color: white !important; ">
                Create new battles
            </a>
        </div>

    <?php else: ?>

        <div class="d-flex justify-content-center align-items-center">
            <a href="login" class="btn bg-home-color sign-btn ft-15 font-weight-bold" style="color: white !important; ">
                Login
            </a>
        </div>
    <?php endif; ?>
</div>


