<?php
require_once 'produto.php';

class Eletronico extends Produto
{
    private $garantia;
    private $voltagem;

    public function __construct($nome, $preco, $garantia, $voltagem)
    {
        parent::__construct($nome, $preco);
        $this->garantia = $garantia;
        $this->voltagem = $voltagem;
    }

    public function getGarantia()
    {
        return $this->garantia;
    }

    public function getVoltagem()
    {
        return $this->voltagem;
    }



}
