<div id="carousel-example-1z" class="carousel slide carousel-fade" style="height: 40vh;">
    <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
            <div class="view" style="background-image: url('https://thehypedgeek.com/wp-content/uploads/2016/09/riot-board-game.jpg'); background-repeat: no-repeat;background-size: cover; background-position: center;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong class="text-shadow">Battles overview</strong>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Image holder-->
<!-- Content -->
<div class="container mt-5">
    <div class="mask flex-column d-flex justify-content-center align-items-center" >
        <div class="container">
            <div class="row">
                <?php if($battles > 0) : ?>
                    <?php foreach ($battles as $battle) : ?>
                    <div class="col-md-6">
                        <!-- battles -->
                        <div class="card battleCard ownCard m-lg-3 m-md-3 m-sm-0 mt-5">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-6 battle-wrap" style="border-right: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="battle-icon">
                                                <i class="fas fa-sort-numeric-up"></i>
                                            </div>
                                            <div class="battle-data ft-18">
                                                <?= $battle->score ?> points
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 battle-wrap" style="border-left: 1px solid #cdcdcd;border-bottom: 1px solid #cdcdcd;">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="battle-icon">
                                                <i class="fas fa-trophy"></i>
                                            </div>
                                            <div class="battle-data ft-18">
                                                <?= $battle->nickname ?> won
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6 battle-wrap" style="border-right: 1px solid #cdcdcd;border-top: 1px solid #cdcdcd;">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div class="battle-icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="battle-data ft-18">
                                                <?= (count(json_decode($battle->players)) ? count(json_decode($battle->players)) : '0') ?> Players
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 battle-wrap" style="border-left: 1px solid #cdcdcd;border-top: 1px solid #cdcdcd;">
                                        <div class="d-flex flex-column justify-content-center align-items-center ">
                                            <div class="battle-icon">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div class="ft-18 battle-date">
                                                <?= $battle->dtPlayed ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4 mb-4">
                                <a href="battles_update?id=<?= $battle->id ?>" class="d-flex btn-battle">
                                    played <?= $battle->id ?>
                                </a>
                            </div>
                        </div>
                        <!-- battles -->
                    </div>

                    <?php endforeach; ?>
                <?php endif; ?>

            </div>

        </div>
    </div>

</div>
<!-- Content -->
<div class="container mt-5 mb-5">
    <div class="mask  flex-column d-flex justify-content-center align-items-center" >
        <!-- Content -->
        <a href="battles_create" class="btn sign-btn btn-house">create new battle</a>
    </div>

</div>
