<?php
//require_once(VENDOR_PATH . DS . 'Tcpdf' .DS. 'tcpdf.php');
App::import('Vendor', 'Detran.Tcpdf',  array('file'=>'Tcpdf' .DS. 'tcpdf.php'));


class XTCPDF  extends TCPDF 
{
    var $xheadertext  = 'DETRAN-RJ - Secretaria da Casa Civil';
    var $xfootertext  = '© %d DETRAN-RJ. Todos os direitos reservados.'; 
    var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    var $xfooterfontsize = 8 ; 
    var $logo = "Detran.png";
    var $barra = "bg_menu_3.png";
    
    function disableHF()
    {
    	$this->logo = "pixel.png";
    	$this->barra = "pixel.png";
    	$this->setPrintFooter(false);
    }
    
    /** 
    * Overwrites the default header 
    * set the text in the view using 
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION'; 
    * set the fill color in the view using 
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b) 
    * set the font in the view using 
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize)); 
    */  
    
    function Header() 
    {
    	//$this->Image(VENDORS . "img" . DS . "topo" . DS . $this->logo  ,10,5,80);
		//$this->Image(VENDORS . "img" . DS . "topo" . DS . $this->barra ,0,15,$this->getPageWidth(),5);
    	$this->Image( App::themePath('Template') . WEBROOT_DIR . DS . Configure::read('App.imageBaseUrl') . DS . "topo" . DS . $this->logo  ,10,5,80);
    	$this->Image(App::themePath('Template') . WEBROOT_DIR . DS . Configure::read('App.imageBaseUrl') . DS . "topo" . DS . $this->barra ,0,15,$this->getPageWidth(),5);
		$this->setY(5);
		list($r, $b, $g) = array(253,195,45);         
		$this->SetFillColor($r, $b, $g);	
    } 

    /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright © %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
    function Footer() 
    {        
        $year = date('Y');        
        $footertext = sprintf($this->xfootertext, $year); 
        $this->SetY(-10); 
        $this->SetTextColor(0, 0, 0); 
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize); 
		$this->Cell(23, 8, 'Pagina: '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'C', 0, '', 0, false, 'T', 'M');         
		$this->Cell(0,8, $footertext,'T',1,'C'); 
		
    }

	function getRemainingWidth() {
		if ($this->rtl) {
			return ($this->x - $this->lMargin);
		} else {
			return ($this->w - $this->rMargin - $this->x);
		}
	}
} 
?>