<?php

use mobile\modulos\modelosRelatorios\Relatorio;
use mobile\functions\Validador;


require 'init.php';
include_once '../mobile/modulos/modelosRelatorios/Relatorio.php';
include_once '../mobile/functions/Validador.php';
include_once '../js/functions.js';

?>

<div style="margin-top:-55px;margin-bottom:8px; width: 100%;">
		<a href="index.php?pag=modulos_view_relatorioView" class="btn btn-primary btn-voltar">
		<span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
</div>
<div class="panel panel-warning">
	<div class="panel-heading">
		<h1>Lista de Relatórios</h1>
	</div>
<div class="panel-body">	
<a href="index.php?page=site_view_relatorioA" style="background-color: green;" class="btn btn-primary btn-novo"><span class="glyphicon glyphicon-plus"></span> Novo Relatório</a>
<table class="listagem table table-bordered table-striped table-responsive"  style="margin-top:10px;">
	<thead>
	<tr>
		<th></th>
		<th style='color: red;'>Igreja</th>
		<th style='color: red;'>Célula</th>
		<th style='color: red;'>Data</th>
		<th style='color: red;'>Estado</th>
		<th style='color: red;'>Cidade</th>
		<th style='color: red;'>Mais</th>
		<th style='color: red;'>Editar</th>
	</tr>
</thead>
	<tbody>
	<?php 
	$rel = new Relatorio();
	$id=null;
    try{
        if(isset($id) && $id > 0){
            $rel->readById($id);
        }else{
            $rel->read();
        }

        $ret = $rel->getDados();
    	$data=null;
        $sec=1;
        if(is_array($ret)){
            Foreach($ret as $raw) {
                $id= $raw['chuId']; $igreja= $raw['chuIgreja']; $endereco= $raw['chuEndereco']; $bairro= $raw['chuBairro']; 
                $cidade= $raw['chuCidade'];$estado= $raw['chuEstado']; $pais= $raw['chuPais']; $cep= $raw['chuCep'];
                $data= $raw['chuData'];$telefone= $raw['chuTelefone'];$email= $raw['chuEmail']; $regiao=$raw['chuRegiao']; 
                $status=$raw['chuStatus'];  $celula= $raw['celCelula'];   $data=$raw['relData'];
                echo "<tr>"; 
                echo "<td style='text-transform:uppercase; color: black;'>", $sec++ ,"</td>";
                echo "<td style='text-transform:uppercase; color: black;'>", $igreja,"</td>";
                echo "<td style='text-transform:uppercase; color: black;'>", $celula,"° REGIÃO</td>";
                echo "<td style='text-transform:uppercase; color: black;'>", Validador::bancoToUser( $data),"</td>";
                echo "<td style='text-transform:uppercase; color: black;'>", $estado,"</td>";
                echo "<td style='text-transform:uppercase; color: black;'>", $cidade,"</td>";
                echo "<td><a href='index.php?page=modulos_view_churchDetailsView&id=$id' class='btn btn-primary'><span class='glyphicon glyphicon-plus'></span></a></td>";
                echo "<td><a href='index.php?page=modulos_view_churchUpdateView&id=$id' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></a></td>";
                echo "</tr>";
            }
     
          }   
    	}catch (PDOException $error) {
    	    echo "Error ".$error->getMessage();
    	}
    	
	?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="13" class="text-center"> <?php echo date('d/m/Y h:i:s'); ?></th>
		</tr>
	</tfoot>
 </table>
 </div>
</div>