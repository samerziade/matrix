<?php

namespace Matrix\Element;

class CoordinatesHaversine implements ElementInterface {

    private $lat;
    private $lng;

    public function __construct(array $value) {

        if (!is_array($value) || count($value) !== 2 || !$this->validateCoordinates($value)) {
            throw new \InvalidArgumentException('Value passed to Coordinates must be an array with latitude and longitude');
        }

        $this->lat = $value[0];
        $this->lng = $value[1];
    }

    private function validateCoordinates(array $data): bool {
        $lat = $data[0];
        $lng = $data[1];

        return is_numeric($lat) && $lat >= -90 && $lat <= 90
            && is_numeric($lng) && $lng >= -180 && $lng <= 180;
    }

    public function calculate(ElementInterface $element): float {
        $aLat = $this->lat;
        $aLng = $this->lng;
        $bLat = $element->lat;
        $bLng = $element->lng;

        $dLat = deg2rad($bLat - $aLat);
        $dLng = deg2rad($bLng - $aLng);
        $lat1 = deg2rad($aLat);
        $lat2 = deg2rad($bLat);

        $a = sin($dLat / 2) * sin($dLat / 2) + sin($dLng / 2) * sin($dLng / 2) * cos($lat1) * cos($lat2);
        $d = 6378137 * (2 * atan2(sqrt($a), sqrt(1 - $a)));

        return round($d, 0);
    }

}
