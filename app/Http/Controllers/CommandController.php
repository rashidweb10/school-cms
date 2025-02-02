<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class CommandController extends Controller
{
    private function checkAccess()
    {
        // if (request('key') !== env('APP_SECRET_KEY')) {
        //     abort(403, 'Unauthorized');
        // }
    }

    public function cacheClear()
    {
        $this->checkAccess();
        Artisan::call('cache:clear');
        return "✅ Cache cleared!";
    }

    public function configClear()
    {
        $this->checkAccess();
        Artisan::call('config:clear');
        return "✅ Config cache cleared!";
    }

    public function configCache()
    {
        $this->checkAccess();
        Artisan::call('config:cache');
        return "✅ Config cache stored!";
    }

    public function routeCache()
    {
        $this->checkAccess();
        Artisan::call('route:cache');
        return "✅ Routes cached!";
    }

    public function routeClear()
    {
        $this->checkAccess();
        Artisan::call('route:clear');
        return "✅ Route cache cleared!";
    }

    public function viewClear()
    {
        $this->checkAccess();
        Artisan::call('view:clear');
        return "✅ View cache cleared!";
    }

    public function viewCache()
    {
        $this->checkAccess();
        Artisan::call('view:cache');
        return "✅ View cache stored!";
    }

    // public function migrate()
    // {
    //     $this->checkAccess();
    //     Artisan::call('migrate', ['--force' => true]);
    //     return "✅ Database migrated!";
    // }

    public function storageLink()
    {
        $this->checkAccess();
        Artisan::call('storage:link');
        return "✅ Storage linked!";
    }
}