<?php

    if(isset($_POST["export_data"])) {
        $sql_query = "SELECT * FROM $table";
        $query = $dbh->prepare($sql_query);
        $query->execute();
        $developer_records = array();
        while( $results=$query->fetch(PDO::FETCH_ASSOC))
         {
            $developer_records[] = $results;
}
        $filename = $table.date('Ymd') . ".xls";			
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");	
        $show_coloumn = false;
        if(!empty($developer_records)) {
          foreach($developer_records as $record) {
            if(!$show_coloumn) {
              // display field/column names in first row
              echo implode("\t", array_keys($record)) . "\n";
              $show_coloumn = true;
            }
            echo implode("\t", array_values($record)) . "\n";
          }
        }
        exit;  
    }

    ?>