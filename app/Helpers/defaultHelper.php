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

if (!function_exists('getYears')) {
    /**
     * Get an array of years from the specified start year to the end year.
     *
     * @param int $start The start year (default is 2020).
     * @param int $end The end year (default is 2050).
     * @return array An array containing the years from start to end (inclusive).
     */
    function getYears(int $start = 2020, int $end = 2050): array
    {
        // Ensure the start year is less than or equal to the end year
        if ($start > $end) {
            throw new InvalidArgumentException("Start year cannot be greater than end year.");
        }

        return range($start, $end);
    }
}

// if (!function_exists('frontend_asset')) {
//     function frontend_asset($id)
//     {
//         $asset = Cache::rememberForever('frontend_asset_'.$id , function() use ($id) {
//             return \App\Models\Upload::find($id);
//         });

//         if ($asset != null) {
//             return $asset->external_link == null ? my_asset($asset->file_name) : $asset->external_link;
//         }
//         return static_asset('assets/img/placeholder.jpg');
//     }
// }

if (!function_exists('central_asset')) {
    function central_asset($path)
    {
        return url($path);
    }
}

if (!function_exists('generateHtmlTableFromCsv')) {
    function generateHtmlTableFromCsv($csvFilePath) {
        $relativePath = str_replace(url('/storage'), 'storage', $csvFilePath);
        $csvFilePath = public_path($relativePath);

        if (!file_exists($csvFilePath) || !is_readable($csvFilePath)) {
            return '<p>Error: File not found or unreadable.</p>';
        }
        
        $file = fopen($csvFilePath, 'r');
        $headers = fgetcsv($file); // Read the first row as headers
        if (!$headers) {
            return '<p>Error: Empty CSV file.</p>';
        }
        
        $html = '<table class="table table-bordered table-hover">';
        $html .= '<thead class="thead-dark"><tr>';
        
        foreach ($headers as $index => $header) {
            $className = 'col_' . ($index + 1); // Dynamic class name
            $html .= "<th scope='col' class='$className text-center'>" . htmlspecialchars($header) . "</th>";
        }
        
        $html .= '</tr></thead><tbody>';
        
        while (($row = fgetcsv($file)) !== false) {
            $html .= '<tr>';
            foreach ($row as $index => $cell) {
                $className = 'col_' . ($index + 1);
                // Check if the cell contains a URL
                if (filter_var($cell, FILTER_VALIDATE_URL)) {
                    $cell = "<a href='" . htmlspecialchars($cell) . "' target='_blank' class='result_vm_btn'>View</a>";
                } else {
                    $cell = htmlspecialchars($cell);
                }
                $html .= "<td class='$className text-center'>$cell</td>";
            }
            $html .= '</tr>';
        }
        
        fclose($file);
        
        $html .= '</tbody></table>';
        
        return $html;
    }  
}

if (!function_exists('uploaded_asset_name')) {
    function uploaded_asset_name($id) {

        $asset = Cache::rememberForever('uploaded_asset_name_'.$id , function() use ($id) {
            return \App\Models\Upload::find($id);
        });

        $filename = 'Unknown';

        if ($asset != null) {
            $filename = $asset->file_original_name;
        }
                
        // Extract filename without extension
        $nameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
        
        // Replace underscores and hyphens with spaces
        $formattedName = str_replace(['_', '-'], ' ', $nameWithoutExt);
        
        // Convert multiple spaces to a single space and trim excess spaces
        $formattedName = preg_replace('/\s+/', ' ', trim($formattedName));
    
        // Capitalize each word
        return ucwords($formattedName);
    }
}


// if (!function_exists('get_setting')) {
//     function get_setting($metaKey, $default = null) {
//         $company = \App\Models\Company::with('meta')->where('id', config('custom.school_id'))->first();

//         if (!$company) {
//             return $default;
//         }

//         // First, check if the column exists in the companies table
//         if (isset($company->$metaKey)) {
//             return $company->$metaKey;
//         }

//         // Otherwise, check the meta table
//         return $company->meta->where('meta_key', $metaKey)->first()->meta_value ?? $default;
//     }
// }

if (!function_exists('get_setting')) {
    function get_setting($metaKey, $default = null) {
        return \Illuminate\Support\Facades\Cache::rememberForever("setting_" . config('custom.school_id') . "_{$metaKey}", function () use ($metaKey, $default) {
            $company = \App\Models\Company::with('meta')->where('id', config('custom.school_id'))->first();

            if (!$company) {
                return $default;
            }

            // First, check if the column exists in the companies table
            if (isset($company->$metaKey)) {
                return $company->$metaKey;
            }

            // Otherwise, check the meta table
            return $company->meta->where('meta_key', $metaKey)->first()->meta_value ?? $default;
        });
    }
}
