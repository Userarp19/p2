<?php
require_once ("producte.php");
require_once ("mainDishes.php");
require_once ("drinks.php");
require_once ("utils/dataBase.php");

    class PRODUCTDAO{
    
            public static function getAllProByType($categoria){
                $con = DataBase::connect();
                $stmt = $con->prepare("SELECT * FROM producto WHERE ID_CATEGORIA=?");
                //Bind variables to the prepared statement as parameters
                $stmt->bind_param("i", $categoria);
    
                //Execute statement 
                $stmt->execute();
                $result=$stmt->get_result();
    
                
                if ($categoria==1) {
                    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                        $Llist[$row['ID_PRODUCTO']] = (new MainDishes ($row['ID_PRODUCTO'], $row['NOMBRE'], $row['PRECIO'], $row['PICTURE'], $row['QUANTITY'], $row['ID_CATEGORIA']));
                    }
                }elseif($categoria==2){
                    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                        $Llist[$row['ID_PRODUCTO']] = (new Dirkns ($row['ID_PRODUCTO'], $row['NOMBRE'], $row['PRECIO'], $row['PICTURE'], $row['QUANTITY'], $row['ID_CATEGORIA']));
                    }
                }
              
    
                return $Llist;
    
                $con->close();
    
            }
    
            public static function getProById($id){
                $con = DataBase::connect();
                $stmt = $con->prepare("SELECT * FROM producto WHERE ID_PRODUCTO=?");
                //Bind variables to the prepared statement as parameters
                $stmt->bind_param("i", $id);
    
                //Execute statement 
                $stmt->execute();
                $result=$stmt->get_result();
    
                $Llist;
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                    if ($row['ID_CATEGORIA']==1) {
                        $Llist[$row['ID_PRODUCTO']] = (new MainDishes ($row['ID_PRODUCTO'], $row['NOMBRE'], $row['PRECIO'], $row['PICTURE'], $row['QUANTITY'], $row['ID_CATEGORIA']));
                    }elseif ($row['ID_CATEGORIA']==2) {
                        $Llist[$row['ID_PRODUCTO']] = (new Dirkns ($row['ID_PRODUCTO'], $row['NOMBRE'], $row['PRECIO'], $row['PICTURE'], $row['QUANTITY'], $row['ID_CATEGORIA']));
                    }
                   
                }
    
                return $Llist;
    
                $con->close();
    
            }
    
            
    
           
        public static function getMaxId($Id,$table){
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT max($Id) as $Id FROM $table");

            //Execute statement 
            $stmt->execute();
            $result=$stmt->get_result();

            $Llist;
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                $Llist = $row[$Id];
            }

            return $Llist;

            $con->close();

        }

        public static function getuserById($Id){
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM usuario where ID_USUARIO= ?");
            $stmt->bind_param("i", $Id);

            //Execute statement 
            $stmt->execute();
            $result=$stmt->get_result();

            $Llist;
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                $Llist['ID_USUARIO'] = $row['ID_USUARIO'];
                $Llist['NOMBRE'] = $row['NOMBRE'];
                $Llist['APELLIDOS'] = $row['APELLIDOS'];
                $Llist['EMAIL'] = $row['EMAIL'];
                $Llist['PASSWORD'] = $row['PASSWORD'];
                $Llist['TELEFONO'] = $row['TELEFONO'];
                $Llist['DIRECCIÓN'] = $row['DIRECCIÓN'];
                $Llist['ROLE'] = $row['ROLE'];
            }

            return $Llist;

            $con->close();

        }


        public static function getCheckUserEmail($email){
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT EMAIL FROM usuario WHERE EMAIL LIKE '%".$email."%'");

            //Execute statement 
            $stmt->execute();
            $result=$stmt->get_result();

            $Llist = '';
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                $Llist = $row['EMAIL'];
            }

            return $Llist;

            $con->close();

        }

        public static function getCheckUserLogin($email){
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM usuario WHERE EMAIL LIKE '%".$email."%'");

            //Execute statement 
            $stmt->execute();
            $result=$stmt->get_result();

            $Llist;
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                $Llist['ID_USUARIO'] = $row['ID_USUARIO'];
                $Llist['NOMBRE'] = $row['NOMBRE'];
                $Llist['APELLIDOS'] = $row['APELLIDOS'];
                $Llist['EMAIL'] = $row['EMAIL'];
                $Llist['PASSWORD'] = $row['PASSWORD'];
                $Llist['TELEFONO'] = $row['TELEFONO'];
                $Llist['DIRECCIÓN'] = $row['DIRECCIÓN'];
                $Llist['ROLE'] = $row['ROLE'];
            }

            return $Llist;

            $con->close();

        }

        public static function insertUser($id,$name,$surname,$email,$hash,$mobile,$address,$ROLE){
            $con = DataBase::connect();
            $stmt = $con->prepare("insert into usuario (ID_USUARIO, NOMBRE, APELLIDOS, EMAIL, PASSWORD, TELEFONO, DIRECCIÓN, ROLE) values (?,?,?,?,?,?,?,?)");
            $stmt->bind_param("issssisi", $id,$name,$surname,$email,$hash,$mobile,$address,$ROLE);
            //Execute statement 
            $stmt->execute();
            //$result=$stmt->get_result();

            $Llist = 'User have been Created Successfully';
            

            return $Llist;

            $con->close();

        }

    
        public static function updateUserById($id,$name,$surname,$mobile,$email,$address,$hash){
            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE usuario  set NOMBRE = ?, APELLIDOS = ?, EMAIL = ?, PASSWORD = ?, TELEFONO = ? , DIRECCIÓN=? where ID_USUARIO = ?");
            $stmt->bind_param("ssssisi", $name,$surname,$email,$hash,$mobile,$address,$id);
            //Execute statement 
            $stmt->execute();
            //$result=$stmt->get_result();

            $Llist = 'data has been modified successfully ';
            

            return $Llist;

            $con->close();

        }
    
        //$row['ID_PRODUCTO'], $row['NOMBRE'], $row['PRECIO'], $row['PICTURE'], $row['QUANTITY'], $row['ID_CATEGORIA']
        public static function createProducte($id,$name,$quantity,$price,$category,$ruta){
            $con = DataBase::connect();
            $stmt = $con->prepare("insert into producto (ID_PRODUCTO,NOMBRE,PRECIO,PICTURE,QUANTITY,ID_CATEGORIA) values (?,?,?,?,?,?)");
            $stmt->bind_param("isisii", $id,$name,$price,$ruta,$quantity,$category);
            //Execute statement 
            $stmt->execute();
            //$result=$stmt->get_result();

            $Llist = 'Product have been created successfully';
            

            return $Llist;

            $con->close();

        }

        
        public static function deleteProducteById($id){
            $con = DataBase::connect();
            $stmt = $con->prepare("delete from producto where ID_PRODUCTO = ?");
            $stmt->bind_param("i",$id);
            //Execute statement 
            $stmt->execute();
            //$result=$stmt->get_result();

            $Llist = 'Product has been successfully deleted';
            

            return $Llist;

            $con->close();

        }
    
        public static function updateProducte($id,$name,$quantity,$price,$category,$ruta){
            $con = DataBase::connect();
            $stmt = $con->prepare("UPDATE producto set  NOMBRE = ?, PRECIO = ?, PICTURE = ?, QUANTITY = ?, ID_CATEGORIA = ? where ID_PRODUCTO = ?");
            $stmt->bind_param("sisiii", $name,$price,$ruta,$quantity,$category,$id);
            //Execute statement 
            $stmt->execute();
            //$result=$stmt->get_result();

            $Llist = 'Product has been successfully modified';
            

            return $Llist;

            $con->close();

        }


       
        public static function insertOrders($OrdId,$OrdUseId,$OrdState,$totalPrice){
            $con = DataBase::connect();
            $stmt = $con->prepare("insert into pedido (ID_PEDIDO, PRECIO, FECHA_PEDIDO, ESTADO_PEDIDO, ID_USUARIO) values (?,?,now(),?,?)");
            $stmt->bind_param("iisi", $OrdId,$totalPrice,$OrdState,$OrdUseId);
            //Execute statement 
            $stmt->execute();
            $result=$stmt->get_result();

            $Llist = 'Order has been saved Successfully';
            

            return $Llist;

            $con->close();

        }
        public static function insertOrderProducte($OdeOrdId,$OdeProId,$OdeQuantity,$ProductePrice){
            $con = DataBase::connect();
            $stmt = $con->prepare("insert into pedido_producto (ID_PEDIDO, ID_PRODUCTO, CANTIDAD, PRECIO) values (?,?,?,?)");
            $stmt->bind_param("iiii", $OdeOrdId,$OdeProId,$OdeQuantity,$ProductePrice);
            //Execute statement 
            $stmt->execute();
            $result=$stmt->get_result();

            $Llist = '  Created Successfully';
            

            return $Llist;

            $con->close();

        }

       

   

        public static function getAllOrderbyUserId($id){
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT p.ID_PEDIDO,u.NOMBRE, p.ESTADO_PEDIDO, p.PRECIO, p.FECHA_PEDIDO FROM pedido AS p INNER JOIN usuario AS u ON p.ID_USUARIO = u.ID_USUARIO where u.ID_USUARIO =$id");
            //Execute statement 
            $stmt->execute();
            $result=$stmt->get_result();

            $pedido;
            
           $a=0;
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
               

                   
                $pedido[$a]['ID_PEDIDO']=$row['ID_PEDIDO'];
                $pedido[$a]['NOMBREUSUARIO']=$row['NOMBRE'];
                $pedido[$a]['FECHA_PEDIDO']=$row['FECHA_PEDIDO'];
                $pedido[$a]['ESTADO_PEDIDO']=$row['ESTADO_PEDIDO'];
                $pedido[$a]['PRECIO']=$row['PRECIO'];
                $a++;

            }

            

            
            
            return $pedido;

            $con->close();

        }


        public static function insertReview($revOrdId, $revUserId, $revStar, $revComment) {
            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO orderreview (revOrdId, revUserId, revStar, revComment, revDate) VALUES (?, ?, ?, ?, NOW())");
            $stmt->bind_param("iiis", $revOrdId, $revUserId, $revStar, $revComment);
            // Execute statement 
            $stmt->execute();
        
            $Llist = 'Created Successfully';
        
            $con->close();
        
            return $Llist;
        }
        



        
        public static function getRviewByID($revUserId, $revOrdId) {
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM orderreview WHERE revUserId = ? AND revOrdId = ?");
            $stmt->bind_param("ii", $revUserId, $revOrdId);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $con->close();
            return $row;
        }
       
        public static function getALLRview() {
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT o.revOrdId, u.NOMBRE, o.revStar, o.revComment, o.revDate FROM orderreview as o INNER JOIN usuario as u ON o.revUserId= u.ID_USUARIO;" );
            $stmt->execute();
            $result=$stmt->get_result();
            
            $reviews='';
          
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                $reviews='<div   style="margin-left:30%; border: 10px solid #4c1f1f; text-align:center; width:40%; height: auto; margin-top:2%; margin-bottom:0%;">';
                $reviews.='<h4 class="font1">'.$row['NOMBRE'].'</h4>';
                $reviews.='<p style="background-color:#692020; color white; width:400px; padding:4%; margin:auto;" class="font1" >'.$row['revComment'].'</p>';   
                $reviews.='<div class="rate fontsize1">';
                $reviews.='<h4 class="font1">'.$row['NOMBRE'].'</h4>';
                if ($row['revStar']==1) {
                    $reviews.= '<p>★☆☆☆☆</p>';
                }elseif ($row['revStar']==2) {
                    $reviews.= '<p>★★☆☆☆</p>';
                }elseif ($row['revStar']==3) {
                    $reviews.= '<p>★★★☆☆</p>';
                }elseif ($row['revStar']==4) {
                    $reviews.= '<p>★★★★☆</p>';
                }elseif ($row['revStar']==5) {
                    $reviews.= '<p>★★★★★</p>';
                }
                $reviews.= '<p>'.$row['revDate'].'</p>';
                $reviews.=' </div>';
                $reviews.=' </div></div><br>';
    
     
   
  
            }

            $con->close();
            return $reviews;
        }
    }
    

       

?>