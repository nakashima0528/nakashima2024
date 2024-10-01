<?php
namespace App\Helpers;

use App\Models\Invoice;
use DateTime;

/**
 * ヘルパー
 */
class Helper
{
    /**
     * 顧客番号を取得
     */
    public static function getAccountNo($user_id)
    {
        return 'JP'.str_pad($user_id, 5, 0, STR_PAD_LEFT);
    }

    /**
     * 誕生日フォーマットを取得
     */
    public static function getBirth($birth)
    {
        $date = new DateTime($birth);
        // 01 January 1975
        return $date->format('d F Y');
    }

    /**
     * 宛先用住所を取得
     */
    public static function getFullAddress($address)
    {
        if(empty($address)){
            return '';
        }

        $fullAddress = isset($address->address2) ? $address->address2.', ' : '';
        $fullAddress .= isset($address->address1) ? $address->address1.', ' : '';
        $fullAddress .= isset($address->city) ? $address->city.', ' : '';
        $fullAddress .= isset($address->county) ? $address->county.', ' : '';
        $fullAddress .= isset($address->post) ? $address->post.', ' : '';
        $fullAddress .= $address->country;
 
        return $fullAddress;
    }

    /**
     * statusの応じたParcel日付フォーマットを取得
     */
    public static function getParcelDatToStatus($parcel)
    {
        $date_format = 'XXXXX on ';
    
        switch($parcel->status) {
            case config('const.parcel.status.CHANGE'):
            case config('const.parcel.status.PENDING'):
            case config('const.parcel.status.CANCEL'):
                $date_format = 'Stored on '.Helper::getParcelDate($parcel->stored);
                break;
            case config('const.parcel.status.PROCESSING'):
                if(isset($parcel->invoice->paid)){
                    $date_format = 'Under Process on '.Helper::getParcelDate($parcel->invoice->paid);
                }else{
                    $date_format = 'Stored on '.Helper::getParcelDate($parcel->stored);
                }
                break;
            case config('const.parcel.status.SHIPPED'):
                $date_format = 'Shipped on '.Helper::getParcelDate($parcel->shipped);
                break;
            default:
                $date_format = 'XXXXX on '.Helper::getParcelDate($parcel->stored);
            break;
        }

        return $date_format;
    }

    /**
     * Parcel日付フォーマットを取得
     */
    public static function getParcelDate($parcel_date)
    {
        if(empty($parcel_date)){
            return '-';
        }

        $date = new DateTime($parcel_date);
        // 01 Jan 1975    
        return $date->format('d M Y').'（UTC+9）';
    }

    /**
     * Invoice支払い期限日付フォーマットを取得
     */
    public static function getPaymentDueDate($issued_date)
    {
        if(empty($issued_date)){
            return '-';
        }
        $due_date = new DateTime($issued_date);
        $due_date->modify('+'.config('const.payment.due').' days');

        return $due_date->format('d M Y').'（UTC+9）';
    }

    /**
     * 指定TypeのInvoiseDetailを取得
     */
    public static function findInvoiseDetail($invoiceDetails,$type)
    {
        foreach($invoiceDetails as $invoiceDetail){
            if($invoiceDetail->type == $type){
                return $invoiceDetail->value;
            }
        }
        return 0;
    }

    /**
     * 指定TypeのInvoiseDetailのname取得
     */
    public static function findInvoiseDetailName($invoiceDetails,$type)
    {
        foreach($invoiceDetails as $invoiceDetail){
            if($invoiceDetail->type == $type){
                return $invoiceDetail->name;
            }
        }
        return '0 days × '.config('const.scs.additional').' JPY';
    }

    /**
     * Total payment取得
     */
    public static function getTotlePayment($invoiceDetails)
    {
        $total = 0;
        foreach($invoiceDetails as $invoiceDetail){
            $total += $invoiceDetail->value;
        }
        return $total;
    }

    /**
     * 未払いインボイス数取得
     */
    public static function countInvoiceUnpaid($user_id)
    {
        $query = Invoice::where('user_id', $user_id);
        $query->whereIn('status', [config('const.invoice.status.PENDING'),config('const.invoice.status.WISE')]);

        return $query->count();
    }
}