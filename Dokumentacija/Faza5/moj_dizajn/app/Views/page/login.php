<html>
<head>

    <!--jQuery library --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--Bootstrap JS --> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  </head>
<body>
<?php if (isset($message)) echo "<font color='red'>$message</font><br>"; ?>
<form name="loginform" action="<?= site_url("Gost/loginSubmit") ?>" method="post">
    <h1 style="padding-right: 550px; padding-top: 80px;">Prijava:</h1>
    <?php 
     
            // Display Error message
            if(!empty($error_message)){
            ?>
            <div class="alert alert-danger" role = "alert" >
              <strong>Paznja!</strong> <?= $error_message ?>
            </div>
        

            <?php
            }
            ?>
    <table style="padding-left: 300px; padding-top: 50px;">
        <tr>
            <td>
                <h3>Korisničko ime:</h3>
            </td>
            <td>
                <input type="text" name="korisnicko_ime" value="<?= set_value('korisnicko_ime') ?>">
            </td>
            <td>
               
            </td>
        </tr>
        <tr>
            <td>
                <h3>Šifra:</h3>
            </td>
            <td><input type="password" name="sifra" id=""></td>
            <td>
               
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;">
                <!-- <input type="submit" value="Prijavi se" class="submit" style="float: right;"> -->
                <button value="" name = "btnlogin" id="sacuvaj_izmenu" class="dugme" style="width: 100px; ">
                    Prijavi se
                </button>
            </td>
        </tr>
    </table>
</form>

</div>
</body>

</html>