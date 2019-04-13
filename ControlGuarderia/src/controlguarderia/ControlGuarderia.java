/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package controlguarderia;

/**
 *
 * @author 150389
 */
public class ControlGuarderia {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new InicioGuar().setVisible(true);
            }
        });
    }
    
}
