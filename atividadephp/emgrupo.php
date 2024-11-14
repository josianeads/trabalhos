Criar classes do PI, cada classe deve conter os métodos relativos, levantados nos documentos de projeto.
Cada integrante deve criar no mínimo 2 classes (contendo atributos e métodos) relativos ao PI.
A entrega final deve conter um PHP por integrante;
Deve estar num único git para o projeto (compartilhado com todos).
//

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

class Cliente {
    private $id;
    private $nome;
    private $email;

    public function __construct($id, $nome, $email) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}

class Pedido {
    private $numero;
    private $data;
    private $cliente;

    public function __construct($numero, $data, $cliente) {
        $this->numero = $numero;
        $this->data = $data;
        $this->cliente = $cliente;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getData() {
        return $->data;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
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

$cliente = new Cliente(1, "João Silva", "joao@example.com");
echo "Cliente: " . $cliente->getNome() . "\n";
echo "Email: " . $cliente->getEmail() . "\n";

$pedido = new Pedido(1001, "2024-09-23", $cliente);
echo "Pedido Número: " . $pedido->getNumero() . "\n";
echo "Data do Pedido: " . $pedido->getData() . "\n";
echo "Cliente do Pedido: " . $pedido->getCliente()->getNome() . "\n";

?>


//

Classe Produto: Define as propriedades nome e preco, além dos métodos getNome, getPreco e calcularDesconto.
Classe ProdutoDigital: Herda de Produto e adiciona a propriedade tamanhoArquivo. O método calcularDesconto é sobrescrito para aplicar um desconto diferente.
Classe Cliente: Define as propriedades id, nome e email, além dos métodos getId, getNome, getEmail, setNome e setEmail.
Classe Pedido: Define as propriedades numero, data e cliente, além dos métodos getNumero, getData, getCliente, setNumero, setData e setCliente.
Exemplo de Uso: Cria instâncias de Produto, ProdutoDigital, Cliente e Pedido, demonstrando como utilizar os métodos definidos.