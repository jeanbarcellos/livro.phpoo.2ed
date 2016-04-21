<?php 
/*
 * classe TExpression
 * classe abstrata para gerenciar expressões
 */
 abstract class TExpression
 {
     // operadores lógicos
     const AND_OPERATOR = 'AND ';
     const OR_OPERATOR = 'OR ';
     
     // marca método dump como obrigatório
     abstract public function dump();
 }

/*
Classes-filha
TFilter.class.php


abstract class
 
é obrigatória a sua extensão
ela não pode ser instanciada
*/
?>