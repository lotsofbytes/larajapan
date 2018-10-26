<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;

class DumpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:dump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump data in csv format';

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
        ini_set('memory_limit', '1G');

        $fields  = [
            'id',
            'created_at',
            'name',
            'email'
        ];

        // CSV出力

        $fh = fopen('users.csv', 'w');

        fputs($fh, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($fh, $fields);

         $max = User::max('id');
         $unit = 1000;

         echo "max:$max\n";

         for ($i = 0; $i < intval(ceil($max/$unit)); $i++) {
             $from = $i * $unit + 1;
             $to = ($i + 1) * $unit;

             $rows = User::where('id', '>=', $from)
                 ->where('id', '<=', $to)
                 ->get();

             foreach ($rows as $row) {
                 $values = [
                     $row->id,
                     $row->created_at,
                     $row->name,
                     $row->email
                 ];

                 fputcsv($fh, $values);
            }
        }
/*
        User::chunk(1000, function($rows) use($fh) {
            foreach ($rows as $row) {
                $values = [
                    $row->id,
                    $row->created_at,
                    $row->name,
                    $row->email
                ];

                fputcsv($fh, $values);
            }
        });
*/
/*
        $rows = User::all();

        foreach ($rows as $row) {
            $values = [
                $row->id,
                $row->created_at,
                $row->name,
                $row->email
            ];

            fputcsv($fh, $values);
        }
*/
        fclose($fh);

        printf("memory usage: %s\n",
            $this->formatBytes(memory_get_peak_usage(true)));


        return 0;
    }

    public static function formatBytes($size, $precision = 0)
    {
        $base = log($size, 1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    }
}
