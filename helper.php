<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Função que gera um código para uma cor em hexadecimal aleatoriamente  
 * 
 * @return string Código da cor em hexadecimal
 */
function randomColor() {
    $alfabeto = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F");

    $color = "#";

    for ($i = 0; $i < 6; $i++) {
        $color .= $alfabeto[rand(0, count($alfabeto) - 1)];
    }

    return $color;
}


/**
 * Redireciona imediatamente para uma página web;
 * 
 * @param string $url URL a ser redirecionada
 */
function redirect($url){
    header_remove("Location");
    header("Location: " . $url);

    exit();
}

/**
 * Verificar se uma string1 é igual a string2
 * 
 * @param string $string1
 * @param string $string2
 * @return boolean
 */
function equals($string1,$string2){
    return mb_strtoupper($string1) === mb_strtoupper($string2);
}

/**
 * Procura se $find está contido em $search
 * 
 * @param string $find
 * @param string $search
 * @return boolean
 */
function contains($find, $search){
    return mb_strpos(mb_strtoupper($search), mb_strtoupper($find)) === FALSE?FALSE:TRUE;
}