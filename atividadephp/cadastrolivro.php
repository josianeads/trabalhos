<?php

class Produto {
    protected $precoCompra;
    protected $precoVenda;
    protected $imposto = 0.05;

    public function __construct($precoCompra, $precoVenda) {
        $this->precoCompra = $precoCompra;
        $this->precoVenda = $precoVenda;
    }

    public function calcularPrecoFinal() {
        return $this->precoVenda + ($this->precoVenda * $this->imposto);
    }
}

class Livro extends Produto {
    private $autor;
    private $editora;

    public function __construct($autor, $editora, $precoCompra, $precoVenda) {
        parent::__construct($precoCompra, $precoVenda);
        $this->autor = $autor;
        $this->editora = $editora;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getEditora() {
        return $this->editora;
    }
}

class CadastroLivro {
    private $nomeLivro;
    private $nomeAutor;
    private $editoraLivro;
    private $precoCompra;
    private $precoVenda;

    public function __construct($nomeLivro, $nomeAutor, $editoraLivro, $precoCompra, $precoVenda) {
        $this->nomeLivro = $nomeLivro;
        $this->nomeAutor = $nomeAutor;
        $this->editoraLivro = $editoraLivro;
        $this->precoCompra = $precoCompra;
        $this->precoVenda = $precoVenda;
    }

    public function cadastrar() {
        $livro = new Livro($this->nomeAutor, $this->editoraLivro, $this->precoCompra, $this->precoVenda);
        echo "Livro cadastrado com sucesso: " . $this->nomeLivro;
        echo "Autor: " . $livro->getAutor();
        echo "Editora: " . $livro->getEditora();
        echo "Preço de Venda: " . $livro->calcularPrecoFinal();
    }
}


$cadastro = new CadastroLivro("O Senhor dos Anéis", "J.R.R. Tolkien", "HarperCollins", 50, 100);
$cadastro->cadastrar();

?>
