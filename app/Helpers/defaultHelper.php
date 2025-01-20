<?php

use App\Models\Company;

if (!function_exists('truncate_text')) {
    /**
     * Truncate a string to a specified length and append a suffix if needed.
     *
     * @param string $text
     * @param int $length
     * @param string $suffix
     * @return string
     */
    function truncateText($text, int $length = 15, string $suffix = '...'): string
    {
        if ($text === null || empty($text)) {
            return '';
        }    
        return \Illuminate\Support\Str::limit($text, $length, $suffix);
    }
}

if (!function_exists('convertToSlug')) {
    /**
     * Convert text to a slug format.
     *
     * @param  string  $text
     * @return string
     */
    function convertToSlug(string $text): string
    {
        if (empty($text)) {
            return '';
        }
        
        return \Illuminate\Support\Str::slug($text);
    }
}


if (!function_exists('getCompanyList')) {
    function getCompanyList()
    {
        return auth()->user()->company_id
            ? Company::where('id', auth()->user()->company_id)->get()
            : Company::all();
    }
}

if (! function_exists('formatDate')) {
    /**
     * Format date to dd/mm/yyyy.
     *
     * @param  string  $date
     * @return string
     */
    function formatDate($date)
    {
        // Check if the date is not null or empty
        if ($date) {
            return \Carbon\Carbon::parse($date)->format('d/m/Y');
        }
        return null; // Return null if no date is provided
    }
}

if (! function_exists('formatDatetime')) {
    /**
     * Format date and time to dd/mm/yyyy h:i A (AM/PM).
     *
     * @param  string  $date
     * @return string|null
     */
    function formatDatetime($date)
    {
        // Check if the date is not null or empty
        if ($date) {
            return \Carbon\Carbon::parse($date)->format('d/m/Y h:i A');
        }
        return null; // Return null if no date is provided
    }
}


if (! function_exists('jsonDecodeAndPrint')) {
    /**
     * Decode a JSON string and return its values as a string.
     *
     * @param  string  $json
     * @param  string  $separator  The separator between items when printing (default is a comma)
     * @return string
     */
    function jsonDecodeAndPrint($json, $separator = ', ')
    {
        // Decode the JSON string into an array
        $decoded = json_decode($json, true);

        // Check for JSON errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            return "";  // Return error message if decoding fails
        }

        // Return the values as a string with the given separator
        return implode($separator, $decoded);
    }
}

if (!function_exists('currentUser')) {
    /**
     * Get the currently authenticated user.
     *
     * @return \App\Models\User|null
     */
    function currentUser()
    {
        return \App\Models\User::find(Auth::id());
    }
}