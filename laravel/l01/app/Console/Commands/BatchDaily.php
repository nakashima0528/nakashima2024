<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Parcel;
use App\Models\User;
use DateTime;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class BatchDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily batch.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("batch:daily --Start--");

        Log::info("user force delete --Start--");
        $date = new DateTime();
        // 現状時間は無視して日付のみで比較
        $reference_date = $date->modify('-1 days')->format('Y-m-d');
        $users = User::withTrashed()
                     ->where('status',config('const.user.status.TEMPORARY'))
                     ->whereDate('created_at','<',$reference_date)->get();
        Log::info("reference_date ".$reference_date);
        foreach($users as $user) {
            Log::info("user->id ". $user->id);
            $user->forceDelete();
        }
        Log::info("user force delete --End--");

        Log::info("parcel --Start--");
        // 保管超過日数設定　parcal.additional
        $date = new DateTime();
        // 現状時間は無視して日付のみで比較
        $reference_date = $date->modify('-'.config('const.scs.freestrage').' days')->format('Y-m-d');
        $parcels = Parcel::whereIn('status',[config('const.parcel.status.PREPARING'),config('const.parcel.status.CHANGE'),config('const.parcel.status.PENDING')])
                         ->whereDate('stored','<',$reference_date)->get();

        foreach($parcels as $parcel) {
            Log::info("parcel->id ". $parcel->id);
            // 保管超過日
            $parcel->additional = (int) $date->diff($parcel->stored)->format('%a');
            $parcel->save();
            Log::info("parcel->additional ". $parcel->additional);

            $invoice = Invoice::whereIn('status',[config('const.invoice.status.PREPARING'),config('const.invoice.status.PENDING')])
                              ->where('parcel_id',$parcel->id)
                              ->first();
            if($invoice){
                Log::info("invoice->id ". $invoice->id);
                // 保管費登録
                $invoiceDetail = InvoiceDetail::firstOrNew([
                    'invoice_id' => $invoice->id,
                    'type' => config('const.invoice_details.type.STORAGE')
                ]);
                $invoiceDetail->value = config('const.scs.additional') * $parcel->additional;
                $invoiceDetail->name = $parcel->additional.' days × '.config('const.scs.additional').' JPY';
                $invoiceDetail->save();
                Log::info("invoiceDetail->id ". $invoiceDetail->id);
                Log::info("invoiceDetail->value ". $invoiceDetail->value);
               
            }else{
                Log::error("invoice not faund");
            }
        }
        Log::info("parcel --End--");

        Log::info("batch:daily --End--");
    }
}
