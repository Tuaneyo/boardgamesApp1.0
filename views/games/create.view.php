<div id="carousel-example-1z" class="carousel slide carousel-fade" style="height: 50vh;">
    <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
            <div class="view" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/d/d5/Chess_Board.svg'); background-repeat: no-repeat; background-size: cover;">

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
            <form  method="post" action="create_games">
                <!-- Select game dan date -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card ownCard">
                            <div class="card-body">
                                <div class="form-group w-100">
                                    <label>game name<small>*</small></label>
                                    <div class="input-group h-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-dice-six"></i></div>
                                        </div>
                                        <input type="text" name="name" class="form-control"  placeholder="game name" value="<?= (isset($request['name']) ? $request['name'] : '') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ownCard">
                            <div class="card-body">
                                <div class="form-group w-100">
                                    <label>Number of players <small>*</small></label>
                                    <div class="input-group h-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                        </div>
                                        <input type="number" name="nop" class="form-control"  placeholder="min. of 2 players" value="<?= (isset($request['nop']) ? $request['nop'] : '') ?>" >
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
                                    <div class="form-group">
                                        <label>date of register <small>*</small></label>
                                        <div class="input-group h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                            </div>
                                            <select class="year form-control" name="dor">
                                                <option  value="<?= (isset($request['dor']) ? $request['dor'] : '2018') ?>"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>create by <small>*</small></label>
                                        <div class="input-group h-100">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input type="text" name="username" class="form-control" value="<?= (($username) ? $username : '') ?>" disabled>
                                            <input type="hidden" name="publisherid" value="<?=  (!empty($userid)? $userid : '') ?>"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card ownCard">
                            <div class="card-body">
                                <div class="form-group ">
                                    <label>duration (h:m)</label>
                                    <div class="input-group h-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                        </div>
                                        <input type="time" name="duration" class="form-control" placeholder="time" value="<?= (isset($request['time']) ? $request['time'] : '') ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>description</label>
                                    <div class="input-group h-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-align-justify"></i></div>
                                        </div>
                                        <textarea rows="4" name="description" cols="50" class="form-control" placeholder="description of the game">
                                                    <?= (isset($request['description']) ? $request['description'] : '') ?>
                                            </textarea>
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
