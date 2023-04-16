<?php

namespace App;

class FigureBuilder
{

    const FIG_CROSS = 1;
    const FIG_X = 2;

    public static function draw(int $type, $numberLines = 5, $numberCols = 7): array
    {

        $figure = [];

        // percorre todas as linhas da matriz.
        for ($line = 0; $line < $numberLines; $line++) {

            $temp = [];

            // para cada linha percorre todas as posições (col).
            for ($col = 0; $col < $numberCols; $col++) {

                if ($type == self::FIG_CROSS)
                    $temp[] = self::applyCrossRules($line, $col, $numberCols);

                if ($type == self::FIG_X)
                    $temp[] = self::applyXRules($line, $col, $numberCols);

            }

            $figure[] = $temp;
        }

        return $figure;
    }

    private static function applyCrossRules($line, $col, $size): string
    {

        if ($line == 1) {

            // se for a segunda linha imprime dois pontos nas
            // extremidades e asteriscos nas posições centrais.
            return $col == 0 || $col == $size - 1 ? "." : "*";
        } else {

            // nas demais situações imprime asterisco na posição
            // central da linha.
            return $col == ((int)($size / 2)) ? "*" : ".";
        }
    }

    private static function applyXRules($line, $col, $size): string
    {

        // Verifica se é uma posição de interesse para imprimir o asterisco.
        return $col == $line || $col == ($size - 1) - $line ? "*" : ".";
    }
}