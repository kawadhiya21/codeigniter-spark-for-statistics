<?php

class Statistics
{
    function check_num($array){
        foreach($array as $ar){
            if(!is_numeric($ar)) return false;
        }
        return true;
    }

    function sample_mean($array){
        if($this->check_num($array)){
            $sum = 0;
            foreach ($array as $key => $value) {
                $sum += $value;
            }
            return ($sum/count($array));
        }
    }

    function sample_median($array){
        if($this->check_num($array)){
            $count = count($array);
            if($count%2 != 0){
                return $array[floor($count/2)];
            }
            else{
                $sum=0;
                $sum = ($array[($count/2) - 1] + $array[$count/2])/2;
                return $sum;
            }
        }    
    }

    function sample_range($array){
        if($this->check_num($array)){
            $max = max($array);
            $min = min($array);
            return ($max - $min);
        }    
    }

    function sample_variance($array){
        if($this->check_num($array)){
            $mean = $this->sample_mean($array);
            $sum = 0;
            foreach ($array as $key => $value) {
                $y = $value -$mean;
                $sum = $sum + pow($y, 2);
            }
            $temp = $sum/count($array);
            return $temp;
        }
    }

    function sample_standard_deviation($array){
        $temp = $this->sample_variance($array);
        return sqrt($temp);
    }

    function z_score($array, $element){
        $mean = $this->sample_mean($array);
        $dev = $this->sample_standard_deviation($array);
        return (($array[$element]-$mean)/$dev);
    }
}
