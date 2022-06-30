<?php require_once './views/Pages/header.php'; ?>
    <body>
    <?php if(!empty($returnMessage)): ?>
        <div class="box-message">
            <p><?= $returnMessage ?></p>
            <button class="btn-close-message" onclick="reload()">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
        </div>
    <?php endif; ?>

   
    <style>
        th, td {
            /* min-width: 50px; */
            width: 100%; 
        }

        .content {
            /* margin: 0 15px !important; */
            width: 88%;
        }
    </style>
    <div class="container-header">
		<div class="content-header">
			<!-- <img src="./views/assets/logo.svg">	 -->
            <div><h3 style="color: #fff">Listagem NFe</h3></div>		

			<!-- Botão para acionar modal -->
            <a class="button" href="./index.php?a=goNew">
                <button type="button" >
                    Novo upload xml
                </button>
            </a> 
		</div>
	</div>
    <!-- <a class="button" href="./index.php?a=goNew">Novo upload xml</a> -->
    <div class="main">
        <div class="content-table"  style="overflow-x: scroll;">
            <table class="">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Número NF</th>
                        <th>Data Emissão</th>
                        <th>Valor NF</th>                    
                        <th>CNPJ Destinatário</th>   
                        <th>Nome Destinatário</th>   
                        <th>IE </th>   
                        <th>Logradouro </th>   
                        <th>Número </th>   
                        <th>Bairro </th>   
                        <th>Cod Município </th>   
                        <th>Município </th>
                        <th>UF </th>   
                        <th>CEP </th> 
                        <th>Cod País </th> 
                        <th>Telefone </th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $data): ?>
                       
                            <td> <?= $data["numero_nf"]; ?> </td>
                            <td> <?= date("d/m/Y H:i:s", strtotime($data["data_emissao"])); ?> </td>
                            <td> <?= $data["valor_nf"]; ?> </td>
                            <td> <?= $data["dest_cnpj"]; ?> </td>
                            <td> <?= $data["dest_nome"]; ?> </td>
                            <td> <?= $data["dest_ie"]; ?> </td>
                            <td> <?= $data["dest_logradouro"]; ?> </td>
                            <td> <?= $data["dest_numero"]; ?> </td>
                            <td> <?= $data["dest_bairro"]; ?> </td>
                            <td> <?= $data["dest_cod_municipio"]; ?> </td>
                            <td> <?= $data["dest_municipio"]; ?> </td>                                                
                            <td> <?= $data["dest_uf"]; ?> </td>
                            <td> <?= $data["dest_cep"]; ?> </td>
                            <td> <?= $data["dest_cod_pais"]; ?> </td>
                            <td> <?= $data["dest_fone"]; ?> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
    function verifyDelete(id)
    {
        let result = confirm('Você tem certeza que deseja deletar o registro com id: '+id);
        console.log(result);
        if(result)
        {
            window.location.replace('./index.php?a=delete&id='+id);
        }
    }
    function reload()
    {
        window.location.replace('index.php');
    }
</script>
</body>
</html>