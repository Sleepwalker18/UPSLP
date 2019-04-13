/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controlguarderia;

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

public class Observaciones extends javax.swing.JFrame {
    Conectar cc=new Conectar();
    Connection cn = cc.conexion();
    private String rec_prof="";
    private String rec_id_prof="";
    private String rec_id_g="";
    private String rec_id_al="";
    private String id_bd="";
    private ResultSet ver_maes;
    private ResultSet ver_al;
    private ResultSet imp_al;
    private ResultSet ver_fecs;
    private ResultSet id_pad;
    
    public Observaciones() {
        Image icon = Toolkit.getDefaultToolkit().getImage(getClass().getResource("/img/dd.jpg"));
        this.setIconImage(icon);
        initComponents();
        setLocationRelativeTo(null);
        setResizable(false);
        this.setTitle("OBSERVACIONES POR DIA");
        mostrar_maes();
        ((JPanel)getContentPane()).setOpaque(false); 
        ImageIcon uno=new ImageIcon(this.getClass().getResource("/img/obs.jpg")); 
        JLabel fondo= new JLabel(); 
        fondo.setIcon(uno); 
        getLayeredPane().add(fondo,JLayeredPane.FRAME_CONTENT_LAYER); 
        fondo.setBounds(0,0,uno.getIconWidth(),uno.getIconHeight());
    }

    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jsel_ni = new javax.swing.JComboBox<>();
        jLabel2 = new javax.swing.JLabel();
        jsel_m = new javax.swing.JComboBox<>();
        jScrollPane1 = new javax.swing.JScrollPane();
        jobs = new javax.swing.JTextArea();
        jLabel3 = new javax.swing.JLabel();
        jnom = new javax.swing.JTextField();
        jreg = new javax.swing.JButton();
        jLabel4 = new javax.swing.JLabel();
        jgrup = new javax.swing.JTextField();
        jsel_fec = new javax.swing.JComboBox<>();
        jLabel6 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();

        jPanel1.setOpaque(false);

        jLabel1.setFont(new java.awt.Font("Comic Sans MS", 0, 14)); // NOI18N
        jLabel1.setText("Id Niño:");

