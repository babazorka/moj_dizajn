<?php
$request = \Config\Services::request();
$kliknuo=false;
if(isset($_POST['kliknuo'])) $kliknuo=$_POST['kliknuo'];
?>

<script>
    $(document).ready(function() {
        let dirao = false;
        $("#otpremi").click(function() {
            let tekst = document.getElementById('tags').value;
            if(document.getElementById("fileToUpload").files.length===0){
                alert("Nepotpun sadrzaj! Niste uneli fotografiju modela");
                return;
            }
            if (tekst == "") {
                alert("Nepotpun sadrzaj! Niste uneli tagove.");
                return;
            }
           
            $.ajax({
                url: "<?php echo base_url('Dizajner/uploadNaBazu'); ?>",
                type: "POST",
                data: {
                    tekst: tekst
                },
                success: function() {
                   
                    window.location.href = "my_profile";
                },
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
                        <h2 style="padding-left: 14px;padding-top: 5px; text-align: left">Fotografija modela:</h2>
                    </th>
                    <th style="text-align: left; ">
                        <h2 style="padding-left: 14px;padding-top: 5px; text-align: left">Tagovi:</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 50%;">
                        <?php 
                        if($kliknuo) echo '<img src="uploads/1.png" alt="" style="max-height: 405px; max-width: 350px;">';
                        else echo '<div style="height: 410px; background-color: white;">';
                        ?>
                        </div>
                    </td>
                    <td style="display: block;">
                        <input type="text" name="" id="tags" value="" style=" height: 365px; width:500px">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;" class="no_pad">
                        <form action="/Dizajner/dodajModel" method="post" enctype="multipart/form-data">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit" id="kliknuto">
                        </form>
                    </td>

                    <td style="text-align: right;" class="no_pad">

                        <button id="otpremi" class="dugme" style="width: 177px;">Otrpremi</button>

                    </td>
                </tr>
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