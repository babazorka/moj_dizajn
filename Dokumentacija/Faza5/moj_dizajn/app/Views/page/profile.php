<?php

use App\Models\KorisnikModel;
use App\Models\ModelModeli;
use App\Models\OcenaModel;
use App\Models\UpitModel;
$modeliModel=new ModelModeli();
$ocenaModel = new OcenaModel();
$korisnikModel=new KorisnikModel();
$upitModel=new UpitModel();
$mozeDaOceni=false;
$session = session();
$korime=$session->get('korisnik')->korisnicko_ime;
if($upitModel->postoji($korisnickoIme,$korime)) {
    if($upitModel->brojPoslatihUpita($korisnickoIme,$korime)>
    $ocenaModel->brojDatihOcena($korisnickoIme,$korime)) $mozeDaOceni=true;
}

?>

<script>
     $(document).ready(function() {
         
        $("#Oceni").click(function() {
            let cena=document.getElementById('cena').value;
            let dizajn=document.getElementById('dizajn').value;
            let kvalitet=document.getElementById('kvalitet').value;
            if(cena==""||dizajn==""||kvalitet=="") {alert("Uneti sve ocene"); return;} 
            $.ajax({
                url: "<?php echo base_url($controller.'/oceni/'.$korisnickoIme); ?>",
                type: "POST",
                data: {
                    cena: parseInt(cena),
                    dizajn: parseInt(dizajn),
                    kvalitet: parseInt(kvalitet)
                },
                success: function() {
                    $("#oceneDiv").load(" #oceneDiv");
                },
                error: function() {},
            })
        })
    }) 
</script>

    <div class="grid_content" >
        <div style="background-color: #899176;">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th style="text-align: left;">
                            <h2 style="text-align: left;">Dizajner: <?php echo $korisnikModel->dohvatiKorisnika($korisnickoIme)->ime_i_prezime;?></h2>
                        </th>
                        <th>
                            <h2 style="text-align: left;">Opis:</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 0;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="padding-top: 0;">
                                        <?php
                                  echo '<img src="data:image/jpeg;base64,' . base64_encode($korisnikModel->dohvatiKorisnika($korisnickoIme)->slika) . '" style="max-height: 140px; max-width: 280px; min-height:140px ;">'
                                      ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0;">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td rowspan="2">
                                                            <table style=" margin-top:10px ;background-color: white; border: 1px solid black; border-collapse: collapse;"id="oceneDiv"  >
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="border: 1px solid black;">Cena:</td>
                                                                        <td style="border: 1px solid black;"><?php 
                                                                    echo $ocenaModel->prosecnaCena($korisnickoIme)
                                                                    ?></td>
                                                                     <td style="border: 1px solid black; "><?php  
                                                                     if($mozeDaOceni) echo '<textarea name="" id="cena" cols="5" rows="1" style="resize: none"></textarea>';
                                                                      else echo '<textarea name="" id="" cols="5" rows="1" style="resize: none; display:none;"></textarea>';                                                     
                                                                     ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border: 1px solid black;">Dizajn:</td>
                                                                        <td style="border: 1px solid black;"><?php 
                                                                    echo $ocenaModel->prosecnaDizajn($korisnickoIme)
                                                                    ?></td>
                                                                        <td style="border: 1px solid black; "><?php  
                                                                     if($mozeDaOceni) echo '<textarea name="" id="dizajn" cols="5" rows="1" style="resize: none"></textarea>';
                                                                      else echo '<textarea name="" id="" cols="5" rows="1" style="resize: none; display:none;"></textarea>';                                                     
                                                                     ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border: 1px solid black;">Kvalitet:</td>
                                                                        <td style="border: 1px solid black;"><?php 
                                                                    echo $ocenaModel->prosecnaKvalitet($korisnickoIme)
                                                                    ?></td>
                                                                         <td style="border: 1px solid black; "><?php  
                                                                     if($mozeDaOceni) echo '<textarea name="" id="kvalitet" cols="5" rows="1" style="resize: none"></textarea>';
                                                                      else echo '<textarea name="" id="" cols="5" rows="1" style="resize: none; display:none;"></textarea>';                                                     
                                                                     ?></td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        
                                                    <tr>
                                                        <td>
                                                            <button class="dugme" id ="Oceni" style="width: 100px;">Oceni</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <textarea readonly id="" cols="68" rows="14" style="text-align: left; resize: none;">
                                            <?php echo $korisnikModel->dohvatiKorisnika($korisnickoIme)->biografija;?>
                                            </textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;  padding: 5px;">
                            <h3 style="text-align: left; ">Modeli:</h3>
                        </td>
                        <td>
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <h3>Mail kontakt</h3>
                                        </td>
                                        <td style="vertical-align: top;">
                                            <textarea readonly name="" id="" cols="30" rows="2" style=" resize: none;">
                                            <?php echo $korisnikModel->dohvatiKorisnika($korisnickoIme)->email;?>
                                            </textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            
                            <div class="my_profile_gallery">

                                <table>
                                    <tbody>
                                        <tr style="background-color: white;">
                                            
                                            <?php
                                            foreach ( $modeliModel->sviModeli($korisnickoIme) as $red) {
                                               
                                                $str='<td class="no_left"><a href="/'.$controller.'/picture/'.$red->idModel.
                                                '"><img src="data:image/jpeg;base64,'.base64_encode( $red->slika).'" style="max-height: 176px;"></a></td>'; 
                                                
                                                echo $str;
             
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    </body>

    <style>
        td {
            padding-top: 0;
            padding-bottom: 0;
        }

        .no_left {
            padding-left: 0;
            padding-right: 0;
        }
    </style>

    </html>