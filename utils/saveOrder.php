<?php

if(isset($_SESSION['compra'])){
    
    $orderMaxId = PRODUCTDAO::getMaxId('ID_PEDIDO','pedido');
    $orderMaxId = $orderMaxId + 1;
    $user_id = $_SESSION['user_id'];
    
    $totalPrice = CalculateTotalPrice::calculateTPrice($_SESSION['compra']);
  
    $OrdId = $orderMaxId;
    $OrdUseId = $user_id;
    $OrdState = 'pagado';
   

    $insert_order = PRODUCTDAO::insertOrders($OrdId,$OrdUseId,$OrdState,$totalPrice);

  

    foreach($_SESSION['compra'] as $order){
        
        $OdeOrdId = $orderMaxId;
        $OdeProId = $order->getId();
        $OdeQuantity = $order->getQuantity();
        $ProductePrice = $order->calculatePrice();

        $insert_orderDe = PRODUCTDAO::insertOrderProducte($OdeOrdId,$OdeProId,$OdeQuantity,$ProductePrice);
      
      
        
    }

    header("Location:".base_url."producto/cockies");
}