        jsel_ni.setFont(new java.awt.Font("Comic Sans MS", 0, 12)); // NOI18N
        jsel_ni.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] {  }));
        jsel_ni.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jsel_niActionPerformed(evt);
            }
        });

        jLabel2.setFont(new java.awt.Font("Comic Sans MS", 0, 14)); // NOI18N
        jLabel2.setText("Maestr@:");

        jsel_m.setFont(new java.awt.Font("Comic Sans MS", 0, 12)); // NOI18N
        jsel_m.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] {  }));
        jsel_m.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jsel_mActionPerformed(evt);
            }
        });

        jobs.setColumns(20);
        jobs.setRows(5);
        jobs.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                jobsKeyTyped(evt);
            }
        });
        jScrollPane1.setViewportView(jobs);

        jLabel3.setFont(jLabel2.getFont());
        jLabel3.setText("Nombre del niño:");

        jnom.setEditable(false);

        jreg.setFont(new java.awt.Font("Comic Sans MS", 0, 14)); // NOI18N
        jreg.setText("Registrar");
        jreg.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jregActionPerformed(evt);
            }
        });

        jLabel4.setFont(jLabel2.getFont());
        jLabel4.setText("Grupo:");

        jgrup.setEditable(false);
        jgrup.setFont(new java.awt.Font("Comic Sans MS", 0, 12)); // NOI18N

        jsel_fec.setFont(new java.awt.Font("Comic Sans MS", 0, 12)); // NOI18N
        jsel_fec.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] {  }));

        jLabel6.setFont(jLabel2.getFont());
        jLabel6.setText("Fechas registradas del niño:");

        jLabel5.setFont(jLabel2.getFont());
        jLabel5.setText("OBSERVACIONES:");

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addComponent(jLabel2)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jsel_m, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addGap(82, 82, 82))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addComponent(jLabel4)
                        .addGap(18, 18, 18)
                        .addComponent(jgrup, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addContainerGap(309, Short.MAX_VALUE))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel3)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jnom, javax.swing.GroupLayout.PREFERRED_SIZE, 170, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel1)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jsel_ni, javax.swing.GroupLayout.PREFERRED_SIZE, 73, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel6)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addComponent(jsel_fec, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 247, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(33, 33, 33)
                                .addComponent(jreg))
                            .addComponent(jLabel5))
                        .addGap(0, 0, Short.MAX_VALUE))))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2)
                    .addComponent(jsel_m, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(13, 13, 13)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel4)
                    .addComponent(jgrup, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(jsel_ni, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel6)
                    .addComponent(jsel_fec, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(jnom, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 7, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                        .addComponent(jLabel5)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(jreg, javax.swing.GroupLayout.Alignment.TRAILING))
                .addContainerGap())
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jsel_mActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jsel_mActionPerformed
        jsel_ni.removeAllItems();
        int i=0;
        rec_id_g=(String)jsel_m.getSelectedItem();
        try
        {
            Statement consulta = cn.createStatement();
            ver_al = consulta.executeQuery("SELECT * FROM hijos");
            while(ver_al.next()){
                if(ver_al.getString(4).equals(rec_id_g.substring(3, 5))){
                    jsel_ni.addItem(ver_al.getString(1));
                    jgrup.setText(ver_al.getString(3));
                    i++;
                }
                else if(i==0){
                    jgrup.setText("");
                }
            }

        }
        catch(SQLException sqlexception) { }
        if(i == 0){
            jsel_fec.removeAllItems();
            jsel_ni.addItem("Necesita registrar niños en el grupo");
        }
        else{
            selec_fech();
        }
    }//GEN-LAST:event_jsel_mActionPerformed

    private void jsel_niActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jsel_niActionPerformed
        rec_id_al=(String)jsel_ni.getSelectedItem();
        try
        {
            Statement consulta = cn.createStatement();
            imp_al = consulta.executeQuery("SELECT * FROM ninios");
            while(imp_al.next()){
                if(imp_al.getString(1).equals(rec_id_al)){
                    jnom.setText(imp_al.getString(4)+" " +imp_al.getString(2)+" "+imp_al.getString(3));
                    break;
                }
                else{
                    jnom.setText("");
                }
            }

        }
        catch(SQLException sqlexception) { }
        
    }//GEN-LAST:event_jsel_niActionPerformed

    private void jregActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jregActionPerformed
        if(jobs.getText().isEmpty()){
            JOptionPane.showMessageDialog(null, "Actividades vacio");
        }
        else if(jobs.getText().length()>255){
            JOptionPane.showMessageDialog(null, "Error en la inseción");
        }
        else{
            try{
                PreparedStatement pst = cn.prepareStatement("INSERT INTO observaciones(obs_id_ni,id_ninio,obs_fec,observs,obs_id_maes) VALUES (?,?,?,?,?)");
                pst.setString(1, "0");
                pst.setString(2, rec_id_al);
                pst.setString(3, (String)jsel_fec.getSelectedItem());
                pst.setString(4, jobs.getText());
                pst.setString(5, rec_id_g.substring(3, 5));
                pst.execute();
            }
            catch(Exception e){
                System.out.println(e.getMessage());
            }
        }
    }//GEN-LAST:event_jregActionPerformed

    private void jobsKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_jobsKeyTyped
        char get_car=evt.getKeyChar();
        if((get_car<'a' || get_car>'z') && (get_car<'A' || get_car>'Z') && (get_car<' ' || get_car>' ')){
            evt.consume();
        }
    }//GEN-LAST:event_jobsKeyTyped

    public void mostrar_maes(){
        jsel_m.removeAllItems();
        int i = 0;
        try
        {
            Statement consulta = cn.createStatement();
            ver_maes = consulta.executeQuery("SELECT * FROM empleados"); 
            while(ver_maes.next()){
                jsel_m.addItem((new StringBuilder()).append("ID:").append(ver_maes.getString(1)).append(" ").append(ver_maes.getString(2)).append(" ").append(ver_maes.getString(3)).toString());
                i++;
            }

        }
        catch(SQLException sqlexception) { }
        if(i == 0)
            jsel_m.addItem("Necesita registrar maestros");
    }
    
    public void selec_fech(){
        jsel_fec.removeAllItems();
        int i = 0;
        try
        {
            Statement consulta = cn.createStatement();
            ver_fecs = consulta.executeQuery("SELECT * FROM checar"); 
            while(ver_fecs.next()){
                id_bd=ver_fecs.getString(2);
                if(id_bd.substring(4, 10).equals(rec_id_al)){
                    jsel_fec.addItem(ver_fecs.getString(5));
                    i++;
                }
            }
        }
        catch(SQLException sqlexception) { }
        if(i == 0)
            jsel_fec.addItem("Necesita registrar entrada");
    }
    
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
            java.util.logging.Logger.getLogger(Observaciones.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Observaciones.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Observaciones.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Observaciones.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Observaciones().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextField jgrup;
    private javax.swing.JTextField jnom;
    private javax.swing.JTextArea jobs;
    private javax.swing.JButton jreg;
    private javax.swing.JComboBox<String> jsel_fec;
    private javax.swing.JComboBox<String> jsel_m;
    private javax.swing.JComboBox<String> jsel_ni;
    // End of variables declaration//GEN-END:variables
}
