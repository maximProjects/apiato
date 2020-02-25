<?php

// Add your helper functions here...

function hoursMinutesFromSeconds($seconds, $format = '%02d:%02d')
{

    if (empty($seconds) || !is_numeric($seconds)) {
        return false;
    }

    $minutes = round($seconds / 60);
    $hours = floor($minutes / 60);
    $remainMinutes = ($minutes % 60);

    return sprintf($format, $hours, $remainMinutes);

}

function CalculateDistance(
    $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
    // convert from degrees to radians
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);
    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;
    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
    return $angle * $earthRadius;
}