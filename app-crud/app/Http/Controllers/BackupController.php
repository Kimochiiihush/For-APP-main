<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BackupController extends Controller
{
    private $mysqlUserName = 'root';
    private $mysqlPassword = '';
    private $mysqlHostName = 'localhost';
    private $DbName = 'crud_app';

    public function showBackupForm()
    {
        return view('admin.backup');
    }

    public function backupDatabase()
    {
        $this->backup();
        return redirect()->back()->with('status', 'Backup created successfully!');
    }

    public function restoreDatabase(Request $request)
    {
        $this->restore($request);
        return redirect()->back()->with('status', 'Database restored successfully!');
    }

    public function dropDatabase()
    {
        $this->drop();
        return redirect()->back()->with('status', 'Database dropped successfully!');
    }

    public function createDatabase()
    {
        $this->create();
        return redirect()->back()->with('status', 'Database created successfully!');
    }

    private function backup()
    {
        $mysqli = new \mysqli($this->mysqlHostName, $this->mysqlUserName, $this->mysqlPassword, $this->DbName); 
        $mysqli->select_db($this->DbName); 
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables = $mysqli->query('SHOW TABLES'); 
        while($row = $queryTables->fetch_row()) 
        { 
            $target_tables[] = $row[0]; 
        }   

        $content = '';

        foreach($target_tables as $table)
        {
            $result = $mysqli->query('SELECT * FROM '.$table);  
            $fields_amount = $result->field_count;  
            $rows_num = $mysqli->affected_rows;     
            $res = $mysqli->query('SHOW CREATE TABLE '.$table); 
            $TableMLine = $res->fetch_row();
            $content .= "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) 
            {
                while($row = $result->fetch_row())  
                { 
                    if ($st_counter % 100 == 0 || $st_counter == 0)  
                    {
                        $content .= "\nINSERT INTO ".$table." VALUES";
                    }
                    $content .= "\n(";
                    for($j = 0; $j < $fields_amount; $j++)  
                    { 
                        $row[$j] = str_replace("\n", "\\n", addslashes($row[$j])); 
                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"'; 
                        }
                        else 
                        {   
                            $content .= '""';
                        }     
                        if ($j < ($fields_amount - 1))
                        {
                            $content .= ',';
                        }      
                    }
                    $content .= ")";
                    if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) 
                    {   
                        $content .= ";";
                    } 
                    else 
                    {
                        $content .= ",";
                    } 
                    $st_counter++;
                }
            }
            $content .= "\n\n\n";
        }

        $backup_name = $this->DbName . "_backup_" . date("Y-m-d_H-i-s") . ".sql";
        $backup_folder = 'C:/xampp/htdocs/back/';
        $backup_path = $backup_folder . $backup_name;

        file_put_contents($backup_path, $content);
    }

    private function restore(Request $request)
    {
        $backup_path = $request->file('restore_file')->getRealPath();
        if ($backup_path) {
            $file_content = file_get_contents($backup_path);
            
            $mysqli = new \mysqli($this->mysqlHostName, $this->mysqlUserName, $this->mysqlPassword, $this->DbName);
            $mysqli->multi_query($file_content);
            do {
                if ($result = $mysqli->store_result()) {
                    $result->free();
                }
            } while ($mysqli->more_results() && $mysqli->next_result());
            $mysqli->close();
        }
    }

    private function drop()
    {
        $mysqli = new \mysqli($this->mysqlHostName, $this->mysqlUserName, $this->mysqlPassword);

        $sql_drop = "DROP DATABASE IF EXISTS $this->DbName";
        $mysqli->query($sql_drop);
        $mysqli->close();
    }

    private function create()
    {
        $mysqli = new \mysqli($this->mysqlHostName, $this->mysqlUserName, $this->mysqlPassword);

        $sql_create = "CREATE DATABASE $this->DbName";
        $mysqli->query($sql_create);
        $mysqli->close();
    }
}
