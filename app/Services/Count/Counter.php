<?php

namespace App\Services\Count;

use Carbon\Carbon;
use Storage;

trait Counter
{
    protected $all = [
        'lines' => 0,
        'words' => 0,
        'chars' => 0
    ];

    public function count()
    {

        $total = null;
        $progress = 0;

        $this->started_at = Carbon::now();
        $this->save();

//        $handle = fopen($file, "r");
        $handle = Storage::readStream($this->file);

        while (!feof($handle)) {
            $line = fgets($handle);
            $bytesLeft = (int)stream_get_meta_data($handle)['unread_bytes'];
            if (isset($total)) {
                $progress = round(abs($total - $bytesLeft) / $total * 100);
            } else {
                $total = $bytesLeft;
            }


            $line = str_replace(array("\r", '\n'), '', $line);
            $this->all['lines']++;
            $this->all['words'] += str_word_count($line);
            $this->all['chars'] += strlen($line);

            $this->updateStatus($progress);
        }

        fclose($handle);

        $this->updateStatus($progress);
        $this->save();

    }

    private function updateStatus($progress)
    {
        $this->occurrences = $this->all[$this->type];
        if ($progress == 100 || $progress == 0) {
            $this->result = $this->occurrences == 0 ? 'Failed' : 'Success';
            $this->ended_at = $this->occurrences == null ? null : Carbon::now();
        } else {
            $this->result = $progress;
        }
        $this->save();
    }
}
