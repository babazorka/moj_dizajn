<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Moj Dizajn</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link rel="stylesheet" href="/css/css.css">
    <script src="/js/js.js"></script>
    <style>

    </style>

</head>

<!-- <body onclick="javascript:(function(){alert('alo');}())"> primer za p[ozivanje f-je ] -->

<body>
    <div class="grid_header_and_body">
        <div class="grid_header">
            <div class="logo">
                <a href="/Gost">
                    <img src="/logo.png" alt="" style="max-width: 100%; height: 100%;">
                </a>
            </div>
            <div class="layer_pretraga_dizajniraj">
                <div class="layer_pretraga_pretraga_box_2">
                    <div class="pretraga">
                        <!-- Pretraga -->
                        <table>
                            <tbody>
                                <tr style="max-height: 69px;">
                                    <td style="padding: 12px; width: 466px; padding-right: 0; padding-left: 0;">
                                        <form name="searchModels" method="get" action="<?= site_url("Gost/search") ?>">
                                            <input class="search" type="text" value="" name = "search">
                                    </td>
                                    <td style="padding: 0; text-align: right; padding-right: 10px;">
                                        <input type="submit" name="Search" value="Pretraga" height="25px">
                                          </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <a class="dizajniraj" href="/gost/design">
                    <button id="dizajniraj" class="dugme" style="height: 73px; background-color: #389472;">
                        <h1>Dizajniraj</h12>
                    </button>
                </a>
            </div>
            <div class="layer_prijava_registracija">
                <!-- <div class="prijava"> // ovo je bilo pre
                    <a href="/home/login">
                        <button href="/home/login" onclick="alo()">Prijava</button>
                    </a>
                </div> -->
                <a class="prijava" href="/gost/login">
                    <!-- prijava -->
                    <button id="prijava" class="dugme" style="height: 59px;">
                        <h2>Prijava</h2>
                    </button>
                </a>
                <a class="registracija" href="/gost/registration">
                    <!-- registracija -->
                    <button id="registracija" class="dugme" style="height: 59px;">
                        <h2>Registracija</h2>
                    </button>
                </a>
            </div>
        </div>