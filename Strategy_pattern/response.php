<?php

interface CalculateTotalCostStrategy
{
    public function calculate($items, $percentage);
}
class DiscountCodeStrategy implements CalculateTotalCostStrategy
{
    public function calculate($items, $discount)
    {
        // $discount = 10;
        // logic to apply discount code of 10 %
        $discountValue = ($items * $discount) / 100;
        return $items - $discountValue;
    }
}
class ShippingCostStrategy implements CalculateTotalCostStrategy
{
    public function calculate($items, $shippingCost)
    {
        // $shippingCost = 10;
        // logic to calculate shipping costs of 10 %
        $shippingCostValue = (($items) * $shippingCost) / 100;

        return ($items) + $shippingCostValue;
    }
}
class ShoppingCart
{
    private $strategy;

    public function __construct(CalculateTotalCostStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function calculateTotalCost( $items, $percentage)
    {
        return $this->strategy->calculate($items, $percentage);
    }
}
// $items = array(10, 20, 30);
// $discountPercentage = 10;    //DISCOUNT
// $shippingPercentage = 10;    //SHIPPING
$items = $_POST['totaltemsPrice'];
$percentage = $_POST['discountPrice'];
if ($_POST['discount_type'] == 'shipping') {
    $shoppingCart = new ShoppingCart(new ShippingCostStrategy());
    echo $shoppingCart->calculateTotalCost($items, $percentage);
} else {
    $shoppingCart = new ShoppingCart(new DiscountCodeStrategy());
    echo $shoppingCart->calculateTotalCost($items, $percentage);
}
