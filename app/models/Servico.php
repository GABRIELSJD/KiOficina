<?php
 
class Servico extends Model{
 
    //Método para pegar somente 3 servicos de forma aleatória
    public function getServicoAleatorio($limite = 3){
       
        $sql = "SELECT * FROM tbl_servico where status_servico = 'Ativo' 
        ORDER BY RAND() LIMIT :limite";
        $stmt = $this ->db->prepare($sql);
        $stmt->bindValue(':limite',(int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        //fetchALL
        return $stmt->fetchAll(PDO::FETCH_ASSOC);     
    }

    //Método listar todos os Serviços ativos por ordem alfabetica
    public function getServicoAll(){
        $sql = "SELECT * FROM tbl_servico where status_servico = 'Ativo' ORDER BY nome_servico ASC";
 
        $stmt = $this -> db -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    
}