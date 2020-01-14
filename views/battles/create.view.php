<div id="carousel-example-1z" class="carousel slide carousel-fade" style="height: 50vh;">
    <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
            <div class="view" style="background-image: url('../../public/images/Chess_Board.svg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong class="text-shadow">create a battle</strong>
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
                <form  method="post" action="create_battles">
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
                                            <select name="gameid" id="games" class="form-control battle-select">
                                                <?php foreach ($games as $game) : ?>
                                                    <option value="<?= $game->id ?>"><?= $game->name ?></option>
                                                <?php endforeach; ?>
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
                                            <input type="date" name="dtPlayed" class="form-control"  placeholder="date" >
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
                                        <?php for($i=1; $i<= 4;$i++): ?>
                                            <div class="form-group w-50 float-left">
                                                <label>Player <?= $i ?> <small>*</small></label>
                                                <div class="input-group h-100">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                    </div>
                                                    <select class="form-control battle-select" name="players[]"  disabled>
                                                        <option  selected>select game</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
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
                                                    <option value="<?= $player->id ?>"><?= $player->nickname ?></option>
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
                                            <input type="text" name="score" class="form-control"  placeholder="score" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-5 flex-column">
                        <small class="m-3">* Required, must be selected or filled in. </small>
                        <button type="submit" class="btn home-btn ft-15">create battle</button>
                    </div>

                </form>


            </div>
        </div>

    </div>
<!-- Content -->