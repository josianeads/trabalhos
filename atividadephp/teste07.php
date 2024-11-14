<?php
// Configuração do Banco de Dados
class Database {
    private $host = "localhost";
    private $db_name = "seu_banco_de_dados"; // Altere para o nome do seu banco de dados
    private $username = "seu_usuario"; // Altere para o seu usuário do banco de dados
    private $password = "sua_senha"; // Altere para sua senha do banco de dados
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

// Model
class UsuarioModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllUsuarios() {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsuarioById($id) {
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUsuario($dados) {
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':senha', password_hash($dados['senha'], PASSWORD_BCRYPT));
        return $stmt->execute();
    }

    public function updateUsuario($id, $dados) {
        $query = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':senha', password_hash($dados['senha'], PASSWORD_BCRYPT));
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteUsuario($id) {
        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

// Controller
class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index() {
        $usuarios = $this->usuarioModel->getAllUsuarios();
        $this->renderUsuarios($usuarios);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuarioModel->createUsuario($_POST);
            header("Location: index.php");
            exit;
        } else {
            $this->renderCreate();
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuarioModel->updateUsuario($id, $_POST);
            header("Location: index.php");
            exit;
        } else {
            $usuario = $this->usuarioModel->getUsuarioById($id);
            $this->renderEdit($usuario);
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuarioModel->deleteUsuario($id);
            header("Location: index.php");
            exit;
        } else {
            $usuario = $this->usuarioModel->getUsuarioById($id);
            $this->renderDelete($usuario);
        }
    }

    // Views
    private function renderUsuarios($usuarios) {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Lista de Usuários</title>
        </head>
        <body>
            <h1>Lista de Usuários</h1>
            <a href="index.php?action=create">Criar Novo Usuário</a>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>';
        foreach ($usuarios as $usuario) {
            echo '<tr>
                    <td>' . $usuario['id'] . '</td>
                    <td>' . htmlspecialchars($usuario['nome']) . '</td>
                    <td>' . htmlspecialchars($usuario['email']) . '</td>
                    <td>
                        <a href="index.php?action=edit&id=' . $usuario['id'] . '">Editar</a>
                        <a href="index.php?action=delete&id=' . $usuario['id'] . '">Excluir</a>
                    </td>
                </tr>';
        }
        echo '  </table>
        </body>
        </html>';
    }

    private function renderCreate() {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Criar Usuário</title>
        </head>
        <body>
            <h1>Criar Usuário</h1>
            <form method="POST">
                Nome: <input type="text" name="nome" required><br>
                Email: <input type="email" name="email" required><br>
                Senha: <input type="password" name="senha" required><br>
                <button type="submit">Criar</button>
            </form>
        </body>
        </html>';
    }

    private function renderEdit($usuario) {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Editar Usuário</title>
        </head>
        <body>
            <h1>Editar Usuário</h1>
            <form method="POST">
                Nome: <input type="text" name="nome" value="' . htmlspecialchars($usuario['nome']) . '" required><br>
                Email: <input type="email" name="email" value="' . htmlspecialchars($usuario['email']) . '" required><br>
                Senha: <input type="password" name="senha" required><br>
                <button type="submit">Salvar</button>
            </form>
        </body>
        </html>';
    }

    private function renderDelete($usuario) {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Excluir Usuário</title>
        </head>
        <body>
            <h1>Excluir Usuário</h1>
            <p>Tem certeza que deseja excluir o usuário ' . htmlspecialchars($usuario['nome']) . '?</p>
            <form method="POST">
                <button type="submit">Excluir</button>
                <a href="index.php">Cancelar</a>
            </form>
        </body>
        </html>';
    }
}

// Controlador principal
$controller = new UsuarioController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    case 'index':
    default:
        $controller->index();
        break;
}
?>
