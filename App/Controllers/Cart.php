<?php

namespace App\Controllers;

use App\Models\Cart as ModelsCart;

class Cart {

    public function index() {
        /**
         * faça a verificação se o usuario esta logado para receber o id dele
         */
        $userID = 1;
        if(isset($_POST['id']) && isset($_POST['quantity']) && isset($_POST['add'])) { ### verifica se a função é para adicionar
            $this->addItem($userID, $_POST['id'], $_POST['quantity']);
        }

        $cart = new ModelsCart();
        $cartItems = $cart->getCartItems($userID);

        /**
         * Retorna os dados a view
         */
    }

    private function addItem(int $userID, int $id, int $quantity) {
        $cart = new ModelsCart();
        $product = array($id, $quantity);
        return $cart->setCartItem($userID, $product);
    }
}