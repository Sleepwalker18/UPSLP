/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package controlguarderia;
import java.awt.Image;
import java.awt.Toolkit;
import java.sql.Connection;
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.ImageIcon;
import javax.swing.JLabel;
import javax.swing.JLayeredPane;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author 150389
 */
public class Admin extends javax.swing.JFrame {
        Conectar cc=new Conectar();
        Connection cn = cc.conexion();
        private ResultSet verifica_gru;
    
    public Admin() {
        Image icon = Toolkit.getDefaultToolkit().getImage(getClass().getResource("/img/dd.jpg"));
        this.setIconImage(icon);
        initComponents();
        setLocationRelativeTo(null);
        setResizable(false);
        this.setTitle("REGISTRO DE MAESTROS");
        mostrardatos("");
        ver_grupos();
        ((JPanel)getContentPane()).setOpaque(false); 
        ImageIcon uno=new ImageIcon(this.getClass().getResource("/img/cols.jpg")); 
        JLabel fondo= new JLabel(); 
        fondo.setIcon(uno); 
        getLayeredPane().add(fondo,JLayeredPane.FRAME_CONTENT_LAYER); 
        fondo.setBounds(0,0,uno.getIconWidth(),uno.getIconHeight());
    }

    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        adminNombre = new javax.swing.JTextField();
        adminDireccion = new javax.swing.JTextField();
        adminRegistrar = new javax.swing.JButton();
        jScrollPane2 = new javax.swing.JScrollPane();
        tbregistros = new javax.swing.JTable();
        jLabel1 = new javax.swing.JLabel();
        japep = new javax.swing.JTextField();
        jLabel5 = new javax.swing.JLabel();
        japem = new javax.swing.JTextField();
        jselec_gru = new javax.swing.JComboBox<String>();
        jLabel4 = new javax.swing.JLabel();

        jLabel2.setFont(new java.awt.Font("Comic Sans MS", 1, 14)); // NOI18N
        jLabel2.setText("Nombre");

        jLabel3.setFont(new java.awt.Font("Comic Sans MS", 1, 14)); // NOI18N
        jLabel3.setText("Direccion");

