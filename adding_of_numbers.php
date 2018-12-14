<?php  
   $num1 = '9223372036854775807';
   $num2 = '18446744073709551615';
   
   function add($num1, $num2): string
   {  
        //echo ($num1 + $num2) . PHP_EOL;
        $numMore = (strlen($num1) > strlen($num2)) ? $num1 : $num2;
        $numLess = ($numMore == $num2) ? $num1 : $num2;
        $countSymbols = strlen($numMore);
        $numLess = str_pad($numLess, $countSymbols, '0', STR_PAD_LEFT);
        //echo $numMore . PHP_EOL . $numLess . PHP_EOL ;
        $result = '';
        $numInMind = 0;
        while ($countSymbols > 0) {
            if ( is_int($numMore[$countSymbols - 1]) || is_int($numLess[$countSymbols - 1]) ) {
                return 0;
            }
            $numByColumns = (int)$numMore[$countSymbols - 1] + (int)$numLess[$countSymbols - 1];
            $numByColumns = (string)($numByColumns + $numInMind);
            if ((int)$numByColumns > 9) {
                $numforWriting = (int)$numByColumns[1];
                $numInMind     = (int)$numByColumns[0];
            } else {
                $numInMind = 0;
                $numforWriting = (int)$numByColumns;
            }
            $result .= $numforWriting;
            $countSymbols--;
        }
        if ($numInMind > 0) {
            $result .= $numInMind;
        }
        return strrev($result);
   }
