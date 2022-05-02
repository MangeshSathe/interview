<?php
		/**
		 * checkout.php
		 *
		 * Supermarket Checkout 
		 *
		 * @category   Customer
		 * @package    Checkout
		 * @author     Mangesh Sathe
		 * @copyright  2022 Mangesh Sathe
		 * @license    Open Source
		 * @version    1.0.0
		 * @release    May/02/2022
		 */
		 
		/*
		* Database connection
		*/
		require_once('dbconnect.php');
		
		/**
		 * checkout
		 *
		 * Argument   Array
		 * Externalresourse    No
		 * Return     On Success : Amount, On Failure : Errorcode
		 */
		class checkout extends dbconnect {
			
			private $item = array();
			private $discItem = array();
			
			function __construct() {
				// Initialization at the time creation of an object goes here
			}
			
			function calculate($cart = '') {
				$total = 0;
				$subTotal = 0;
				$tax = 0;
				
				if(is_array($cart) == true) {
					$inClauseSKU = '';
					
					foreach($cart as $keySKU => $valueSKU) {
						$inClauseSKU .= "'".$keySKU."',";
					}
					
					$orderedSKU = substr($inClauseSKU,0, -1);
					$getCashedDataForCalculation = $this->getOrderedInfo($orderedSKU);
					
					foreach($getCashedDataForCalculation as $key => $value) {
							$discItem[$value['SKU']][$value['sp_on_SKU']]['unit_price'] = $value['unit_price'];
							$discItem[$value['SKU']][$value['sp_on_SKU']]['discount_by_percentage'] = $value['discount_by_percentage'];
						}

					foreach($getCashedDataForCalculation as $key => $value) {
						$discperItem = $this->getItemDiscInfo($value['SKU'], $value['sp_on_SKU']);
						for($i = $cart[$value['SKU']]; $i > 0; $i = $i- $discperItem[0]['sp_on_SKU']) {	
						
							if($i <= 1) {
								$subTotal = (($discperItem[0]['unit_price'] * $discperItem[0]['sp_on_SKU']));
							} else {
								$discount = round(($discperItem[0]['discount_by_percentage']/100)*($discperItem[0]['unit_price'] * $discperItem[0]['sp_on_SKU']));
								$subTotal = (($discperItem[0]['unit_price'] * $discperItem[0]['sp_on_SKU']) - $discount);
							}
							
							echo "<b>SKU </b> ".$value['SKU'] .' | '. $subTotal."<br/>";
							$total += $subTotal;
							echo "<br/>";
						}
						
					}
					return $total;
				} else {
					$error = array('errorCode' => 101, 'errorMessage' => 'It must be an array in order to process the request!');
					echo json_encode($error);
					exit(1);
				}
			}
			
			function calculateCustomDiscount() {
				
			}
			
			function emailNotify() {
				
			}
		}
		//Example case 1 cart
		$cartItemsFromSessionOrCookie =  array( 'A' => 3, 
												'B' => 2,
												'C' => 2); 
		/*									
		//Example case 2 array
		$cartItemsFromSessionOrCookie =  array( 'C' => 3, 
												'E' => 10,
												'D' => 2); 
		//Example case 3 array
		$cartItemsFromSessionOrCookie =  array( 'A' => 7, 
												'E' => 10,
												'D' => 2); 
		*/
		$checkout = new checkout();
		$total_Purchase = $checkout -> calculate($cartItemsFromSessionOrCookie);
		echo "<b>Total amount for purchased items : </b>".$total_Purchase;