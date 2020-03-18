<?php

namespace App\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Socio;

class SocioController extends Controller
{

    
    public function importCSV(Request $request){
    
        if ($request->input('submit') != null ){
           
            $file = $request->file('file');
            
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            
            // Valid File Extensions
            $valid_extension = array("csv");
            
            // 2MB in Bytes
            $maxFileSize = 2097152;
            
            // Check file extension
            if(in_array(strtolower($extension),$valid_extension)){
                
                // Check file size
                if($fileSize <= $maxFileSize){
                    
                    // File upload location
                    $location = 'uploads';
                    
                    // Upload file
                    $file->move($location,$filename);
                    
                    // Import CSV to Database
                    $filepath = public_path($location."/".$filename);
                    
                    // Reading file
                    $file = fopen($filepath,"r");
                    
                    $importData_arr = array();
                    $i = 0;
                    
                    while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
                        $num = count($filedata );
                        
                        // Skip first row (Remove below comment if you want to skip the first row)
                        /*if($i == 0){
                         $i++;
                         continue;
                         }*/
                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata [$c];
                        }
                        $i++;
                    }
                    fclose($file);
                    
                    // Insert to MySQL database
                    foreach($importData_arr as $importData){
                       // dd($importData[0]);
                        $insertData = array(
                            "name"=> utf8_encode($importData[0]),
                            "edad"=>$importData[1],
                            "group"=>utf8_encode($importData[2]),
                            "status"=>$importData[3],
                            "level"=>$importData[4]);
                             Socio::insert($insertData);
                        
                    }
                    
                }
            }
            
        }
        
        // Redirect to index
        return view('welcome');
    }
}
