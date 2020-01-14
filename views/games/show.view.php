<div id="carousel-example-1z" class="carousel slide carousel-fade" style="height: 40vh;">
    <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
            <div class="view" style="background-image: url('http://www.pockettactics.com/wp-content/uploads/2015/10/terra-mystica.jpg'); background-repeat: no-repeat;background-size: cover; background-position: center;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong class="text-shadow">Games overview</strong>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Image holder-->
<div class="container mt-5">
    <?php foreach($games as $game):?>
        <div class="row mt-4">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <ul class="list-group ownListGroup">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-0">
                        <div class="d-flex flex-row w-100 align-items-stretch">
                            <div class="d-flex flex-column justify-content-center align-items-center game-p text-center" style="width: 33%;">
                                <div class="game-icon">
                                    <i class="fas fa-gamepad"></i>
                                </div>
                                <div class="game-data ft-18 font-weight-bold">
                                    <?= $game->name ?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center " style="width: 15%;border: 1px solid #e1e1e1;">
                                <div class="d-flex flex-column justify-content-center align-items-center" style="">
                                    <div class="d-flex flex-column game-wrap-border game-p ">
                                        <div class="game-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="game-data ft-15">
                                           2 - <?= $game->nop ?>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center align-items-center  game-p ">
                                        <div class="game-icon">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="game-data ft-15">
                                            <?= $game->dor ?>
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
                                            <?= $game->duration ?>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column game-wrap-border game-p ">
                                        <div class="game-data ">
                                            <a href="games_update?id=<?= $game->id ?>" class="btn btn-house sign-btn p-2 pr-3 pl-3">edit</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex flex-column justify-content-center align-items-center h-100 ">
                                    <div class="d-flex text-center pr-2 pl-2">
                                        <?= $game->description ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 ">
                <!--Card-->
                <div class="card testimonial-card ownCard h-100">
                    <!--Background color-->
                    <div class="card-up info-color"></div>
                    <!--Avatar-->
                    <div class="avatar mx-auto white">
                        <img src="public/images/profile.png" class="rounded-circle img-fluid" width="100px" height="100px">
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--Name-->
                        <h5 class="">Added by <?= $game->nickname ?></h5>
                    </div>
                </div>
                <!--Card-->
            </div>

        </div>
    <?php endforeach; ?>
</div>

<div class="container mt-5 mb-5">
    <div class="mask  flex-column d-flex justify-content-center align-items-center" >
        <!-- Content -->
        <a href="games_create" class="btn sign-btn btn-house">create new battle</a>
    </div>

</div>

