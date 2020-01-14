<!--Image holder-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" style="height: 60vh;">
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="view" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/d/d5/Chess_Board.svg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong class="text-shadow">Welkom ADSD 2018!</strong>
                        </h1>
                        <p class="mb-4 d-none d-md-block">
                            <strong class="text-shadow">Sign up and experience the benefits this boardgames site has to offer. Join us fast before its too late.</strong>
                        </p>
                        <form method="post" action="mail_add_player">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 p-0">
                                    <div class="input-group mb-2 mr-sm-2 h-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text addPlayerLabel"><i class="fas fa-user"></i></div>
                                        </div>
                                        <input type="text" name="nickname" class="form-control formInput border2 h-100"  placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 p-0">
                                    <div class="input-group mb-2 mr-sm-2 h-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text addPlayerLabel"><i class="fas fa-envelope"></i></div>
                                        </div>
                                        <input type="text" name="email" class="form-control formInput border2 h-100"  placeholder="email">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                                    <div class="input-group mb-2 mr-sm-2 h-100">
                                        <button type="submit" class="addPlayerBtn btn btn-md m-0 w-100 ft-15">Add player</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Image holder-->