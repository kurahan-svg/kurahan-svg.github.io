<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use ZipArchive; // Add this line to import ZipArchive
use File;
use Illuminate\Support\Facades\Log;

class DownloadController extends Controller
{
    public function downloadAll()
    {
        $models = [
            'Alatberat',
            'Proyek',
            'Material',
            'Perkakas',
            // Add other models here
        ];

        $zip = new ZipArchive;
        $zipFileName = 'Warehouse_alltable.zip';

        $tempFile = tempnam(sys_get_temp_dir(), $zipFileName);

        if ($zip->open($tempFile, ZipArchive::CREATE) === TRUE) {
            foreach ($models as $model) {
                $csvContent = $this->generateCSV($model);
                if ($csvContent) {
                    $zip->addFromString("{$model}.csv", $csvContent);
                }
            }
            $zip->close();

            return response()->download($tempFile, $zipFileName)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'Could not create zip file'], 500);
        }
    }

    private function generateCSV($model)
{
    $modelInstance = "App\\Models\\{$model}";

    if (!class_exists($modelInstance)) {
        Log::error("Model $model does not exist.");
        return null;
    }

    $list = $modelInstance::all()->toArray();

    if (empty($list)) {
        Log::info("No data found for model $model.");
        return null;
    }

    Log::info("Data for model $model: " . json_encode($list));

    $headers = array_keys($list[0]);
    $csvContent = '';

    $file = fopen('php://temp', 'r+');

    fputcsv($file, $headers);

    foreach ($list as $row) {
        $rowData = [];
        foreach ($headers as $header) {
            $rowData[] = isset($row[$header]) ? $row[$header] : '';
        }
        fputcsv($file, $rowData);
    }

    rewind($file);
    $csvContent = stream_get_contents($file);
    fclose($file);

    return $csvContent;
}

}
