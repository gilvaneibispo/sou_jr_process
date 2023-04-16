<?php
ini_set('display_errors', true);
require_once("vendor/autoload.php");
require_once("figure_handler.php");

use App\FigureBuilder;
use App\Figure;

# construindo um array de arrays com * e .
# dispostos de modo a formar as figuras da cruz e x.
# - - - - - - - - - - - - - - - - - - - - - - -
# Opção 01: Criando uma instância da classe Figure.
$fig = new Figure();
$cross = $fig->draw(Figure::FIG_CROSS);

$fig->setNumCols(5);
$x = $fig->draw(Figure::FIG_X);
# - - - - - - - - - - - - - - - - - - - - - - -
# Opção 02: Usando métodos estáticos.
# $cross = FigureBuilder::draw(FigureBuilder::FIG_CROSS);
# $x = FigureBuilder::draw(FigureBuilder::FIG_X, 5, 5);

# imprimindo a cruz
echo PHP_EOL;
printFig($cross);

# imprimindo o x
echo PHP_EOL;
printFig($x);

