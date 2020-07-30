<?php echo '<?xml version="1.0"?>';  error_reporting(0); ?>
<?php echo '<?mso-application progid="Excel.Sheet"?>'; ?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:html="http://www.w3.org/TR/REC-html40">
 <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">
  <Author>lmilmanda</Author>
  <LastAuthor>lmilmanda</LastAuthor>
  <Created>2013-02-07T16:23:01Z</Created>
  <LastSaved>2013-02-07T16:25:53Z</LastSaved>
  <Company>Makro</Company>
  <Version>12.00</Version>
 </DocumentProperties>
 <OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">
  <AllowPNG/>
 </OfficeDocumentSettings>
 <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">
  <WindowHeight>6120</WindowHeight>
  <WindowWidth>13815</WindowWidth>
  <WindowTopX>840</WindowTopX>
  <WindowTopY>420</WindowTopY>
  <ProtectStructure>False</ProtectStructure>
  <ProtectWindows>False</ProtectWindows>
 </ExcelWorkbook>
 <Styles>
  <Style ss:ID="Default" ss:Name="Normal">
   <Alignment ss:Vertical="Bottom"/>
   <Borders/>
   <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID="s62">
   <Borders>
    <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
   </Borders>
   <Font ss:FontName="Calibri" x:Family="Swiss" ss:Size="11" ss:Color="#000000"
    ss:Bold="1"/>
   <Interior ss:Color="#C5D9F1" ss:Pattern="Solid"/>
  </Style>
 </Styles>
 <Worksheet ss:Name="<?php echo $sheet ?>">
 <?php
  $rowcount = 1;
  $columncount = 0;
  foreach( $report as $rows ) {
	if($rows == NULL) {
	} else {
		foreach($rows as $r){
			$rowcount++;
		}
		if(sizeof($rows[0]) > $columncount){
			$columncount = sizeof($rows[0]);
		}
	}
  }
  ?>
  <Names>
   <NamedRange ss:Name="_FilterDatabase"
    ss:RefersTo="='Titulo del Reporte'!R1C1:R<?php echo $rowcount ?>C<?php echo $columncount ?>" ss:Hidden="1"/>
  </Names>
  <Table ss:ExpandedColumnCount="<?php echo $columncount ?>" ss:ExpandedRowCount="<?php echo $rowcount ?>" x:FullColumns="1"
   x:FullRows="1" ss:DefaultColumnWidth="60" ss:DefaultRowHeight="15">
   <Column ss:AutoFitWidth="0" ss:Width="53.25"/>
  <?php 

	$doheader = TRUE;
    foreach( $report as $rows ) {
    if($rows == NULL) {
	} else {
	 foreach( $rows as $row ) { 
	 //echo 123;
		if($doheader){
		//echo 312;
		$doheader = FALSE;?>
    <Row ss:AutoFitHeight="0" ss:StyleID="s62"><?php  foreach ($row as $cell => $value) { 
?>

	 <Cell><Data ss:Type="String"><?php echo $cell; ?></Data><NamedCell ss:Name="_FilterDatabase"/></Cell><?php } 
?>

      </Row>
<?php } ?>
      <Row ss:AutoFitHeight="0">
<?php 
   foreach ($row as $cell => $value) {
   $type = "String";
   if(is_numeric($value)){
	$type = "Number";
   }
?>
	  <Cell><Data ss:Type="<?php echo $type; ?>"><?php echo $value; ?></Data><NamedCell ss:Name="_FilterDatabase"/></Cell>
   <?php } ?>
   </Row>
   <?php 
	 }
	}
   } ?>
   </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Header x:Margin="0.3"/>
    <Footer x:Margin="0.3"/>
    <PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>
   </PageSetup>
   <Unsynced/>
   <Print>
    <ValidPrinterInfo/>
    <PaperSizeIndex>9</PaperSizeIndex>
    <HorizontalResolution>600</HorizontalResolution>
    <VerticalResolution>600</VerticalResolution>
   </Print>
   <Selected/>
   <Panes>
    <Pane>
     <Number>3</Number>
     <ActiveRow>6</ActiveRow>
     <ActiveCol>5</ActiveCol>
    </Pane>
   </Panes>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
  <AutoFilter x:Range="R1C1:R<?php echo $rowcount ?>C<?php echo $columncount ?>" xmlns="urn:schemas-microsoft-com:office:excel">
  </AutoFilter>
 </Worksheet>
 <Worksheet ss:Name="SQL">
  <Table ss:ExpandedColumnCount="1" ss:ExpandedRowCount="1" x:FullColumns="1"
   x:FullRows="1" ss:DefaultColumnWidth="60" ss:DefaultRowHeight="15">
   <Row>
    <Cell><Data ss:Type="String"><?php echo $sql?></Data></Cell>
   </Row>
  </Table>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">
   <PageSetup>
    <Header x:Margin="0.3"/>
    <Footer x:Margin="0.3"/>
    <PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>
   </PageSetup>
   <Panes>
    <Pane>
     <Number>3</Number>
     <ActiveRow>15</ActiveRow>
     <ActiveCol>1</ActiveCol>
    </Pane>
   </Panes>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
</Workbook>
