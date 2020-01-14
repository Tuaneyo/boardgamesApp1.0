<?php
    include('partials/add_player_form.php')
?>
<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 player-list-wrap">
            <div class="table-wrap">
                <div class="d-flex justify-content-center p-2">
                    <span class="ft-18">TOP PLAYERS</span>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nickname</th>
                        <th scope="col">Won</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($counts as $key => $value):?>
                        <tr>
                            <th scope="row"><?= $key ?></th>
                            <td><?= $value ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="register" class="btn bg-home-color sign-btn ft-15 font-weight-bold" style="color: white !important; ">
                        I can do better
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<!--/ content-->

<div class="container mt-0 mb-5">
    <div class="row">
        <div class="d-flex text-center justify-content-center w-100 mb-4">
            <h4>Latest added game</h4>
        </div>
        <div class="col-md-12">
            <ul class="list-group ownListGroup">
                <li class="list-group-item d-flex justify-content-between align-items-center p-0">
                    <div class="d-flex flex-row w-100 align-items-stretch">
                        <div class="d-flex flex-column justify-content-center align-items-center game-p text-center" style="width: 33%;">
                            <div class="game-icon">
                                <i class="fas fa-gamepad"></i>
                            </div>
                            <div class="game-data ft-18 font-weight-bold">
                                <?= $game[0]['name'] ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center " style="width: 15%;border: 1px solid #e1e1e1;">
                            <div class="d-flex flex-column justify-content-center align-items-center" style="">
                                <div class="d-flex flex-column game-wrap-border game-p ">
                                    <div class="game-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="game-data ft-15">
                                        2 - <?= $game[0]['nop'] ?>
                                    </div>
                                </div>
                                <div class="d-flex flex-column justify-content-center align-items-center  game-p ">
                                    <div class="game-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="game-data ft-15">
                                        <?= $game[0]['dor'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column" style="width: 55%;">
                            <div class="d-flex flex-row h-100">
                                <div class="d-flex flex-column game-wrap-border game-p "  style="border-right: 1px solid #e1e1e1;">
                                    <div class="game-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="game-data ft-18">
                                        <?= (empty($game[0]['duration']) ? '00:00' : $game[0]['duration']) ?>
                                    </div>
                                </div>
                                <div class="d-flex flex-column game-wrap-border game-p ">
                                    <div class="game-data ">
                                        <a href="games_update?id=<?= $game[0]['id'] ?>" class="btn btn-house sign-btn p-2 pr-3 pl-3">edit</a>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex flex-column justify-content-center align-items-center h-100 ">
                                <div class="d-flex text-center pr-2 pl-2">
                                    <?= $game[0]['description'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

