<?php
require_once('Tcpdf/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = './img/relatorio/brasaoEstadual.jpg';
        $this->Image($image_file, 90, 10, 30, '', 'JPG', '', 'N', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'N', 8);
        // Title
        $this->Cell(0, 0, 'Governo do Estado do Rio de Janeiro', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 0, 'Secretaria da Casa Civil', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 0, 'Departamento de Trânsito do Estado do Rio de Janeiro', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        //$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 55, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

for($i = 0; $i < 10; $i++){
    $pdf->AddPage();

    if(true){
        $pdf->SetFont('times', 'N', 10);
        $html = '
            <table>
                <tr>
                    <td style="text-align: center;" colspan="2">Serviço Público Estadual</td>
                </tr>
                <tr>
                    <td colspan="2">Processo nº. OF161216/161216/161216/2015</td>
                </tr>
                <tr>
                    <td>Data:</td>
                    <td>Fls:</td>
                </tr>
                <tr>
                    <td>Rubrica:</td>
                    <td>ID:</td>
                </tr>
            </table>
        ';
        $pdf->writeHTMLCell(
            70,
            30,
            130,
            10,
            $html,
            1,
            1,
            false,
            true,
            'L',
            true
        );
    }

    if(true){
        $pdf->SetFont('times', 'B', 12);
        $html = '
            <table>
                <tr>
                    <td>Of.DETRAN-RJ/DIJUR nº 00000/2016</td>
                    <td style="text-align: right">Rio de Janeiro, 26 de Janeiro de 2017</td>
                </tr>
                <tr>
                    <td colspan="2">Processo Administrativo: E-12/000/00000/2016 (favor mencionar na resposta)</td>                
                </tr>
            </table>
        ';
        $pdf->writeHTMLCell(
            190,
            10,
            10,
            55,
            $html,
            0,
            1,
            false,
            true,
            'L',
            true
        );
    }

    if(true){
        $pdf->SetFont('times', 'N', 12);
        $html = '
            <table>
                <tr>                
                    <td>Processo nº. 0112774-14-2013.8.19.0001</td>
                </tr>
                <tr>
                    <td>Documento Gerador:: 489/2016/OF</td>                
                </tr>
            </table>
        ';
        $pdf->writeHTMLCell(
            190,
            10,
            10,
            70,
            $html,
            0,
            1,
            false,
            true,
            'L',
            true
        );
    }

    if(true){
        $pdf->SetFont('times', 'N', 12);
        $html = '
            <table>
                <tr>                
                    <td>Exmo. Sr. Juiz</td>
                </tr>
                <tr>
                    <td>39ª Vara Criminal da Comarca da Capital</td>                
                </tr>
            </table>
        ';
        $pdf->writeHTMLCell(
            190,
            10,
            10,
            90,
            $html,
            0,
            1,
            false,
            true,
            'L',
            true
        );
    }

    if(true){
        $pdf->SetFont('times', 'N', 12);
        $html = '
            <ol>
                <li>Modelo para associar 2 testeMussum Ipsum, cacilds vidis lit<span style="font-family:Comic Sans MS,cursive">ro abertis. Pra l&aacute; , depois divoltis porris, paradis. Nullam volutpat ri</span>sus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m<strong>&eacute; pra quem &eacute; amistosis quis leo. Sapien in m</strong>onti palavris qui num significa nadis i pareci latim.Casamentiss faiz malandris se pirulit&aacute;. Delegadis gente finis, bibendum egestas augue arcu ut est. A ordem dos tratores n&atilde;o altera o p&atilde;o duris Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.</li>
                <li>Manduma pindureta quium dia nois paga. Suco de cevadiss, &eacute; um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Atirei o pau no gatis, per gatis num morreus. Copo furadis &eacute; disculpa de bebadis, arcu quam euismod magna.aumentar mais o tamanhaoModelo para associar 2 teste</li>
            </ol>

            <p>Mussum Ipsum, cacilds vidis litro abertis. Pra l&aacute; , depois d<u>ivoltis porris, paradis. Nullam volutpat r</u>isus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m&eacute; pra quem &eacute; amistosis quis leo. Sapien in monti palavris qui num significa nadis i pareci latim.<br />
            Casamentiss faiz malandris se pirul<em>it&aacute;. Delegadis gente finis, bibendum egestas augue arcu ut est. A ordem dos tratores n&atilde;o altera o p&atilde;o duris Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Interessantiss quisso pudia ce recei</em>ta de bolis, mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.<br />
            Manduma pindureta quium dia nois paga. Suco de cevadiss, &eacute; um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Atirei o pau no gatis, per gatis num morreus. Copo furadis &eacute; disculpa de bebadis, arcu quam euismod magna.aumentar mais o tamanhaoModelo para associar 2 teste<br />
            Mussum Ipsum, cacilds vidis litro abertis. Pra l&aacute; , depois divoltis porris, paradis. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m&eacute; pra quem &eacute; amistosis quis leo. Sapien in monti palavris qui num significa nadis i pareci latim.</p>

            <ul>
                <li>Casamentiss faiz malandris se pirulit&aacute;. Delegadis gente finis, bibendum egestas augue arcu ut est. A ordem dos tratores n&atilde;o altera o p&atilde;o duris Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Interessantiss quisso pudia ce recei<span style="font-family:Georgia,serif">ta de bolis, mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.Manduma pindureta quium dia nois paga. Suco de cevadiss, &eacute; um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Atirei o pau no gatis, per gatis num morreus. Copo furadis &eacute; disculpa de bebadis, ar</span>cu quam euismod magna.aumentar mais o tamanhaoModelo para associar 2 testeMussum Ipsum, cacilds vidis litro abertis. Pra l&aacute; , depois divoltis porris, paradis. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m&eacute; pra quem &eacute; amistosis quis leo. Sapien in monti palavris qui num<span style="font-family:Arial,Helvetica,sans-serif"> significa nadis i pareci latim.Casamentiss faiz malandris se pirulit&aacute;. Delegadis gente finis, bibendum egestas augue arcu ut est. A ordem dos tratores n&atilde;o altera o p&atilde;o duris Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.</span></li>
                <li><span style="font-family:Arial,Helvetica,sans-serif">Manduma pindureta quium dia nois paga. Suco de cevadiss, &eacute; um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Atirei o pau no gatis, per gatis num morreus. Copo furadis &eacute; disculpa de bebadis, arcu quam euismod magna.aumentar mais o tamanhaoModelo para associ</span>ar 2 testeMussum Ipsum, cacilds vidis litro abertis. Pra l&aacute; , depois divoltis porris, paradis. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m&eacute; pra quem &eacute; amistosis quis leo. Sapien in monti palavris qui num significa nadis i pareci latim.Casamentiss faiz malandris se pirulit&aacute;. Delegadis gente finis, bibendum egestas augue arcu ut est. A ordem dos tratores n&atilde;o altera o p&atilde;o duris Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.Manduma pindureta quium dia nois paga. Suco de cevadiss, &eacute; um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Atirei o pau no gatis, per gatis num morreus. Copo furadis &eacute; disculpa de bebadis, arcu quam euismod magna.aumentar mais o tamanhao5299Modelo para associar 2 testeMussum Ipsum, cacilds vidis litro abertis. Pra l&aacute; , depois divoltis porris, paradis. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m&eacute; pra quem &eacute; amistosis quis leo. Sapien in monti palavris qui num significa nadis i pareci latim tstestest xvxc vxcvxcvcxv&nbsp; cxdvxcvl&ccedil;xc, vl&ccedil;lv~&ccedil;xc. 4</li>
            </ul>
        ';
        $pdf->writeHTML($html, true, false, false, false, '');
    }

    if(true){
        $pdf->SetFont('times', 'N', 12);
        $html = '
            <table>
                <tr>                
                    <td><strong>JOÃO JOSÉ DA SILVA XAVIER</strong></td>
                </tr>
                <tr>
                    <td>Setor de Informações Jurídicas</td>                
                </tr>
                <tr>
                    <td>Diretoria Jurídica - DETRAN-RJ</td>
                </tr>
            </table>
        ';
        $pdf->writeHTMLCell(
            190,
            10,
            10,
            $pdf->getY() + ($pdf->getY() - $pdf->getPage()),
            $html,
            0,
            1,
            false,
            true,
            'L',
            true
        );
    }

    $pdf->lastPage();
}

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+