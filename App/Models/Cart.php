<?php

namespace App\Models;

use App\Core\Database;
use PDO;
class Cart {
    /**
     * Consulta todos os produtos de um usuario em especifico pelo ID
     *
     * @param integer $userID
     * @return void
     */
    public function getCartItems(int $userID) {
        $pdo = new Database();
        $stmt = $pdo->prepare("SELECT * FROM tbl_carrinho WHERE userID=:userID");
        $stmt->execute(['userID' => $userID]); 
        $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cartItems;
    }
    /**
     * Insere produto no carrinho de compras do usuario
     *
     * @param integer $userID
     * @param array $product
     * @return void
     */
    public function setCartItem(int $userID, array $product) {
        $pdo = new Database();
        [$productID, $quantity] = $product;
        $stmt = $pdo->prepare("INSERT INTO tbl_carrinho (userID, productID, quantity) VALUES (:userID, :productID, :quantity)");
        return $stmt->execute(['userID' => $userID, 'productID' => $productID, 'quantity' => $quantity]);
    }

    /**
     * Deleta produto no carrinho do usuario
     *
     * @param integer $userID
     * @param integer $productID
     * @return void
     */
    public function delCartItem(int $userID, int $productID) {
        $pdo = new Database();
        $stmt = $pdo->prepare("DELETE FROM tbl_carrinho WHERE userID= :userID AND productID= :productID");
        return $stmt->execute(['userID' => $userID, 'productID' => $productID]);
    }
}