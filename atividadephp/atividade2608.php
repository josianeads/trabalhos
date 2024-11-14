<?php

class Produto {
    protected $nome;
    protected $preco;

    public function __construct($nome, $preco) {
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function calcularDesconto() {
        // Implementação padrão de desconto para produtos físicos
        return $this->preco * 0.90; // 10% de desconto
    }
}

class ProdutoDigital extends Produto {
    private $tamanhoArquivo;

    public function __construct($nome, $preco, $tamanhoArquivo) {
        parent::__construct($nome, $preco);
        $this->tamanhoArquivo = $tamanhoArquivo;
    }

    public function getTamanhoArquivo() {
        return $this->tamanhoArquivo;
    }

    public function calcularDesconto() {
        // Implementação de desconto para produtos digitais
        return $this->preco * 0.80; // 20% de desconto
    }
}

// Exemplo de uso das classes
$produtoFisico = new Produto("Livro", 50.00);
echo "Produto: " . $produtoFisico->getNome() . "\n";
echo "Preço com desconto: " . $produtoFisico->calcularDesconto() . "\n";

$produtoDigital = new ProdutoDigital("E-book", 30.00, "5MB");
echo "Produto: " . $produtoDigital->getNome() . "\n";
echo "Preço com desconto: " . $produtoDigital->calcularDesconto() . "\n";
echo "Tamanho do arquivo: " . $produtoDigital->getTamanhoArquivo() . "\n";

?>
//


Classe Produto: Define as propriedades nome e preco, além dos métodos getNome, getPreco e calcularDesconto.
Classe ProdutoDigital: Herda de Produto e adiciona a propriedade tamanhoArquivo. O método calcularDesconto é sobrescrito para aplicar um desconto diferente.
Exemplo de Uso: Cria instâncias de Produto e ProdutoDigital, demonstrando como utilizar os métodos definidos.