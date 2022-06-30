<?php 

    require_once './config/connect.php';

    class NfeModel extends Connect {
        
        private $table;

        function __construct(){
            parent::__construct();
            $this->table = "nfe";        
        }

        public function getAll(){
            $sql = $this->connection->query("SELECT * FROM $this->table");
            $result = $sql->fetchAll();
            return $result;
        }

        public function newUploadXML($data){
            $sqlUpdate = "INSERT INTO $this->table (
                numero_nf ,
                data_emissao ,
                valor_nf ,
                dest_cnpj ,
                dest_nome ,
                dest_ie ,
                dest_logradouro ,
                dest_numero ,
                dest_bairro ,
                dest_cod_municipio ,
                dest_municipio ,
                dest_uf ,
                dest_cep ,
                dest_cod_pais ,
                dest_fone ) VALUES (
                :numero_nf ,
                :data_emissao ,
                :valor_nf ,
                :dest_cnpj ,
                :dest_nome ,
                :dest_ie ,
                :dest_logradouro ,
                :dest_numero ,
                :dest_bairro ,
                :dest_cod_municipio ,
                :dest_municipio ,
                :dest_uf ,
                :dest_cep ,
                :dest_cod_pais ,
                :dest_fone
                )";
            $resultQuery = $this->connection
                ->prepare($sqlUpdate)->execute([               
                'numero_nf' => $data['num_nf'],
                'data_emissao' => $data['data_emissao'],
                'valor_nf' => $data['valor_nf'],
                'dest_cnpj' => $data['cnpj'],
                'dest_nome' => $data['nome'],
                'dest_ie' => $data['ie'],
                'dest_logradouro' => $data['logradouro'],
                'dest_numero' => $data['numero'],
                'dest_bairro' => $data['bairro'],
                'dest_cod_municipio' => $data['cod_municipio'],
                'dest_municipio' => $data['municipio'],
                'dest_uf' => $data['uf'],
                'dest_cep' => $data['cep'],
                'dest_cod_pais' => $data['cod_pais'],
                'dest_fone' => $data['fone']
            ]);
            if($resultQuery){
                return true;
            }
            return false;
        }


    }
    

?>