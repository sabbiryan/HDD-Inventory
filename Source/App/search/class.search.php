<?php

class Search {

    public function searchQuery($conn, $sql){

        //echo $sql;
        $query = mysqli_query($conn, $sql);

        //echo mysqli_num_rows($query);
        $searchResult[][] = '';
        if(mysqli_num_rows($query) > 0 ){
            $i = 0;
            while($result = mysqli_fetch_array($query)){
                //echo "<pre/>";
                //print_r($result);
                $searchResult[$i] = $result;
                $i++;
            }
            return $searchResult;
        }
        else
            return $result = 0;
    }



}


?>