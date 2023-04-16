<?php

namespace App;

class Figure
{
    private int $numberCols;
    private int $numberLines;

    const FIG_CROSS = 1;
    const FIG_X = 2;

    public function __construct()
    {
        # definindo valores default.
        $this->numberCols = 7;
        $this->numberLines = 5;
    }

    public function setNumCols($cols):void{
        $this->numberCols = $cols;
    }

    public function setNumLines($lines):void{
        $this->numberLines = $lines;
    }

    public function draw(int $type): array
    {

        $figure = [];

        // percorre todas as linhas da matriz.
        for ($line = 0; $line < $this->numberLines; $line++) {

            $temp = [];

            // para cada linha percorre todas as posições (col).
            for ($col = 0; $col < $this->numberCols; $col++) {

                if ($type == self::FIG_CROSS)
                    $temp[] = self::applyCrossRules($line, $col);

                if ($type == self::FIG_X)
                    $temp[] = self::applyXRules($line, $col);

            }

            $figure[] = $temp;
        }

        return $figure;
    }

    private function applyCrossRules($line, $col): string
    {

        if ($line == 1) {

            // se for a segunda linha imprime dois pontos nas
            // extremidades e asteriscos nas posições centrais.
            return $col == 0 || $col == $this->numberCols - 1 ? "." : "*";
        } else {

            // nas demais situações imprime asterisco na posição
            // central da linha.
            return $col == ((int)($this->numberCols / 2)) ? "*" : ".";
        }
    }

    private function applyXRules($line, $col): string
    {

        // Verifica se é uma posição de interesse para imprimir o asterisco.
        return $col == $line || $col == ($this->numberCols - 1) - $line ? "*" : ".";
    }

}