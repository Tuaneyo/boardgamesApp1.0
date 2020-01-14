<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">

    <!-- Title   -->
    <title>Users</title>

    <!-- CSS Bootstrap   -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="views/style.css">
    <!-- Fontawesome / icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form  method="post" action="add_user">
        <div class="form-group">
            <label>voornaam</label>
            <input name="fname" class="form-control"  placeholder="voornaam">
        </div>
        <div class="form-group">
            <label>achternaam</label>
            <input name="lname" class="form-control"  placeholder="achternaam">
        </div>
        <div class="form-group">
            <label>mobiel</label>
            <input name="mobile" class="form-control"  placeholder="mobiel">
        </div>
        <div class="form-group">
            <label>email address</label>
            <input name="email" class="form-control"  placeholder="email">
        </div>
        <div class="form-group">
            <label>password</label>
            <input type="password" name="password" class="form-control" placeholder="wachtwoord">
        </div>
        <div class="form-group">
            <label>herhaal wachtwoord</label>
            <input type="password" name="pwcheck" class="form-control" placeholder="wachtwoord">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div> <!-- End container -->


<!-- JavaScript / Popper.js / jQuery all for Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>