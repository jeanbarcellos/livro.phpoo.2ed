<?php 
/**
 * classe TCriteria
 * 
 * Esta classe provê uma interface utilizada para definição de critérios
 * 
 */
class TCriteria extends TExpression
{
    private $expressions; // armazena a lista de expressões
    private $operators;   // armazena a lista de operadores
    private $properties;  // propriedades do critérios
    
    /*
     * Método construtor
     */
    function __construct()
    {
        $this->expressions = array();
        $this->operators = array();
    }
    
    /**
     * método add()
     * adiciona uma expressão ao critério
     * @param $expression = expressão (Objeto TExpression)
     * @param $operator   = operador lógico de comparação
     * 
     */ 
    public function add(TExpression $expression, $operator = self::AND_OPERATOR)
    {
        // na primeira vez, não precisamos de operador lógico para concatenar 
        if (empty($this->expressions))
        {
            $operator = NULL;
        }
        
        // agrega o resultado da expressão a lista de expressões
        $this->expressions[] = $expression;
        $this->operators[] = $operator;
    }
   
    /*
     * método dump()
     * retorna a expressão final
     */
    public function dump()
    {
        // concatena a lista de expressões (filtros/critérios)
        
        // Verifica se a variável é um array
        if (is_array($this->expressions))
        {
            // verifica se o array tem itens
            if (count($this->expressions) > 0)
            {
                $result = '';
                
                foreach ($this->expressions as $i => $expression)
                {
                    $operator = $this->operators[$i];
                    
                    // concatena o operador com a respectiva expressão
                    $result .= $operator . $expression->dump() . " ";
                    #$result .= "$i => $expression <br>";
                }
                $result = trim($result);
                
                return "({$result})";
            }
        }
    }

    /*
     * método setProperty()
     * define o valor de uma propriedade
     * @param $property = propriedade
     * @param $value    = valor
    */
    public function setProperty($property, $value) {
        $property = strtoupper($property);

        if (isset($value)) {
            $this->properties[$property] = $value;
        } else {
            $this->properties[$property] = NULL;
        }
    }

    /*
     * método getProperty()
     * retorna o valor de uma propriedade
     * @param $property = propriedade
     */
    public function getProperty($property)
    {
        if (isset($this->properties[$property]))
        {
            return $this->properties[$property];
        }
    }     
     
     
}

