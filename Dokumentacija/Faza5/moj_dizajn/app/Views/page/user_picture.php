<?php
use App\Models\KorisnikModel;
use App\Models\ModelModeli;
use App\Models\Tag_ModelModel;
$id = $id_slike;
$modelModeli=new ModelModeli();
$korisnikModel=new KorisnikModel();
$tagModelModel=new Tag_ModelModel();
$query = $red=$modelModeli->dohvatiModel($id);
$query1=$tagModelModel->mySearch($id);
$dizajner=$korisnikModel->dohvatiKorisnika($query->dizajner);
?>

<div class="grid_content">
    <div class="grid_content_left">
        <div class="lista_dizajnera" style="background-color:#C0CCA3;">
            <table style="width: 100%; border-spacing: 0;">
                <tbody>
                    <tr style="background-color: #afafaf; height: 470px;">
                        <td style="vertical-align: top; padding-top: 0;">
                            <table style="width: 100%;">
                                <tbody>
                                 <?php
                                foreach ($query1 as $tag) {
                                    $str='<tr><td class="no_pads no_side_pads" class="" style="max-width: 140px;">
                                        <h2 style="background-color: gray; border-radius: 5px;">'.$tag->idTag.'</h2>
                                    </td>
                                </tr>';
                                echo $str;
                               }
                        ?>
                                   
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                    <?php
                    $strana='href="/'.$controller.'/obrisi/'.$dizajner->korisnicko_ime.'/'.$id.'"';
                       ?>   
                        <td style="padding: 0; padding-top: 15px;">
                         <a <?php echo $strana ?>> <button class="dugme" id="dizajner"  style="width: 100%; ">Obrisi</button></a>  
                        </td>
                        
                    </tr>
                    
                </tbody>
            </table>
        </div>

        <div class="galerija">

            <?php
           
            echo '<img src="data:image/jpeg;base64,' . base64_encode($query->slika) . '" style="min-width: 710px; max-width: 715px; min-height: 520px ; max-height: 526px;"';

            ?>
        </div>
    </div>
</div>
</div>
</body>
<style>
    .no_pads {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .no_side_pads {
        padding-left: 0;
        padding-right: 0;
    }
</style>

</html>