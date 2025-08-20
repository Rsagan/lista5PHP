<?php
// CLASSES 
class Funcionario {
    protected int $id;
    protected string $nome;
    protected string $cargo;

    public function __construct(int $id, string $nome, string $cargo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cargo = $cargo;
    }

    public function calculaSalario(): float {
        return 2000.00; // salário base
    }

    public function exibirInfo(): void {
        echo "ID: {$this->id}, Nome: {$this->nome}, Cargo: {$this->cargo}\n";
    }
}

class Gerente extends Funcionario {
    private int $quantidadeDeColaboradores;

    public function __construct(int $id, string $nome, int $quantidadeDeColaboradores) {
        parent::__construct($id, $nome, "Gerente");
        $this->quantidadeDeColaboradores = $quantidadeDeColaboradores;
    }

    public function calculaSalario(): float {
        $salarioBase = 5000.00;
        $bonusPorColaborador = 300.00;
        return $salarioBase + ($this->quantidadeDeColaboradores * $bonusPorColaborador);
    }

    public function exibirInfo(): void {
        parent::exibirInfo();
        echo "Quantidade de colaboradores: {$this->quantidadeDeColaboradores}\n";
    }
}

// SISTEMA 
$colaboradores = []; // Armazena todos os colaboradoes

do {
    echo "\n===== MENU =====\n";
    echo "1 - Criar Funcionário\n";
    echo "2 - Criar Gerente\n";
    echo "3 - Listar Todos\n";
    echo "4 - Sair\n";
    echo "Escolha uma opção: ";

    $opcao = trim(fgets(STDIN));

    switch ($opcao) {
        case "1":
            echo "Digite o ID do funcionário: ";
            $id = (int) trim(fgets(STDIN));

            echo "Digite o nome do funcionário: ";
            $nome = trim(fgets(STDIN));

            echo "Digite o cargo do funcionário: ";
            $cargo = trim(fgets(STDIN));

            $func = new Funcionario($id, $nome, $cargo);
            $colaboradores[] = $func;

            echo "\nFuncionário criado com sucesso!\n";
            $func->exibirInfo();
            echo "Salário: R$ " . $func->calculaSalario() . "\n";
            break;

        case "2":
            echo "Digite o ID do gerente: ";
            $id = (int) trim(fgets(STDIN));

            echo "Digite o nome do gerente: ";
            $nome = trim(fgets(STDIN));

            echo "Digite a quantidade de colaboradores: ";
            $qtd = (int) trim(fgets(STDIN));

            $ger = new Gerente($id, $nome, $qtd);
            $colaboradores[] = $ger;

            echo "\nGerente criado com sucesso!\n";
            $ger->exibirInfo();
            echo "Salário: R$ " . $ger->calculaSalario() . "\n";
            break;

        case "3":
            if (empty($colaboradores)) {
                echo "\nNenhum funcionário ou gerente cadastrado ainda.\n";
            } else {
                echo "\n=== LISTA DE COLABORADORES ===\n";
                foreach ($colaboradores as $col) {
                    $col->exibirInfo();
                    echo "Salário: R$ " . $col->calculaSalario() . "\n";
                    echo "-------------------------\n";
                }
            }
            break;

        case "4":
            echo "Saindo do programa...\n";
            break;

        default:
            echo "Opção inválida! Tente novamente.\n";
    }

} while ($opcao != "4");
