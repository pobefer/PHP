<?php
class InformeTecnicas{
    function a($arrayOfObjects,$searchedValue){
        $neededObject = array_filter(
            $arrayOfObjects,
            function ($e) use ($searchedValue) {
                return $e->id == $searchedValue;
            }
        );
    }
}
