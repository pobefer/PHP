<?php
/**
 * Definición de la clase PilaLIFO
 */

class Stack {

    protected $stack;

    public function __construct(){
        $this->stack = array();
    }

    public function clear(){
        $this->stack = array();
    }

    public function push($elemento) {
        array_push($this->stack, $elemento);
    }

    public function pop() {
        if ($this->empty()) {
            throw new RunTimeException('¡Pila vacía! No se pueden desapilar elementos');
        } else {
            return array_pop($this->stack);
        }
    }
    
    public function len(){
         return count($this->stack);   
    }

    public function last() {
        return current($this->stack);
    }

    public function empty() {
        return empty($this->stack);
    }

    public function ver(){
        return $this->stack;
    }
            
    public function stack(){
        $pila = array();
        foreach($this->stack as $elemento){
            $pila[] = $elemento;
        }
        return $pila;
    } 

}
?>