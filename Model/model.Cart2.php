<?php


/**
 * @deprecated
 * NO MORE USED
 * CONVERTED TO A SESSION VARIABLE
 * Still here in case of backward / changes
 * Cart: Permet de stocker des produits
 */
class Cart
{

    protected $cartId;
    protected $cartMaxItem = 0;
    protected $itemMaxQuantity = 0;
    private $items = [];
    public function __construct($options = [])
    {
        if (!session_id()) {
            session_start();
        }
    }

    /**
     * Get items in  cart.
     *
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Check emptiness
     * @return bool
     */
    public function isEmpty()
    {
        return empty(array_filter($this->items));
    }

    /**
     * Get the total of item in cart.
     * @return int
     */
    public function getTotalItem()
    {
        $total = 0;
        foreach ($this->items as $items) {
            foreach ($items as $item) {
                ++$total;
            }
        }
        return $total;
    }


    /**
     * Get the total of item quantity in cart.
     *
     * @return int
     */
    public function getTotalQuantity()
    {
        $quantity = 0;
        foreach ($this->items as $items) {
            foreach ($items as $item) {
                $quantity += $item['quantity'];
            }
        }
        return $quantity;
    }


    /**
     * Remove all
     */
    public function clear()
    {
        $this->items = [];
        $this->write();
    }


}