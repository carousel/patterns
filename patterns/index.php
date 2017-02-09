<?php
    class Cell {}
    
        class CellFactory {
            
            public function makeCell()
            {
                $cell = clone new Cell;
                return $cell;
            }
        }
        $factory1 = new CellFactory;
        $factory2 = new CellFactory;
        $cell1 = $factory1->makeCell();
        $cell2 = $factory2->makeCell();
        echo $cell1 == $cell2;
    

