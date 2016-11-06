<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of accCementerios
 *
 * @author Usuario
 */
class Usuario {
 
    
    
    public function cambiaFotoPerfil($usuario, $ruta, $tipoFoto){
        
        $cnx = new Conexion();
        $cnx->Conectar();
        $cnx->setQuery("UPDATE usuario set ".$fotoPerfil."='".$ruta."' WHERE UsrRut='".$usuario."'");
        
        $cnx->Ejecuta();
        $cnx->Desonectar();   
        
    }
  
}
