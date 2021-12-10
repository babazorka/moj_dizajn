<?php

use App\Models\KorisnikModel;
use App\Models\UpitModel;

$session = session();
$upitModel = new UpitModel();
$korisnikModel = new KorisnikModel();
$upiti = $upitModel->sviUpiti($session->get('korisnik')->korisnicko_ime);


?>
<div class="grid_content">
    <div style="background-color: #899176;" id="table-scroll">
        <table style="width: 92%; border: solid 1px black;" class="upravljanje">
            <thead>
                <tr>
                    <th colspan="6">
                        <h1>Upiti</h1>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h3>Vreme</h3>
                    </th>
                    <th>
                        <h3>Korisnik</h3>
                    </th>
                    <th>
                        <h3>Mail korisnika</h32>
                    </th>
                    <th>
                        <h3>Komentar</h3>
                    </th>

                    <th>
                        <h3>Primer modela</h3>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($upiti as $row) {
                    echo '<tr><td>' . $row->vreme . '</td>
            <td>' . $row->korisnik . '</td>
            <td>' . $korisnikModel->dohvatiKorisnika($row->korisnik)->email . '</td>
            <td>' . $row->komentar . '</td>
            <td><img src="data:image/jpeg;base64,' . base64_encode($row->primer_modela) . '" style="max-height: 200px; max-width: 300px;" alt="Ne postoji slika">' . '</td>
        </tr>';
                }
                ?>
            </tbody>
        </table>

        </body>
    </div>
</div>
</body>

<style>
    table,
    tr,
    td,
    th {
        border: solid 1px black;
    }

    table {
        border-collapse: collapse;
    }

    td {
        text-align: center;
    }
</style>

</html>