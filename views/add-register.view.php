<div class="container mt-5">
    <h1>We are almost here</h1>
    <p>Bevestig nu je account met de onderstaande formulier. Daarna kun je direct gebruik maken van alle mogelijkheden die ADVL voor je biedt</p>
    <div class="container">
        <form  method="post" action="register_add_player">
            <div class="form-group">
                <label>voornaam</label>
                <input type="text"  name="fname" class="form-control"  placeholder="voornaam" value="<?= (isset($request['fname']) ? $request['fname'] : '') ?>">
            </div>
            <div class="form-group">
                <label>achternaam</label>
                <input type="text"  name="lname" class="form-control"  placeholder="achternaam" value="<?= (isset($request['lname']) ? $request['lname'] : '') ?>" >
            </div>
            <div class="form-group">
                <label>mobiel</label>
                <input type="text"  name="mobile" class="form-control"  placeholder="mobiel" value="<?= (isset($request['mobile']) ? $request['mobile'] : '') ?>">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="password" name="password" class="form-control" placeholder="wachtwoord" >
            </div>
            <div class="form-group">
                <label>herhaal wachtwoord</label>
                <input type="password" name="password" class="form-control" placeholder="wachtwoord">
            </div>
            <input hidden name="nickname" value="<?= (isset($request['nickname']) ? $request['nickname'] : '') ?>">
            <input hidden name="email" value="<?= (isset($request['email']) ? $request['email'] : '') ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> <!-- End container -->

</div>