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
class accPuente {
 
    public function ValidarAcceso($Usuario, $Contraseña){
        
        $cnx = new Conexion();
        $cnx->Conectar();
        $cnx->setQuery("SELECT  * FROM usuario where UsrNick='".$Usuario."' AND UsrClave='".$Contraseña."'");
        
        $Arr= $cnx->ObtieneArrDatosLineal();
        $cnx->Desonectar();  
        return $Arr;
        
    }
    public function obtieneNombreClaveNickUsuarioSegunMail($Mail){
        
        $cnx = new Conexion();
        $cnx->Conectar();
        $cnx->setQuery("SELECT UsrClave, CONCAT(UsrNombre,' ',UsrApellido) AS UsrAlias, UsrNick FROM usuario where UsrMail='".$Mail."'");
        
        $Arr= $cnx->ObtieneArrDatosLineal();
        $cnx->Desonectar();  
        return $Arr;
        
    }

public function CargaTipoCultivos(){
        $cnx = new Conexion();
        $cnx->Conectar();
        $cnx->setQuery("SELECT * from tipo_cultivo");
        
        $Arr= $cnx->ObtieneArrDatosMultiLinea();
        $cnx->Desonectar();  
        return $Arr;

}
    public function ActualizarUsuario($Nombre, $Apellido, $Email, $Fono, $Rut){
        $cnx = new Conexion();
        
        $cnx->Conectar();
        $cnx->setQuery("UPDATE usuario SET UsrMail='".$Mail."', UsrNombre='".$Nombre."', UsrApellido='".$Apellido."', UsrTelefono='".$Fono."' where UsrRut='".$Usuario."'");
        $cnx->NoQuery();
        $cnx->getQuery();
        $cnx->Desonectar();
    }    
public function ActualizarClave($Contraseña, $Nick){
          $cnx = new Conexion();
        
        $cnx->Conectar();
        $cnx->setQuery("UPDATE usuario SET UsrClave='".$Clave."' where UsrNick='".$Nick."'");
        $cnx->NoQuery();
        $cnx->getQuery();
        $cnx->Desonectar();  
}
  public function GuardarUsuario($Rut, $Nombre, $Nick, $Apellido, $Cargo, $Celular, $Email, $Clave){
        $cnx = new Conexion();
        
        $cnx->Conectar();
        $cnx->setQuery("INSERT INTO usuario (UsrRut, UsrNick, UsrClave, UsrCargo, UsrEmail, UsrNombre, UsrApellido, UsrFono, UsrFoto) ".
                                    "values('".$Rut."', '".$Nick."', '".$Clave."', '".$Email."', '".$Nombre."', '".$Apellido."', '".$Celular."', 'assets/images/fotos/foto.png')");
        $cnx->NoQuery();
        $cnx->getQuery();
        $cnx->Desonectar();
    }  


     public function GuardarRegistro($NRegistros, $TipoRegistro, $Patente, $TipoCarga, $Kilos, $Pasajero,$Dus,$Fecha){
        $cnx = new Conexion();
        
        $cnx->Conectar();
        $cnx->setQuery("INSERT INTO registros (IdRegistros, RegTipoRegistro, RegPatente , RegTipoCarga, RegKilos, RegPasajero,RegDus, RegFecha) ".
                                    "values('".$NRegistros."', '".$TipoRegistro."', '". $Patente."', '".$TipoCarga."', '".$Kilos."', '". $Pasajero."','".$Dus ."','".$Fecha."')");
        $cnx->NoQuery();
        echo $cnx->getQuery();
        
        $cnx->getQuery();
        $cnx->Desonectar();
    }    

 public function listarIngresos(){
         $cnx = new Conexion();
        $cnx->Conectar();
        $cnx->setQuery("SELECT * from registros");
        
        $Arr= $cnx->ObtieneArrDatosMultiLinea();
        $cnx->Desonectar();  
        return $Arr;

}

    public function ConsultaExisteValor($Tabla, $Campo, $Valor){
        $cnx = new Conexion();
        
        $cnx->Conectar();
        $cnx->setQuery("SELECT UsrRut FROM ".$Tabla." WHERE ".$Campo."='".$Valor."'");
        $cantidad = $cnx->ObtieneCantidadRegistros();
        
        $cnx->Desonectar();
        return $cantidad;
    }
    public function GeneraSession($DatosUsuario){
   

        $_SESSION['Loggin']     = true;
        $_SESSION['Rut']        = $DatosUsuario["UsrRut"];
        $_SESSION['Cargo']      = $DatosUsuario["UsrCargo"];
        $_SESSION['Email']      = $DatosUsuario["UsrEmail"];
        $_SESSION['Nombre']     = $DatosUsuario["UsrNombre"];
        $_SESSION['Apellido']   = $DatosUsuario["UsrApellido"];
        $_SESSION['Celular']    = $DatosUsuario["UsrFono"];
        $_SESSION['Nick']       = $DatosUsuario["UsrNick"];
        $_SESSION['Foto']       = $DatosUsuario["UsrFoto"]; 
      
        
        
        $_SESSION['Start'] = time();
        $_SESSION['Expire'] = $_SESSION['Start'] + (5 * 60);
    }


}
