<div id="carousel-example-1z" class="carousel slide carousel-fade" style="height: 50vh;">
    <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
            <div class="view" style="background-image: url('../../public/images/Chess_Board.svg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong class="text-shadow">Update this battle</strong>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Image holder-->
<!-- Content -->
<div class="container p-0 layer-form-wrap">
    <div class="mask  flex-column d-flex justify-content-center align-items-center" >

        <div class="container">
            <form  method="post" action="update_battles?id=<?= (isset($battle[0]['id']) ? $battle[0]['id'] : '') ?>"">
                <!-- Select game dan date -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card ownCard">
                            <div class="card-body">
                                <div class="form-group w-100">
                                    <label>game <small>*</small></label>
                                    <div class="input-group h-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-dice-six"></i></div>
                                        </div>
                                        <select name="gameid" id="games" class="form-control battle-select" disabled>
                                            <option value="<?= $game[0]['id'] ?>"><?= $game[0]['name'] ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ownCard">
                            <div class="card-body">
                                <div class="form-group w-100">
                                    <label>date played <small>*</small></label>
                                    <div class="input-group h-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                        </div>
                                        <input type="date" name="dtPlayed" class="form-control"  value="<?= $battle[0]['dtPlayed'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Select game dan date -->
                <!-- Select players and insert score -->
                <div class="row mt-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card ownCard h-100">
                            <div class="card-body">
                                <div id="players" class="">
                                    <?php foreach ($players as $key => $player): ?>
                                        <div class="form-group w-50 float-left">
                                            <label>Player <?= ++$key ?> <small>*</small></label>
                                            <div class="input-group h-100">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                </div>
                                                <select class="form-control battle-select" name="players[]"  disabled>
                                                    <option value="<?= $player['id'] ?>"><?= $player['nickname'] ?></option>
                                                </select>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card ownCard">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>won by <small>*</small></label>
                                    <div class="input-group h-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-trophy"></i></div>
                                        </div>
                                        <select class="form-control battle-select" name="wonby">
                                            <?php foreach ($players as $player) : ?>
                                                <option value="<?= $player['id'] ?>"
                                                                <?= ($battle[0]['wonby'] == $player['id']) ? 'selected':'' ?>
                                                ><?= $player['nickname'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Score</label>
                                    <div class="input-group h-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-sort-numeric-up"></i></div>
                                        </div>
                                        <input type="text" name="score" class="form-control" value="<?= (!empty($battle[0]['score']) ? $battle[0]['score'] : '') ?>"  >
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-5 flex-column">
                    <div class="d-flex justify-content-center align-items-center p-3 ft-15 home-note text-center">
                        <p class="m-0">Please note that some values can't be changed. We suggest you to create a new battle</p>
                    </div>
                    <small class="m-3">* Required, must be selected or filled in. </small>
                    <div class="d-flex w-100 justify-content-around flex-row align-items-center">
                        <a href="#" class="btn bg-home-color sign-btn ft-15 font-weight-bold" data-toggle="modal" data-target="#modalLoginForm" style="color: white !important; ">
                            delete battle
                        </a>
                        <button type="submit" class="btn home-btn ft-15">update battle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- Content -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Are you sure you want to delete this battle?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <form  method="post" action="delete_battles?id=<?= (isset($battle[0]['id']) ? $battle[0]['id'] : '') ?>"">
                     <button type="submit" class="btn bg-home-color sign-btn "  style="color: white !important;background: #d2996f !important;"> delete</button>
                </div>
            </div>
        </div>
    </div>
</div>