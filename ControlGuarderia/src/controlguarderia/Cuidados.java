/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controlguarderia;

import com.toedter.calendar.IDateEditor;
import com.toedter.calendar.JDateChooser;
import java.awt.Container;
import java.awt.EventQueue;
import java.awt.Image;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.PrintStream;
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.*;

public class Cuidados extends javax.swing.JFrame {
    Conectar cc=new Conectar();
    Connection cn = cc.conexion();
    private ResultSet ver_al;
    private ResultSet com_al;
    private ResultSet chec_cui;
    private String id_nin="";
    
    public Cuidados() {
        Image icon = Toolkit.getDefaultToolkit().getImage(getClass().getResource("/img/dd.jpg"));
        this.setIconImage(icon);
        initComponents();
        setLocationRelativeTo(null);
        setResizable(false);
        this.setTitle("CUIDADOS POR DIA");
        ((JPanel)getContentPane()).setOpaque(false); 
        ImageIcon uno=new ImageIcon(this.getClass().getResource("/img/cuida.jpg")); 
        JLabel fondo= new JLabel(); 
        fondo.setIcon(uno); 
        getLayeredPane().add(fondo,JLayeredPane.FRAME_CONTENT_LAYER); 
        fondo.setBounds(0,0,uno.getIconWidth(),uno.getIconHeight());
    }

    public void mostrar_nin_in(String fecha,String nombre,String id_ni){
        int i=0;
        System.out.println(fecha);
        try
        {
            Statement consulta = cn.createStatement();
            Statement consulta2 = cn.createStatement();
            com_al = consulta2.executeQuery("SELECT * FROM hijos WHERE id_hijo='"+id_ni+"'");
            ver_al = consulta.executeQuery("SELECT * FROM checar WHERE fecha='"+fecha+"'"); 
            while(com_al.next()){
                while(ver_al.next()){
                    System.out.println(ver_al.getString(2)+" "+com_al.getString(2)+"-"+id_ni);
                    if(ver_al.getString(2).equals(com_al.getString(2)+"-"+id_ni)){
                        jnin_in.addItem("ID:"+id_ni+"-"+nombre);
                        i++;
                        break;
                    }
                }
            }
            if(i==0){
                jnin_in.removeAllItems();
            }
        }
        catch(SQLException sqlexception) { }
        
    }
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jnin_in = new javax.swing.JComboBox<>();
        jScrollPane1 = new javax.swing.JScrollPane();
        jcuid = new javax.swing.JTextArea();
        jLabel2 = new javax.swing.JLabel();
        jreg = new javax.swing.JButton();

        jPanel1.setOpaque(false);

        jLabel1.setFont(new java.awt.Font("Comic Sans MS", 0, 14)); // NOI18N
        jLabel1.setText("Niños Ingresados:");

        jnin_in.setFont(new java.awt.Font("Comic Sans MS", 0, 12)); // NOI18N
        jnin_in.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { }));

        jcuid.setColumns(20);
        jcuid.setRows(5);
        jcuid.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                jcuidKeyTyped(evt);
            }
        });
        jScrollPane1.setViewportView(jcuid);

        jLabel2.setFont(new java.awt.Font("Comic Sans MS", 0, 14)); // NOI18N
        jLabel2.setText("CUIDADOS:");

        jreg.setFont(new java.awt.Font("Comic Sans MS", 0, 14)); // NOI18N
        jreg.setText("Registrar");
        jreg.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jregActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(25, 25, 25)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addComponent(jLabel1)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(jnin_in, javax.swing.GroupLayout.PREFERRED_SIZE, 182, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(jLabel2))
                .addContainerGap(53, Short.MAX_VALUE))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jreg)
                .addGap(45, 45, 45))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                .addContainerGap(68, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(jnin_in, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addComponent(jLabel2)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jreg)
                .addGap(31, 31, 31))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(18, Short.MAX_VALUE)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(19, 19, 19))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(27, Short.MAX_VALUE)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jregActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jregActionPerformed
        int i=0;
        id_nin=(String)jnin_in.getSelectedItem();
        if(jcuid.getText().isEmpty()){
            JOptionPane.showMessageDialog(null, "Error cuidados vacios");
        }
        else if(jcuid.getText().length()>255){
            JOptionPane.showMessageDialog(null, "Error en la inserción");
        }
        else{
            try
            {
                Statement consulta = cn.createStatement();
                chec_cui = consulta.executeQuery("SELECT * FROM cuidados");
                while(chec_cui.next()){
                    if(chec_cui.getString(1).equals(id_nin.substring(3, 9))){
                        i++;
                        break;
                    }
                }
                if(i==0){
                    PreparedStatement pst = cn.prepareStatement("INSERT INTO cuidados(cui_id_ni,cuida) VALUES (?,?)");
                    pst.setString(1, id_nin.substring(3, 9));
                    pst.setString(2, jcuid.getText());
                    pst.execute();
                    JOptionPane.showMessageDialog(null, "Realizado");
                    this.dispose();
                }
                else{
                    PreparedStatement pst = cn.prepareStatement("UPDATE cuidados SET cuida=? WHERE cui_id_ni='"+id_nin.substring(3, 9)+"'");
                    pst.setString(1, jcuid.getText());
                    pst.execute();
                    JOptionPane.showMessageDialog(null, "Realizado");
                    this.dispose();
                }
            }
            catch(SQLException sqlexception) { System.out.println(sqlexception.getMessage());}

        }
    }//GEN-LAST:event_jregActionPerformed

    private void jcuidKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_jcuidKeyTyped
        char get_car=evt.getKeyChar();
        if((get_car<'a' || get_car>'z') && (get_car<'A' || get_car>'Z') && (get_car<' ' || get_car>' ')){
            evt.consume();
        }
    }//GEN-LAST:event_jcuidKeyTyped

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Cuidados.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Cuidados.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Cuidados.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Cuidados.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Cuidados().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextArea jcuid;
    private javax.swing.JComboBox<String> jnin_in;
    private javax.swing.JButton jreg;
    // End of variables declaration//GEN-END:variables
}
