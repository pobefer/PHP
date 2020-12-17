<?php

class Calculadora
{
    public $resultadoPublico;
    public $calculo;


    public function __construct()
    {
        $this->memoria = 0;
        $this->memopriaAux = 0;
        $this->memoriaLimpia = true;
        $this->resultadoPublico = "";
        $this->calculo = $this->resultadoPublico;
    }

    public function getCalculo()
    {
        return $this->calculo;
    }

    public function getResultado()
    {
        return $this->resultadoPublico;
    }

    public function numero($boton)
    {
        $this->resultadoPublico .= $boton;
        $this->pintar();
    }

    public function mrc()
    {
        if (isset($_SESSION['memoria'])) {
            $this->resultadoPublico = $_SESSION['memoria'];
        }
        $_SESSION['contador'] = "";
        $this->pintar();
    }

    public function mNegative()
    {
        if (isset($_SESSION['memoria'])) {
            try {
                $_SESSION['memoria'] = eval('return ' . $_SESSION['memoria'] . '-' . $_SESSION['contador'] . ';');
            } catch (ParseError $e) {
                $this->resultadoPublico = "Error";
                $_SESSION['contador'] = "";
                $this->pintar();
            }
        } else {
            try {
                $_SESSION['memoria'] = eval('return 0 - ' .  $_SESSION['contador'] . ';');
            } catch (ParseError $e) {
                $this->resultadoPublico = "Error";
                $_SESSION['contador'] = "";
                $this->pintar();
            }
        }
    }

    public function mPositive()
    {
        if (isset($_SESSION['memoria'])) {
            try {
                $_SESSION['memoria'] = eval('return ' . $_SESSION['contador'] . '+' . $_SESSION['memoria'] . ';');
            } catch (ParseError $e) {
                $this->resultadoPublico = "Error";
                $_SESSION['contador'] = "";
                $this->pintar();
            }
        } else {
            try {
                $_SESSION['memoria'] = eval('return 0 - ' .  $_SESSION['contador'] . ';');
            } catch (ParseError $e) {
                $this->resultadoPublico = "Error";
                $_SESSION['contador'] = "";
                $this->pintar();
            }
        }
    }

    public function division()
    {
        $this->resultadoPublico .= "/";
        $this->pintar();
    }

    public function multiplicacion()
    {
        $this->resultadoPublico .= "*";
        $this->pintar();
    }

    public function suma()
    {
        $this->resultadoPublico .= "+";
        $this->pintar();
    }

    public function resta()
    {
        $this->resultadoPublico .= "-";
        $this->pintar();
    }

    public function reset()
    {
        $this->resultadoPublico = "";
        $_SESSION['contador'] = "";
        $this->pintar();
    }

    public function punto()
    {
        if (isset($_SESSION['contador'])) {
            $_SESSION['contador'] .= ".";
        }
        $this->pintar();
    }

    public function pintar()
    {
        $this->calculo = $this->resultadoPublico;
    }

    public function calcular()
    {
        try {
            $this->resultadoPublico  = eval('return ' . $_SESSION['contador'] . ';');
            $_SESSION['contador'] = "";
            $this->pintar();
        } catch (ParseError $e) {
            $this->resultadoPublico = "Error";
            $_SESSION['contador'] = "";
            $this->pintar();
        }
    }
}

class CalculadoraAvanzada extends Calculadora
{
    public function __construct()
    {
        $this->memoria = 0;
        $this->memopriaAux = 0;
        $this->memoriaLimpia = true;
        $this->resultadoPublico = "";
        $this->calculo = $this->resultadoPublico;
    }

    function sin()
    {
        $this->calcularAvanzado('sin');
    }
    function cos()
    {
        $this->calcularAvanzado('cos');
    }
    function tan()
    {
        $this->calcularAvanzado('tan');
    }
    function mod()
    {
        $this->resultadoPublico .= "%";
        parent::pintar();
    }
    function exp()
    {
        $this->calcularAvanzado('exp');
    }
    function exp10()
    {
        $this->resultadoPublico .= "10**";
        parent::pintar();
    }
    function exponencial()
    {
        $this->resultadoPublico .= "**";
        parent::pintar();
    }
    function log()
    {
        $this->calcularAvanzado('log10');
    }
    function pi()
    {
        $this->resultadoPublico .= "3.1416";
        parent::pintar();
    }
    function e()
    {
        $this->resultadoPublico .= "2.82";
        parent::pintar();
    }
    function signo()
    {
        $this->calcularAvanzado('gmp_fact');
    }
    function factorial()
    {
        $factorial = 1;
        for ($i = 1; $i <= $_SESSION['contador']; $i++) {
            $factorial = $factorial * $i;
        }
        $this->resultadoPublico .= $factorial ;
        parent::pintar();
    }
    function sqrt()
    {
        $this->calcularAvanzado('sqrt');
    }
    function pA()
    {
        $this->resultadoPublico .= "(";
        parent::pintar();
    }
    function pC()
    {
        $this->resultadoPublico .= ")";
        parent::pintar();
    }

    function calcularAvanzado($operacion)
    {
        try {
            $this->resultadoPublico  = eval('return ' . $operacion($_SESSION['contador']) . ';');
            $_SESSION['contador'] = "";
            parent::pintar();
        } catch (Exception $e) {
            $this->resultadoPublico = "Error";
            $_SESSION['contador'] = "";
            parent::pintar();
        }
    }
}
