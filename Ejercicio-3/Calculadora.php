<?php
include("stack.php");


class Calculadora
{
    public $stack;
    public $current;

    public function __construct()
    {
        if (isset($_SESSION['contador'])) {
            $this->stack = $_SESSION['contador'];
        } else {
            $this->stack = new Stack();
        }
        $this->current = "";
    }

    public function isPosible($count)
    {
        try {
            if (!$this->stack->len() > $count) {
                throw new ArgumentCountError($message = "Error");
            }
        } catch (ArgumentCountError $e) {
            $_SESSION['current'] = "";
            $this->current = $e->error;
        }
    }

    public function enter()
    {
        $this->stack->push($_SESSION['current']);
        $this->current = "";
        $_SESSION['current'] = "";
    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function numero($boton)
    {
        $this->current .= $boton;
        
    }

    public function opBinary($operador)
    {
        try {
            $_SESSION['current'] = "";
            $this->isPosible(2);
            $op2 = $this->stack->pop();
            $op1 = $this->stack->pop();
            $this->current = $operador($op1, $op2);
            $this->stack->push($this->current);
        } catch (Exception $e) {
            $_SESSION['current'] = "";
            $this->current = "Error";
        }
    }

    public function opUnary($operador)
    {
        try {
            $_SESSION['current'] = "";
            $this->isPosible(1);
            $op1 = $this->stack->pop();
            $this->current = $operador($op1);
            $this->stack->push($this->current);
        } catch (Exception $e) {
            $_SESSION['current'] = "";
            $this->current = "Error";
        }
    }

    public function division()
    {
        $this->opBinary($op = function ($op1, $op2) {
            return $op1 / $op2;
        });
    }

    public function multiplicacion()
    {
        $this->opBinary($op = function ($op1, $op2) {
            return $op1 * $op2;
        });
    }

    public function suma()
    {
        $this->opBinary($op = function ($op1, $op2) {
            return $op1 + $op2;
        });
    }

    public function resta()
    {
        $this->opBinary($op = function ($op1, $op2) {
            return $op1 - $op2;
        });
    }

    public function reset()
    {
        $this->current = "";
        $_SESSION['current'] = "";
        $this->stack->clear();
    }

    public function punto()
    {
        $this->current .= ".";
    }

    function sin()
    {
        $this->opUnary($sqrt = function ($parametro) {
            return sin($parametro);
        });
    }
    function cos()
    {
        $this->opUnary($sqrt = function ($parametro) {
            return cos($parametro);
        });
    }
    function tan()
    {
        $this->opUnary($sqrt = function ($parametro) {
            return tan($parametro);
        });
    }
    function mod()
    {
        $this->opBinary($op = function ($op1, $op2) {
            return $op1 % $op2;
        });
    }
    function exp()
    {
        $this->opUnary($sqrt = function ($parametro) {
            return exp($parametro);
        });
    }
    function exp10()
    {
        $this->opUnary($sqrt = function ($parametro) {
            return 10 ** $parametro;
        });
    }
    function exponencial()
    {
        $this->opBinary($op = function ($op1, $op2) {
            return $op1 ** $op2;
        });
    }
    function log()
    {
        $this->opUnary($sqrt = function ($parametro) {
            return log($parametro);
        });
    }
    function pi()
    {
        $this->current .= "3.1416";
    }
    function e()
    {
        $this->current .= "2.82";
    }
    function signo()
    {
        $this->opUnary($sqrt = function ($parametro) {
            return -1 * $parametro;
        });
    }
    function factorial()
    {
        $factorial = 1;
        $count = $this->stack->pop();
        for ($i = 1; $i <= $count; $i++) {
            $factorial = $factorial * $i;
        }
        $this->current .= $factorial;
        $this->stack->push($this->current);
    }
    function sqrt()
    {
        $this->opUnary($sqrt = function ($parametro) {
            return sqrt($parametro);
        });
    }
    function CE(){
        $this->current = "";
        $_SESSION['current'] = "";
    }
}
