<?php
require_once('Tcpdf/TCPDF/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = './img/relatorio/brasaoEstadual.jpg';
        $this->Image($image_file, 96, 10, 30, '', 'JPG', '', 'N', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('times', 'N', 9);
        // Title
        $this->Cell(
            $w = 0, 
            $h = 0,
            $txt = 'Governo do Estado do Rio de Janeiro',
            $border = 0,
            $ln = 1,
            $align = 'C',
            $fill = false,
            $link = '',
            $stretch = 0,
            $ignore_min_height = false,
            $calign = 'T',
            $valign = 'M'
        );
        $this->Cell(
            $w = 0, 
            $h = 0,
            $txt = 'Secretaria da Casa Civil',
            $border = 0,
            $ln = 1,
            $align = 'C',
            $fill = false,
            $link = '',
            $stretch = 0,
            $ignore_min_height = false,
            $calign = 'T',
            $valign = 'M'
        );
        $this->Cell(
            $w = 0, 
            $h = 0,
            $txt = 'Departamento de Trânsito do Estado do Rio de Janeiro',
            $border = 0,
            $ln = 1,
            $align = 'C',
            $fill = false,
            $link = '',
            $stretch = 0,
            $ignore_min_height = false,
            $calign = 'T',
            $valign = 'M'
        );
            
 	 
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


$a = array();

for($x = 0; $x < 2; $x++)
{   
    // create new PDF document
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 003');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, 30, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(30, 60, 20);
        $pdf->SetHeaderMargin(60);
        $pdf->SetFooterMargin(25);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

    for($i = 0; $i < 3; $i++){
        

        $pdf->AddPage();

        if(true){
            $pdf->SetFont('Helvetica', 'N', 10);
            $html = '
                <table  cellspacing="6">
                    <tr>
                        <td style="text-align: center;" colspan="2">Serviço Público Estadual</td>
                    </tr>                
                    <tr>
                        <td colspan="2">Processo nº. E-12/'.$x.'/'.$i.'</td>
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
                35,
                136,
                5,
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
            $pdf->SetFont('times', 'N', 12);
            $html = '
                <table cellspacing="6">
                    <tr>
                        <td><strong>Of.DETRAN-RJ/DIJUR nº 00000/2016</strong></td>
                        <td style="text-align: right">Rio de Janeiro, 26 de Janeiro de 2017</td>
                    </tr>
                    <tr>
                        <td colspan="2">Processo Administrativo: E-12/000/00000/2016 (favor mencionar na resposta)</td>                
                    </tr>
                </table>
            ';
            $pdf->writeHTMLCell(
                160,
                0,
                30,
                60,
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
                <table cellspacing="1">
                    <tr>                
                        <td>Processo nº. 0112774-14-2013.8.19.0001</td>
                    </tr>
                    <tr>
                        <td>Documento Gerador:: 489/2016/OF</td>                
                    </tr>
                </table>
            ';
            $pdf->writeHTMLCell(
                160,
                0,
                30,
                77,
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
                <table cellspacing="1">
                    <tr>                
                        <td>Exmo. Sr. Juiz</td>
                    </tr>
                    <tr>
                        <td>39ª Vara Criminal da Comarca da Capital</td>                
                    </tr>
                </table>
            ';
            $pdf->writeHTMLCell(
                160,
                0,
                30,
                95,
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
                <ol style="text-align: justify">
                    <li>Modelo para associar 2 testeMussum Ipsum, cacilds vidis lit<span style="font-family:Comic Sans MS,cursive">ro abertis. Pra l&aacute; , depois divoltis porris, paradis. Nullam volutpat ri</span>sus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m<strong>&eacute; pra quem &eacute; amistosis quis leo. Sapien in m</strong>onti palavris qui num significa nadis i pareci latim.Casamentiss faiz malandris se pirulit&aacute;. Delegadis gente finis, bibendum egestas augue arcu ut est. A ordem dos tratores n&atilde;o altera o p&atilde;o duris Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.</li>
                    <li>Manduma pindureta quium dia nois paga. Suco de cevadiss, &eacute; um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Atirei o pau no gatis, per gatis num morreus. Copo furadis &eacute; disculpa de bebadis, arcu quam euismod magna.aumentar mais o tamanhaoModelo para associar 2 teste</li>
                </ol>

                <p style="text-align: justify">Mussum Ipsum, cacilds vidis litro abertis. Pra l&aacute; , depois d<u>ivoltis porris, paradis. Nullam volutpat r</u>isus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m&eacute; pra quem &eacute; amistosis quis leo. Sapien in monti palavris qui num significa nadis i pareci latim.<br />
                Casamentiss faiz malandris se pirul<em>it&aacute;. Delegadis gente finis, bibendum egestas augue arcu ut est. A ordem dos tratores n&atilde;o altera o p&atilde;o duris Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Interessantiss quisso pudia ce recei</em>ta de bolis, mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.<br />
                Manduma pindureta quium dia nois paga. Suco de cevadiss, &eacute; um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Atirei o pau no gatis, per gatis num morreus. Copo furadis &eacute; disculpa de bebadis, arcu quam euismod magna.aumentar mais o tamanhaoModelo para associar 2 teste<br />
                Mussum Ipsum, cacilds vidis litro abertis. Pra l&aacute; , depois divoltis porris, paradis. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m&eacute; pra quem &eacute; amistosis quis leo. Sapien in monti palavris qui num significa nadis i pareci latim.</p>

                <ul style="text-align: justify">
                    <li>Casamentiss faiz malandris se pirulit&aacute;. Delegadis gente finis, bibendum egestas augue arcu ut est. A ordem dos tratores n&atilde;o altera o p&atilde;o duris Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Interessantiss quisso pudia ce recei<span style="font-family:Georgia,serif">ta de bolis, mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.Manduma pindureta quium dia nois paga. Suco de cevadiss, &eacute; um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Atirei o pau no gatis, per gatis num morreus. Copo furadis &eacute; disculpa de bebadis, ar</span>cu quam euismod magna.aumentar mais o tamanhaoModelo para associar 2 testeMussum Ipsum, cacilds vidis litro abertis. Pra l&aacute; , depois divoltis porris, paradis. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m&eacute; pra quem &eacute; amistosis quis leo. Sapien in monti palavris qui num<span style="font-family:Arial,Helvetica,sans-serif"> significa nadis i pareci latim.Casamentiss faiz malandris se pirulit&aacute;. Delegadis gente finis, bibendum egestas augue arcu ut est. A ordem dos tratores n&atilde;o altera o p&atilde;o duris Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.</span></li>
                    <li><span style="font-family:Arial,Helvetica,sans-serif">Manduma pindureta quium dia nois paga. Suco de cevadiss, &eacute; um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Atirei o pau no gatis, per gatis num morreus. Copo furadis &eacute; disculpa de bebadis, arcu quam euismod magna.aumentar mais o tamanhaoModelo para associ</span>ar 2 testeMussum Ipsum, cacilds vidis litro abertis. Pra l&aacute; , depois divoltis porris, paradis. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. in elementis m&eacute; pra quem &eacute; amistosis quis leo. Sapien in monti palavris qui num significa nadis i pareci latim.Casamentiss faiz malandris se pirulit&aacute;. Delegadis gente finis, bibendum egestas augue arcu ut est. A ordem dos tratores n&atilde;o altera o p&atilde;o duris Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius.  
                    Aenean aliquam molestie leo, vitae iaculis nisl.mais bolis eu num gostis. Viva Forevis aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Posuere libero varius.  
                    </li>
                </ul>
            ';
            $pdf->writeHTML($html, true, false, false, false, '');
        }

        if(true){
            $pdf->SetFont('times', 'N', 12);          

            //echo $height;

            $html = '            
                <table nobr="true">
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
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
            $pdf->writeHTML($html, true, false, false, false, ''); 
        }      
        $pdf->lastPage();        
    }
    $a[] = base64_encode($pdf->Output('example_'.$x.'.pdf', 'S'));
}

//$pdf->Output('','I');

$data = base64_decode($a[0]);
$data = base64_decode($a[1]);
header('Content-Type: application/pdf');
echo $data;


