<?php
use App\Models\KorisnikModel;
$korisnikModel=new KorisnikModel();
$query = $korisnikModel->dohvatiSveKorisnike();
?>

<script>
    $(document).ready(function() {
        $("input[type=radio]").click(function() {
            let dugme = $(this).attr('id');
            let korisnik = dugme[1];
            dugme = dugme[0];
            let naziv = null;
            switch (dugme) {
                case "2":
                    naziv = "regkor";
                    break;
                case "3":
                    naziv = "mod";
                    break;
                case "4":
                    naziv = "diz";
                    break;
                case "5":
                    naziv = "admin";
                    break;
            }
            let imeKor = document.getElementById(korisnik).innerText;
            $.ajax({
                url: "<?php echo base_url('Admin/updateStatus'); ?>",
                type: "POST",
                dataType: "json",
                data: {
                    korisnicko_ime: imeKor,
                    status: naziv
                },
                success: function() {},
                error: function() {},
            });
        })
        $("input[type=checkbox]").click(function() {
            let dugme = $(this).attr('id');
            let korisnik = dugme[1];
            dugme = dugme[0];
            let checked = null;
            let imeKor = document.getElementById(korisnik).innerText;
            if ($(this).prop("checked") == true) {
                checked = 1;
            } else if ($(this).prop("checked") == false) {
                checked = 0;
            }

            $.ajax({
                url: "<?php echo base_url('Admin/updateStanje'); ?>",
                type: "POST",
                dataType: "json",
                data: {
                    korisnicko_ime: imeKor,
                    stanje: checked
                },
                success: function() {},
                error: function() {},
            });
        })


    })
</script>

<div>
    <h1>Upravljaj</h1>

    <div id="table-scroll">
        <table class="upravljanje">
            <tr>
                <th>Članovi:</th>
                <th>Blokiran:</th>
                <th>Registrovan korisnik:</th>
                <th>Moderator:</th>
                <th>Dizajner:</th>
                <th>Admin:</th>
            </tr>
            <?php
            $session = session();
            $i = 0;
            $korisnik = $session->get('korisnik');

            foreach ($query as $red) {
                $i++;
                $blokiran = $red->stanje;
                $tip = $red->status;
                echo '<tr>';
                echo '<td id="' . $i . '">' . $red->korisnicko_ime . '</td>';
                $str = '<td><input type="checkbox" id="1' . $i . '" name="' . $i . '"value=""';

                if ((($korisnik->status == 'mod') && ($tip == 'mod')) || ($tip == 'admin')) $str = $str . 'disabled ';
                if ($blokiran) $str = $str . 'checked="true"></td>';
                else $str = $str . '></td>';
                echo $str;
                $str = '<td><input type="radio" id="2' . $i . '" name="tip.' . $i . '"value=""';
                if ((($korisnik->status == 'mod') && ($tip == 'mod')) || ($tip == 'admin')) $str = $str . 'disabled ';
                if ($tip == 'regkor') $str = $str . 'checked="checked"></td>';
                else $str = $str . '></td>';
                echo $str;
                $str = '<td><input type="radio" id="3' . $i . '" name="tip.' . $i . '"value=""';
                if ((($korisnik->status == 'mod') && ($tip == 'mod')) || ($tip == 'admin')) $str = $str . 'disabled ';
                if ($tip == 'mod') $str = $str . 'checked="checked"></td>';
                else $str = $str . '></td>';
                echo $str;
                $str = '<td><input type="radio" id="4' . $i . '" name="tip.' . $i . '"value=""';
                if ((($korisnik->status == 'mod') && ($tip == 'mod')) || ($tip == 'admin')) $str = $str . 'disabled ';
                if ($tip == 'diz') $str = $str . 'checked="checked"></td>';
                else $str = $str . '></td>';
                echo $str;
                $str = '<td><input type="radio" id="5' . $i . '" name="tip.' . $i . '"value=""';
                if ((($korisnik->status == 'mod') && ($tip == 'mod')) || ($tip == 'admin')) $str = $str . 'disabled ';
                if ($tip == 'admin') $str = $str . 'checked="checked"></td>';
                else $str = $str . '></td>';
                echo $str;
                echo '</tr>';
            }
            ?>
        </table>
    </div>

</div>

</body>