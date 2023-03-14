<?php

namespace App\Traits;

trait UserColorTrait {

    public function chooseUserColor(): string {
        
        $availableColors = [
            '#c4e5c9', // PISTACHIO GREEN
            '#f8cce0', // BABY PINK
            '#d1e5f8', // BABY BLUE
            '#8af0ce', // MAGIC MINT 
            '#eff57c', // PASTEL YELLOW
            '#f8b184', // PEACH
            '#c8c3f8', // LAVENDER
        ];

        return $availableColors[rand(0, (count($availableColors) - 1))];

    }

}
