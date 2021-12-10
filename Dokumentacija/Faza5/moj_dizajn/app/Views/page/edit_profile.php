<?php
$session = session();
$korisnik = $session->get('korisnik');
?>
<script>
    $(document).ready(function() {

        $("#dodaj_opis").click(function() {
            let tekst = document.getElementById('biografija').value;
            $.ajax({
                url: "<?php echo base_url('Dizajner/dodajBio'); ?>",
                type: "POST",
                dataType: "json",
                data: {
                    tekst: tekst
                },
                success: function() {},
                error: function() {},
            })
        })
    })
</script>

<div class="grid_content">
    <div style="background-color: #899176;">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>
                        <h2 style="margin-top: 5px; text-align: left; padding-left: 14px;">Profilna:</h2>
                    </th>
                    <th>
                        <h2 style="margin-top: 5px; text-align: left; padding-left: 14px;">Biografija:</h2>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 40%; vertical-align: top;">
                        <?php
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($korisnik->slika) . '" style="max-height: 200px; max-width: 200px;">'
                        ?>
                    </td>
                    <td style="vertical-align: top" ;>
                        <textarea style="resize: none;" name="" id="biografija" cols="60" rows="20"> <?php echo $korisnik->biografija; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="no_pad" style="text-align: left;">
                        <form action="/Dizajner/izmeniProfilnu" method="post" enctype="multipart/form-data">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Otpremi" name="submit">
                        </form>
                    </td>
                    <td class="no_pad" style="text-align: right;">
                        <button id="dodaj_opis" class="dugme" style="width: 177px;">Dodaj opis</button>
                    </td>
                </tr>
                <tr></tr>
            </tbody>
        </table>
    </div>
</div>

</div>
</body>

<style>
    .no_pad {
        padding-bottom: 0;
        padding-top: 0;
    }
</style>

</html>