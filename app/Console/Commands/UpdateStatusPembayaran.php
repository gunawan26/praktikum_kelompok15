<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use DateTime;

class UpdateStatusPembayaran extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateStatusPembayaran:updatepembayarans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update status pembayaran user';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $now = new DateTime();
        DB::table('pembayarans')
        ->join('transaksis','pembayarans.id_transaksi','=','transaksis.id')
        ->where('transaksis.tgl_pesan','<',$now)
        ->where('pembayarans.id_status_validasi','=',1)
        ->update(['pembayarans.id_status_validasi'=>3]);
    }
}
