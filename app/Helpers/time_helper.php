<?php

/*************  ✨ Codeium Command ⭐  *************/
/**
 * Returns a string describing how long ago the given $datetime was.
 * The output will be in the format "X time-units ago", where X is a number
 * and time-units is one of "seconds", "minutes", "hours", "days", "weeks",
 * "months", or "years". If $datetime is within the last minute, the
 * function will return "Just Now".
 *
 * @param string $datetime A string in any format that can be parsed by
/******  b6803452-2358-4945-8dfa-a24ce2b55bd2  *******/
function time_ago($datetime)
{
    $timestamp = strtotime($datetime);
    $time_ago = time() - $timestamp;
    $seconds = $time_ago;
    $minutes      = round($seconds / 60);           // value 60 is seconds
    $hours        = round($seconds / 3600);         // value 3600 is 60 minutes * 60 sec
    $days         = round($seconds / 86400);        // value 86400 is 24 hours * 60 minutes * 60 sec
    $weeks        = round($seconds / 604800);       // value 604800 is 7 days * 24 hours * 60 minutes * 60 sec
    $months       = round($seconds / 2629440);      // value 2629440 is ((365+365+365+365+365)/5/12) days * 24 hours * 60 minutes * 60 sec
    $years        = round($seconds / 31553280);     // value 31553280 is 365.25 days * 24 hours * 60 minutes * 60 sec

    if ($seconds <= 60) {
        return "Just Now";
    } else if ($minutes <= 60) {
        return "$minutes minutes ago";
    } else if ($hours <= 24) {
        return "$hours hours ago";
    } else if ($days <= 7) {
        return "$days days ago";
    } else if ($weeks <= 4.3) { // 4.3 == 30/7
        return "$weeks weeks ago";
    } else if ($months <= 12) {
        return "$months months ago";
    } else {
        return "$years years ago";
    }
}
