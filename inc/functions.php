<?php

function isDeviceConnected($devices, $searchTerm) {
    foreach ($devices as $device) {
        if (!empty($device) && strpos($device, $searchTerm) !== false) {
            return true;
        }
    }
    return false;
}