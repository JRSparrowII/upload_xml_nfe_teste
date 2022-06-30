<?php 

    require_once "./models/Nfe.php";

    class NfeController {
        private $model;

        function __construct(){
            $this->model = new NfeModel();
        }

        public function getAll($data = null) {
            $result = $this->model->getAll();
            $returnMessage = $data;
            require_once './views/Pages/nfe/index.php';

        }

        public function goNew(){
            require_once "./views/Pages/nfe/upload.php";
        }

        public function new($data){          
            if(isset($data['file']['name']) &&  $data['file']['name'] != '') {
                $valid_extension = array('xml');
                $file_data = explode('.', $data['file']['name']);
                $file_extension = end($file_data);
            
                //2.	O sistema deve validar se o arquivo é uma extensão .xml;
                if(in_array($file_extension, $valid_extension)) {
                    $dataXML = simplexml_load_file($data['file']['tmp_name']);
                    
                    //3.	O sistema deve permitir somente o upload do arquivo xml se o campo CNPJ do emitente(<emit>) for "09066241000884";
                    if (isset($dataXML->NFe->infNFe->emit) && $dataXML->NFe->infNFe->emit->CNPJ == '09066241000884') {
                        
                        //4.	O sistema deve validar se a nota possui protocolo de autorização preenchido (campo <nProt>);
                        if (isset($dataXML->protNFe->infProt->nProt) && $dataXML->protNFe->infProt->nProt !== '') {
                            $dados_dest = $dataXML->NFe->infNFe->dest;
            
                            if (isset($dados_dest->CNPJ) && $dados_dest->CNPJ != '') {
                                $cnpj_cpf = $dados_dest->CNPJ;
                            } else {
                                $cnpj_cpf = $dados_dest->CPF;
                            }
                            
                            $dataSend = array(
                                'num_nf' => $dataXML->NFe->infNFe->ide->nNF,
                                'data_emissao' => $dataXML->NFe->infNFe->ide->dhEmi,
                                'cnpj' => $cnpj_cpf,
                                'nome' => $dados_dest->xNome,
                                'ie' => $dados_dest->IE,
                                'logradouro' => $dados_dest->enderDest->xLgr,
                                'numero' => $dados_dest->enderDest->nro,
                                'bairro' => $dados_dest->enderDest->xBairro,
                                'cod_municipio' => $dados_dest->enderDest->cMun,
                                'municipio' => $dados_dest->enderDest->xMun,
                                'uf' => $dados_dest->enderDest->UF,
                                'cep' => $dados_dest->enderDest->CEP,
                                'cod_pais' => $dados_dest->enderDest->cPais,
                                'fone' => $dados_dest->enderDest->fone,
                                'valor_nf' => $dataXML->NFe->infNFe->total->ICMSTot->vNF
                            );

                            $result = $this->model->newUploadXML($dataSend);

                            if(isset($result)){
                                $return = '<div class="alert alert-success">Dados importados com sucesso!</div>';
                            }  
                        } else {
                            $return = '<div class="alert alert-warning">Arquivo inválido! Arquivo não possui protocolo de autorização!</div>';
                        }
                    } else {
                        $return = '<div class="alert alert-warning">CNPJ do emitente não permitido!</div>';            
                    }
                } else {
                    $return = '<div class="alert alert-warning">Arquivo inválido! Favor colocar um arquivo XML!</div>';
                }
            
            } else {
                $return = '<div class="alert alert-warning">Por favor, selecione um arquivo xml!</div>';
            }
            
            echo $return;


            
            // $this->redirectWithMessage('insert',$result);
        }

        public function redirectWithMessage($type,$result){
            header("Location: index.php?m=$type&a=showMessage&s=$result");
        }

        public function showMessage($success,$error,$status){
            if($status == 1){
                $returnMessage = "Registro $success com sucesso!";
            } else {
                $returnMessage = "Erro ao $error!";
            }
            $this->getAll($returnMessage);
        }

        
    }   
    
?>