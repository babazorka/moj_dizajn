<div class="galerija" style="padding-right: 0;  background-color: #C0CCA3;">
    <div id="container2" style="background-color: #899176;">
        <table style="max-width: 100%;">
            <tbody style="padding-left: 8px;">
                <?php
                if (!empty($data)) {
                    $broj = 1;
                    foreach ($data as $red) {
                        $str = '';
                        if ($broj % 3 == 1) {
                            $str = $str . '<tr>';
                            $zatvori = false;
                        } else $zatvori = true;
                        $str = $str . '<td class="no_no_pads" align="center"><a href="/' . $controller . '/picture/' . $red->idModel .
                            '"><img src="data:image/jpeg;base64,' . base64_encode($red->slika) . '" class="imgic"></a></td>';
                        if ($zatvori == true && $broj % 3 == 1)
                            $str = $str . '</tr>';
                        echo $str;
                        $broj++;
                    }
                } else {
                    echo "Nema rezultata pretrage.";
                }
                ?>
            </tbody>
        </table>
    </div>



    <?php
    ?>
</div>
</body>
<style>
    #container2 {
        width: 100%;
        height: 526px;
        overflow: auto;
    }

    .imgic {
        max-height: 240px;
        min-height: 137px;
        max-width: 300px;
    }
</style>

</html>