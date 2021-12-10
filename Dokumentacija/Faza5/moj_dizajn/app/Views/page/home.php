<?php

use App\Models\KorisnikModel;
use App\Models\ModelModeli;

$modeliModel=new ModelModeli();
$korisnikModel=new KorisnikModel();
$query = $modeliModel->svi();
$query1=$korisnikModel->dohvatiDizajnere();
$session=session();
?>
<div class="grid_content">
    <div class="grid_content_left">
        <div class="lista_dizajnera">
            <div class="scroll_designer">
                <table style="width: 100%;">
                    <tbody>

                        <?php
                        $session = session();
                        foreach ($query1 as $red) {
                            $str = '<tr>
                          <td class="no_pads" style="max-width: 140px;">
                              <a href="';
                            if ($controller == 'Dizajner' && $red->korisnicko_ime == $session->get('korisnik')->korisnicko_ime)
                                $str = $str . $controller . '/my_profile';
                            else $str = $str . $controller . '/profile/' . $red->korisnicko_ime;

                            $str = $str . '"><h2 style="background-color: gray; border-radius: 5px;">' . $red->ime_i_prezime . '</h2>
                              </a>
                          </td>
                      </tr>';
                            echo $str;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="galerija" style="padding-right: 0;">
            <div id="container2">
                <table style="max-width: 100%;">
                    <tbody style="padding-left: 8px;">
                        <?php
                        $broj = 1;
                        foreach ($query as $red) {
                            $str = '';
                            if ($broj % 3 == 1) {
                                $str = $str . '<tr>';
                                $zatvori = false;
                            } else $zatvori = true;

                            if($controller=='Gost'){
                                $str = $str . '<td class="no_no_pads" align="center"><a href="/' . $controller . '/picture/' . $red->idModel .
                                '"><img src="data:image/jpeg;base64,' . base64_encode($red->slika) . '" class="imgic"></a></td>';
    
                            }

                            else if($session->get('korisnik')->korisnicko_ime==$red->dizajner)
                            $str = $str . '<td class="no_no_pads" align="center"><a href="/' . $controller . '/myModel/' . $red->idModel .
                            '"><img src="data:image/jpeg;base64,' . base64_encode($red->slika) . '" class="imgic"></a></td>';

                           else  $str = $str . '<td class="no_no_pads" align="center"><a href="/' . $controller . '/picture/' . $red->idModel .
                                '"><img src="data:image/jpeg;base64,' . base64_encode($red->slika) . '" class="imgic"></a></td>';
                            if ($zatvori == true && $broj % 3 == 1) $str = $str . '</tr>';
                            echo $str;
                            $broj++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>


            <?php
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

    .no_no_pads {
        padding: 2.5px;
        min-width: 225px;
        text-align: center;
    }

    #container1 {
        width: 200px;
        height: 526px;
        width: 715px;
        overflow: hidden;
    }

    #container2 {
        width: 100%;
        height: 526px;
        overflow: auto;
    }

    .hrefic {
        display: inline-block;
    }

    .imgic {
        max-height: 137px;
        min-height: 137px;
        max-width: 225px;
    }
</style>

</html>