<div class="grid_content" onload="init()">
    <div class="grid_content_half">
        <div class="grid_canvas">
            <canvas id="canvas" height="330" width="447" style="border:2px solid;"></canvas>
            <table>
                <tr>
                    <th colspan="6">Izaberite Boju</th>
                </tr>
                <tr style="height: 40px;">
                    <td style="width:40px; background:black;" id="black" onclick="color(this)"></td>
                    <td style="width:40px; background:blue;" id="blue" onclick="color(this)"></td>
                    <td style="width:40px; background:green;" id="green" onclick="color(this)"></td>
                    <td style="width:40px; background:red;" id="red" onclick="color(this)"></td>
                    <td style="width:40px; background:orange;" id="orange" onclick="color(this)"></td>
                </tr>
                <tr style="height: 40px;">
                    <td colspan="5" style="background:white;border:2px solid;" id="white" onclick="color(this)">
                    </td>
                </tr>
                <tr>
                    <!-- <td colspan="3">
                                <input type="button" value="Preuzmi model" id="btn" size="30" onclick="save()">
                            </td> -->
                    <td class="no_pad" style="text-align: left;  padding: 0;" colspan="3">
                        <button onclick="save()" id="preuzmi_model" class="dugme" style="width: 177px;">Preuzmi model</button>
                    </td>
                    <!-- <td colspan="3">
                                <input type="button" value="Očisti tablu" id="clr" size="23" onclick="erase()">
                            </td> -->
                    <td class="no_pad" style="text-align: right; padding: 0;" colspan="2">
                        <button onclick="erase()" id="preuzmi_model" class="dugme" style="width: 116px;">Ocisti</button>
                    </td>
                </tr>
            </table>
            <!-- <img id="canvasimg" style="display:none;"> -->
            <!-- otkomentarisati iznad za pokaivanje modela -->
        </div>
        <div class="grid_desno">
            <!-- <div class="grid_komentar"> -->
            <!-- <h3 style="text-align: left;">Komentar:</h3> -->
            <!-- <textarea name="Komentar" id="komentar" style="resize: none; text-align: left;"></textarea> -->
            <!-- <label for="koemtar" style="text-align: left;">Komentar</label>
                        <textarea name="koemtar" id="koemtar" cols="30" rows="10"></textarea> -->
            <!-- </div> -->
            <!-- <div class="grid_linkovi"> -->
            <!-- <textarea name="linkovi" id="komentar" style="resize: none; text-align: left;"></textarea> -->
            <!-- </div> -->
            <!-- <div class="grid_dugmici"> -->
            <!-- <textarea name="linkovi" id="komentar" style="resize: none; text-align: left;"></textarea> -->
            <!-- </div> -->
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th style="text-align: left;">Komentar:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left; padding: 0;">
                            <textarea name="" id="komentar" cols="61" rows="15" style="resize: none; text-align: left;"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th style="text-align: left;">Linkovi:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left; padding: 0;">
                            <textarea name="" id="linkovi" cols="61" rows="2" style="resize: none;  text-align: left;"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th style="text-align: left;">Email dizajnera:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left; padding: 0;">
                            <textarea name="" id="mejl" cols="61" rows="2" style="resize: none;  text-align: left;"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th style="text-align: left;">Otpremi model:</th>
                        <th style="text-align: left; width: 30%;">Sacuvaj:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="height: 68px;">
                        <!-- <td style="text-align: left; padding: 0;">
                                    <button id="otpremi" style="height: 40px; width: 120px;">Otpremi</button>
                                </td> -->

                        <td class="no_pad" style="text-align: left;  padding: 0;">
                            <form action=<?php echo '/' . $controller . '/dodajModel' ?> method="post" enctype="multipart/form-data">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Otpremi" name="submit" id="poslato">
                            </form>
                        </td>
                        <!-- <td style="text-align: left; padding: 0;">
                                    <button id="sacuvaj" style="height: 40px; width: 120px;">Sacuvaj</button>
                                </td> -->
                        <td class="no_pad" style="text-align: left;  padding: 0;">
                            <!-- <button id="otpremi" class="dugme" style="width: 177px;">Sacuvaj</button> -->
                            <button id="sacuvaj" class="dugme" style="width: 110px;">Sacuvaj</button>
                        </td>

                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>