        adminNombre.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                adminNombreActionPerformed(evt);
            }
        });
        adminNombre.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                adminNombreKeyTyped(evt);
            }
        });

        adminDireccion.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                adminDireccionKeyTyped(evt);
            }
        });

        adminRegistrar.setFont(new java.awt.Font("Comic Sans MS", 0, 14)); // NOI18N
        adminRegistrar.setText("Registrar");
        adminRegistrar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                adminRegistrarActionPerformed(evt);
            }
        });

        tbregistros.setFont(new java.awt.Font("Comic Sans MS", 0, 12)); // NOI18N
        tbregistros.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Title 1", "Title 2", "Title 3", "Title 4"
            }
        ));
        tbregistros.setEnabled(false);
        jScrollPane2.setViewportView(tbregistros);

        jLabel1.setFont(new java.awt.Font("Comic Sans MS", 1, 14)); // NOI18N
        jLabel1.setText("Apellido P.");

        japep.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                japepActionPerformed(evt);
            }
        });
        japep.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                japepKeyTyped(evt);
            }
        });

        jLabel5.setFont(new java.awt.Font("Comic Sans MS", 1, 14)); // NOI18N
        jLabel5.setText("Apellido M.");

        japem.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                japemActionPerformed(evt);
            }
        });
        japem.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                japemKeyTyped(evt);
            }
        });

        jselec_gru.setFont(new java.awt.Font("Comic Sans MS", 0, 12)); // NOI18N
        jselec_gru.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "A", "B", "C", "D" }));

        jLabel4.setFont(new java.awt.Font("Comic Sans MS", 1, 14)); // NOI18N
        jLabel4.setText("Grupo:");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(31, 31, 31)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(30, 30, 30)
                        .addComponent(adminRegistrar))
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel3)
                            .addComponent(jLabel1)
                            .addComponent(jLabel2)
                            .addComponent(jLabel5)
                            .addComponent(jLabel4))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jselec_gru, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                .addComponent(adminDireccion)
                                .addComponent(adminNombre)
                                .addComponent(japep)
                                .addComponent(japem, javax.swing.GroupLayout.PREFERRED_SIZE, 65, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 27, Short.MAX_VALUE)
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 274, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(28, 28, 28))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(64, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel2)
                            .addComponent(adminNombre, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel1)
                            .addComponent(japep, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel5)
                            .addComponent(japem, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(6, 6, 6)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jLabel3)
                            .addComponent(adminDireccion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                            .addComponent(jselec_gru, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel4))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(adminRegistrar))
                    .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 212, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(52, 52, 52))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents
    public void mostrardatos(String valor){
        DefaultTableModel tabla_emp = new DefaultTableModel();
        tabla_emp.addColumn("ID");
        tabla_emp.addColumn("Nombre");
        tabla_emp.addColumn("Apellido Paterno");
        tabla_emp.addColumn("Apellido Materno");
        tabla_emp.addColumn("Direccion");
        tabla_emp.addColumn("Grupo");
        tbregistros.setModel(tabla_emp);
        String sql="";
        if(valor.equals("")){
            sql="SELECT * FROM empleados";
        }
        else{
            sql="SELECT * FROM empleados WHERE id ="+valor+"";
        }
        String datos[]=new String [6];
        try{
            Statement st = cn.createStatement();
            ResultSet rs = st.executeQuery(sql);
            while(rs.next()){
                datos[0]=rs.getString(1);
                datos[1]=rs.getString(2);
                datos[2]=rs.getString(3);
                datos[3]=rs.getString(4);
                datos[4]=rs.getString(5);
                datos[5]=rs.getString(6);
                tabla_emp.addRow(datos);
            }
            tbregistros.setModel(tabla_emp);
        }catch(Exception e ){
            //Logger.getLogger(sql, sql)
        }

    }
    private void adminRegistrarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_adminRegistrarActionPerformed
        if(adminNombre.getText().isEmpty() ||
                japep.getText().isEmpty() ||
                japem.getText().isEmpty() ||
                adminDireccion.getText().isEmpty()){
            JOptionPane.showMessageDialog(null, "No puede haber campos vacios");
        }
        else if(adminDireccion.getText().length()>40 || 
                adminNombre.getText().length()>40 ||
                japep.getText().length()>15 ||
                japem.getText().length()>15){
                JOptionPane.showMessageDialog(null, "No puede introducir mas caracteres de lo permitido");
                adminDireccion.setText("");
                adminNombre.setText("");
                japep.setText("");
                japem.setText("");
        }
        else{
            try{
                PreparedStatement pst = cn.prepareStatement("INSERT INTO empleados(id,nombre,ape_pat,ape_mat,direccion,grupo) VALUES (?,?,?,?,?,?)");
                pst.setString(1, null);
                pst.setString(2, adminNombre.getText());
                pst.setString(3, japep.getText());
                pst.setString(4, japem.getText());
                pst.setString(5, adminDireccion.getText());
                pst.setString(6, (String)jselec_gru.getSelectedItem());
                pst.executeUpdate();
                mostrardatos("");

            }catch(Exception e){
                JOptionPane.showMessageDialog(null, "Error en la inserción de datos");
            }
            adminNombre.setText("");
            japep.setText("");
            japem.setText("");
            adminDireccion.setText("");
        }
        // TODO add your handling code here:
    }//GEN-LAST:event_adminRegistrarActionPerformed

    private void adminNombreKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_adminNombreKeyTyped
        char get_car=evt.getKeyChar();
        if((get_car<'a' || get_car>'z') && (get_car<'A' || get_car>'Z') && (get_car<' ' || get_car>' ')){
            evt.consume();
        }
    }//GEN-LAST:event_adminNombreKeyTyped

    private void japepKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_japepKeyTyped
        char get_car=evt.getKeyChar();
        if((get_car<'a' || get_car>'z') && (get_car<'A' || get_car>'Z') && (get_car<' ' || get_car>' ')){
            evt.consume();
        }
    }//GEN-LAST:event_japepKeyTyped

    private void japemKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_japemKeyTyped
        char get_car=evt.getKeyChar();
        if((get_car<'a' || get_car>'z') && (get_car<'A' || get_car>'Z') && (get_car<' ' || get_car>' ')){
            evt.consume();
        }
    }//GEN-LAST:event_japemKeyTyped

    private void adminDireccionKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_adminDireccionKeyTyped
        char get_car=evt.getKeyChar();
        if((get_car<'a' || get_car>'z') && (get_car<'A' || get_car>'Z') && (get_car<' ' || get_car>' ')){
            evt.consume();
        }
    }//GEN-LAST:event_adminDireccionKeyTyped

    private void adminNombreActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_adminNombreActionPerformed
        japep.requestFocus();
    }//GEN-LAST:event_adminNombreActionPerformed

    private void japepActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_japepActionPerformed
        japem.requestFocus();
    }//GEN-LAST:event_japepActionPerformed

    private void japemActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_japemActionPerformed
        adminDireccion.requestFocus();
    }//GEN-LAST:event_japemActionPerformed

    private void ver_grupos()
    {
        jselec_gru.removeAllItems();
        int i = 0;
        try
        {
            Statement consulta = cn.createStatement();
            verifica_gru = consulta.executeQuery("SELECT * FROM grupos");
            while(verifica_gru.next()){
                jselec_gru.addItem(verifica_gru.getString(1));
                i++;
            }

        }
        catch(Exception exception) { }
        if(i == 0)
            jselec_gru.addItem("Necesita registrar grupos");
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
            java.util.logging.Logger.getLogger(Admin.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Admin.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Admin.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Admin.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Admin().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JTextField adminDireccion;
    private javax.swing.JTextField adminNombre;
    private javax.swing.JButton adminRegistrar;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JTextField japem;
    private javax.swing.JTextField japep;
    private javax.swing.JComboBox<String> jselec_gru;
    private javax.swing.JTable tbregistros;
    // End of variables declaration//GEN-END:variables
}
