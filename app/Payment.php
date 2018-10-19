<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Payment extends Model
{
	use Sortable;
	
	public $fillable = ['merchant_order_id', 'paymentId', 'payment_type', 'amount', 'currency', 'country', 'service_tax_amount', 'installments', 'interest', 'capture', 'authenticate', 'soft_descriptor', 'crc_card_number', 'crc_holder', 'crc_expiration_date', 'crc_security_code', 'crc_save_card', 'crc_brand', 'dbc_customer_name', 'dbc_card_number', 'dbc_holder', 'dbc_expiration_date', 'dbc_security_code', 'dbc_brand'];
	public $sortable = ['id', 'merchant_order_id', 'paymentId', 'payment_type', 'amount', 'currency', 'country', 'service_tax_amount', 'installments', 'interest', 'capture', 'authenticate', 'soft_descriptor', 'crc_card_number', 'crc_holder', 'crc_expiration_date', 'crc_security_code', 'crc_save_card', 'crc_brand', 'dbc_customer_name', 'dbc_card_number', 'dbc_holder', 'dbc_expiration_date', 'dbc_security_code', 'dbc_brand'];
	
	public function pedido()
	{
		return $this->belongsTo('App\Pedido');
	}
	
	public function cartao_creditos()
	{
		return $this->hasMany('App\CreditCardResponse');
	}
	
	public function cartao_debitos()
	{
		return $this->hasMany('App\DebitCardResponse');
	}

	public static function getStatusMundipag($status)
	{
		switch($status) {
			case 'pending':
				return 3;
			case 'paid':
				return 2;
			case 'canceled':
				return null;
			case 'processing':
				return 1;
			case 'failed':
				return 0;
		};
	}
}
