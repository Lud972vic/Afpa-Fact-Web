<?php
require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/custom/font/directory',
    ]),
    'fontdata' => $fontData + [
            'lato' => [
                'R' => 'Lato-Light.ttf',
                'I' => 'Lato-Bold.ttf',
            ]
        ],
    'default_font' => 'lato'
]);

$mpdf->WriteHTML('<h1 align="center" style="color: #343a40">Edition de la facture n° ' . $_GET['p'][0] . '</h1>');
$mpdf->WriteHTML('<hr style="color: #f0ad4e">');
$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('<br>');

$mpdf->WriteHTML('<p><strong>TVA à </strong>' . $_GET['p'][1] . '</p>');
$mpdf->WriteHTML('<p><strong>NOM DU CLIENT</strong> ' . $_GET['p'][2] . '</p>');
$mpdf->WriteHTML('<p><strong>E-MAIL</strong> ' . $_GET['p'][3] . '</p>');

$mpdf->WriteHTML('<p><strong>FACTURE DE</strong> ' . $_GET['p'][5] . '</p>');
$mpdf->WriteHTML('<p><strong>DESIGNATION</strong> ' . $_GET['p'][6] . '</p>');
$mpdf->WriteHTML('<p><strong>QUANTITE</strong> ' . $_GET['p'][7] . '</p>');
$mpdf->WriteHTML('<p><strong>PRIX</strong> ' . $_GET['p'][8] . '</p>');
$mpdf->WriteHTML('<p><strong>TAXE</strong> ' . $_GET['p'][9] . '</p>');
$mpdf->WriteHTML('<p><strong>DESIGNATION</strong> ' . $_GET['p'][10] . '</p>');

$mpdf->WriteHTML('<h2 align="right" style="color: #f0ad4e"><strong>TOTAL FACTURE</strong> ' . ($_GET['p'][8] + $_GET['p'][9]) . ' € </h2>');

$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('<hr style="color: #f0ad4e">');
$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('<p align="center" style="font-style:oblique"> DATE DE LA FACTURE ' . $_GET['p'][4] . '</p>');

$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('<p align="center"><img src="assets/img/tampon-facture-acquittee.jpg" width="50%"></p>');

$mpdf->WriteHTML('<br>');
$mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td width="25%">Editer le {DATE j-m-Y}</td>
        <td width="50%" align="center" style="color: darkgray">FactWeb par <img src="assets/img/github_48px.png" width="2.5%">Lud972vic - Logiciel de devis & facture en ligne automatisé 100% Web Optimisez votre relation avec vos clients, vos fournisseurs et votre comptable…</td>
        <td width="25%" style="text-align: right;"> Fact n°' . $_GET['p'][0] . ' P{PAGENO}/{nbpg}</td>
    </tr>
</table>');
$mpdf->Output();