</div>
</body>

<style>
    .grid_dugmici {
        display: grid;
        /* grid-template-columns: 1fr 1fr; */
        padding: 10px;
        padding-bottom: 0px;
        background-color: black;
    }

    .grid_linkovi {
        display: grid;
        padding: 5px;
        /* padding-bottom: 0px; */
        background-color: red;
    }

    .grid_komentar {
        display: grid;
        background-color: blue;
    }

    .grid_canvas {
        display: grid;
        height: 500px;
        grid-template-rows: 5fr 1fr;
        background-color: white;
        margin: 4px;
    }

    .grid_desno {
        /* display: grid; */
        /* grid-template-rows: 2.5fr 1fr 1fr;
        padding: 5px;
        padding-left: 2px;
        padding-bottom: 21px; */
    }
</style>

<script>
    $(document).ready(function() {
        init()
        $("#sacuvaj").click(function() {
            if (document.getElementById("fileToUpload").files.length === 0) {
                alert("nema slike");
                return;
            }
            let komentar = document.getElementById('komentar').value;
            let linkovi = document.getElementById('linkovi').value;
            let mejl = document.getElementById('mejl').value;
            if (komentar == "" || mejl == "") {
                alert("Nepotpuna forma! ");
                return;
            }

            $.ajax({
                url: "<?php echo base_url($controller . '/uploadDizajna'); ?>",
                type: "post",
                data: {
                    komentar: komentar,
                    linkovi: linkovi,
                    mejl: mejl,
                },
                success: function() {

                    window.location.href = "/Dizajner";
                },
                error: function() {

                },
            })
        })

    });
    var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;

    var x = "black",
        y = 2;

    function init() {
        canvas = document.getElementById('canvas');
        ctx = canvas.getContext("2d");
        w = canvas.width;
        h = canvas.height;

        canvas.addEventListener("mousemove", function(e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function(e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function(e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function(e) {
            findxy('out', e)
        }, false);
    }

    function color(obj) {
        switch (obj.id) {
            case "green":
                x = "green";
                break;
            case "blue":
                x = "blue";
                break;
            case "red":
                x = "red";
                break;
            case "yellow":
                x = "yellow";
                break;
            case "orange":
                x = "orange";
                break;
            case "black":
                x = "black";
                break;
            case "white":
                x = "white";
                break;
        }
        if (x == "white") y = 14;
        else y = 2;

    }

    function draw() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = y;
        ctx.stroke();
        ctx.closePath();
    }

    function erase() {
        var m = confirm("Da li zelite da ocistite tablu?");
        if (m) {
            ctx.clearRect(0, 0, w, h);
            // document.getElementById("canvasimg").style.display = "none";
            // otkomentarisati iznad za pokaivanje modela
        }
    }

    function save() {
        // document.getElementById("canvasimg").style.border = "2px solid";
        // otkomentarisati iznad za pokaivanje modela

        var dataURL = canvas.toDataURL();
        // document.getElementById("canvasimg").src = dataURL;
        // document.getElementById("canvasimg").style.display = "inline";
        // otkomentarisati iznad za pokaivanje modela

        a = document.createElement("a");
        document.body.appendChild(a);
        a.href = dataURL;
        a.download = "canvas.png";
        a.click();
        document.body.removeChild(a);
    }

    function findxy(res, e) {
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - canvas.offsetLeft;
            currY = e.clientY - canvas.offsetTop;

            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - canvas.offsetLeft;
                currY = e.clientY - canvas.offsetTop;
                draw();
            }
        }
    }
</script>

</html>