<?php
//  CLASSE BASE
class Objeto {
    protected float $largura;
    protected float $altura;

    public function __construct(float $largura, float $altura) {
        $this->largura = $largura;
        $this->altura = $altura;
    }

    public function calculaArea(): float {
        return 0.0; 

    public function exibirDimensoes(): void {
        echo "Largura: {$this->largura}, Altura: {$this->altura}\n";
    }
}

// CLASSE TRIÂNGULO
class Triangulo extends Objeto {

    public function __construct(float $largura, float $altura) {
        parent::__construct($largura, $altura);
    }

    public function calculaArea(): float {
        return ($this->largura * $this->altura) / 2;
    }

    public function exibirInfo(): void {
        echo "=== Triângulo ===\n";
        $this->exibirDimensoes();
        echo "Área: " . $this->calculaArea() . "\n";
    }
}

//  CLASSE RETÂNGULO 
class Retangulo extends Objeto {
    public function __construct(float $largura, float $altura) {
        parent::__construct($largura, $altura);
    }

    public function calculaArea(): float {
        return $this->largura * $this->altura;
    }

    public function ehQuadrado(): bool {
        return $this->largura === $this->altura;
    }

    public function exibirInfo(): void {
        echo "=== Retângulo ===\n";
        $this->exibirDimensoes();
        echo "Área: " . $this->calculaArea() . "\n";
        echo $this->ehQuadrado() ? "É um quadrado.\n" : "Não é um quadrado.\n";
    }
}

// MENU 
do {
    echo "\n===== MENU =====\n";
    echo "1 - Cadastrar Triângulo\n";
    echo "2 - Cadastrar Retângulo\n";
    echo "3 - Sair\n";
    echo "Escolha uma opção: ";

    $opcao = trim(fgets(STDIN));

    switch ($opcao) {
        case "1":
            echo "Digite a largura do triângulo: ";
            $largura = (float) trim(fgets(STDIN));

            echo "Digite a altura do triângulo: ";
            $altura = (float) trim(fgets(STDIN));

            $tri = new Triangulo($largura, $altura);
            $tri->exibirInfo();
            break;

        case "2":
            echo "Digite a largura do retângulo: ";
            $largura = (float) trim(fgets(STDIN));

            echo "Digite a altura do retângulo: ";
            $altura = (float) trim(fgets(STDIN));

            $ret = new Retangulo($largura, $altura);
            $ret->exibirInfo();
            break;

        case "3":
            echo "Saindo do programa...\n";
            break;

        default:
            echo "Opção inválida! Tente novamente.\n";
    }

} while ($opcao != "3");
