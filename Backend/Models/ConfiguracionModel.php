<?php
class ConfiguracionModel extends Query{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getEmpresa()
    {
        $sql = "SELECT * FROM empresas";
        $data = $this->select($sql);
        return $data;
    }



}