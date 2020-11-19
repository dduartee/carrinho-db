<?php

namespace App\Controllers;

use App\Models\Cart as ModelsCart;

class Cart {

    /**
     * Função principal, será chamada quando a url será cart/
     *
     * @return void
     */
    public function index() {
        /**
         * faça a verificação se o usuario esta logado para receber o id dele
         */

        $userID = 1;
        
        if(isset($_POST['id']) && isset($_POST['quantity']) && isset($_POST['add'])) {
            $this->addItem($userID, $_POST['id'], $_POST['quantity']);
        }
        $cart = new ModelsCart();
        $cartItems = $cart->getCartItems($userID);

        /**
         * Retorna os dados a view
         */
    }

    /**
     * Função que será chamada se o POST add existir
     *
     * @param integer $userID
     * @param integer $id
     * @param integer $quantity
     * @return void
     */
    private function addItem(int $userID, int $id, int $quantity) {
        $cart = new ModelsCart();
        $product = array($id, $quantity);
        return $cart->setCartItem($userID, $product);
    }
}