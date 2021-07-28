<?php
namespace App\Helpers;

use App\Models\Transaction;

class TransactionHelper
{
    public static function purchase($account, $gateway, $order){
        $amount = $order->grand_total;

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance,
            'amount' => $order->grand_total,
            'nature' => 'Nill',
            'debit' => 0,
            'credit' => 0,
            'description' => 'An order #'.$order->id.' of PKR '.$amount.' was placed.',
        ]);
        
        if(!$gateway->isCOD() && !$gateway->isWallet()){
            self::deposit($account, $gateway->name, $amount);
            self::payment($account, $order, $amount);
        }
        else if($gateway->isWallet())
            self::payment($account, $order, $amount);
    }

    public static function sale($order){
        $amount = $order->grand_total;
        $account = $order->vendor->account;
        $gateway = $order->gateway;

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance,
            'amount' => $order->grand_total,
            'nature' => 'Nill',
            'debit' => 0,
            'credit' => 0,
            'description' => 'An order #'.$order->id.' of PKR '.$amount.' was placed.',
        ]);
        
        if(!$gateway->isCOD())
            self::reciept($account, $gateway->name, $amount);
    }
    
    public static function orderCancel($order){
        $amount = $order->grand_total;
        $account = $order->vendor->account;

        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance,
            'amount' => $order->grand_total,
            'nature' => 'Nill',
            'debit' => 0,
            'credit' => 0,
            'description' => 'An order #'.$order->id.' of PKR '.$amount.' was Canceled.',
        ]);
        
        if($order->paid){
            if($order->isFromRegisteredUser())
                self::return($account, $order, $amount);
            self::payment($account, $order, $amount);
        }

    }

    public static function withdraw($account, $methodName, $amount){
        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance - $amount,
            'amount' => $amount,
            'nature' => 'Debit',
            'debit' => $amount,
            'credit' => 0,
            'description' => 'PKR '.$amount.' withdrawn from '.$account->owner->name.' through '.$methodName. ' method.',
        ]);
        $account->update([
            'balance' => $account->balance - $amount
        ]);
    }
    
    public static function deposit($account, $methodName, $amount){
        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance + $amount,
            'amount' => $amount,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' => $amount,
            'description' => 'PKR '.$amount.' deposited to '.$account->owner->name.' through '.$methodName. ' method.',
        ]);
        $account->update([
            'balance' => $account->balance + $amount
        ]);
    }

    public static function reciept($account, $methodName, $amount){
        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance + $amount,
            'amount' => $amount,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' => $amount,
            'description' => 'PKR '.$amount.' was received from '.$account->owner->name.' through '.$methodName. ' method.',
        ]);
        $account->update([
            'balance' => $account->balance + $amount
        ]);
    }
    
    public static function payment($account, $order, $amount){
        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance - $amount,
            'amount' => $amount,
            'nature' => 'Debit',
            'debit' => $amount,
            'credit' => 0,
            'description' => 'PKR '.$amount.' was paid against order# '.$order->id.'.',
        ]);
        $account->update([
            'balance' => $account->balance - $amount
        ]);
    }
    
    public static function return($account, $order, $amount){
        Transaction::create([
            'account_id' => $account->id,
            'opening' => $account->balance,
            'closing' => $account->balance + $amount,
            'amount' => $amount,
            'nature' => 'Credit',
            'debit' => 0,
            'credit' => $amount,
            'description' => 'PKR '.$amount.' was returned From '.$order->vendor->name. ' against order#'.$order->id.'.',
        ]);
        $account->update([
            'balance' => $account->balance + $amount
        ]);
    }
}