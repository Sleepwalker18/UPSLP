/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package controlguarderia;
import java.sql.Connection;
import java.sql.DriverManager;


/**
 *
 * @author 150941
 */
public class Conectar {
    Connection Conectar=null;
    public Connection conexion(){
        try{
            Class.forName("com.mysql.jdbc.Driver");
            Conectar=DriverManager.getConnection("jdbc:mysql://localhost/guarderia","root","");
        }catch(Exception e){
            System.out.println(e.getMessage());
        }
        return Conectar;
    }

    
}
