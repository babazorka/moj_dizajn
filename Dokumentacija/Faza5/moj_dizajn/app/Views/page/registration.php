<html>

<head>

    <!--jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="grid_content_half">
        <div style="padding-top:50px">
            <form name="regKor" action="<?= site_url("Gost/regKorisnikSubmit") ?>" method="post">
                <h2>Registracija korisnika:</h2>
                <?php

                // Display Error message
                if (!empty($error_message)) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Paznja!</strong> <?= $error_message ?>
                    </div>


                <?php
                }
                ?>

                <table style="padding-left: 10px; padding-top:20px">
                    <tr>
                        <td>E-mail adresa</td>
                        <td><input type="text" name="email" id=""></td>

                    </tr>
                    <tr>
                        <td>Ime i prezime</td>
                        <td><input type="text" name="imePrezime" id=""></td>

                    </tr>
                    <tr>

                        <td>Korisnicko ime</td>
                        <td><input type="text" name="korisnicko_ime" id=""></td>

                    </tr>
                    <tr>
                        <td>Šifra</td>
                        <td><input type="password" name="sifra" id=""></td>
                        <!--  <td><font color='red'><?php if (!empty($errors['sifra'])) echo $errors['sifra']; ?></font></td> -->
                    </tr>

                    <tr>
                        <td>
                            
                            <button type="submit" id="registruj" class="dugme" name="btnsignup" style="width: 120px;">Registruj se</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div>
            <div style="padding-top:50px">
                <h2>Registracija dizajnera:</h2>
                <form name="regDiz" action="<?= site_url("Gost/regDizajnerSubmit") ?>" method="post">
                    <?php

                    // Display Error message
                    if (!empty($error_messageD)) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Paznja!</strong> <?= $error_messageD ?>
                        </div>


                    <?php
                    }
                    ?>
                    <table style="padding-left: 20px; padding-top:10px">
                        <tr>
                            <td>E-mail adresa</td>
                            <td><input type="text" name="emailD" id=""></td>

                        </tr>
                        <tr>
                            <td>Ime i prezime</td>
                            <td><input type="text" name="imePrezimeD" id=""></td>

                        </tr>
                        <tr>

                            <td>Korisnicko ime</td>
                            <td><input type="text" name="korimeD" id=""></td>

                        </tr>
                        <tr>
                            <td>Šifra</td>
                            <td><input type="password" name="sifraD" id=""></td>

                        </tr>

                        <tr>
                            <td>CV</td>
                            <td><input type="text" name="cvD" id=""></td>

                        </tr>
                        <tr>
                            <td>
                               
                                <button type="submit" id="registruj" name = "btnsignupD" class="dugme" style="width: 120px;">Registruj se</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    </div>
</body>

</html>