<?php
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        return app('url')->asset($path, $secure);
    }
}

if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        $asset = Cache::rememberForever('uploaded_asset_'.$id , function() use ($id) {
            return \App\Models\Upload::find($id);
        });

        if ($asset != null) {
            return $asset->external_link == null ? my_asset($asset->file_name) : $asset->external_link;
        }
        return static_asset('assets/frontend/img/placeholder.jpg');
    }
}

if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        // return app('url')->asset('public/' . $path, $secure);

        if(env('ENVIRONMENT') == "Production"){
            return app('url')->asset('public/' . $path, $secure);
        } else {
            return app('url')->asset($path, $secure);
        }

    }
}

if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}