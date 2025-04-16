<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $module;

    public function __construct()
    {
        //Module Name
        $this->module = 'menu';
        view()->share('module', $this->module);
    }    

    public function index()
    {
        $menus = Menu::orderBy('order')->get()->toArray();
        return view('backend.menu.index', compact('menus'));
    }

    public function store(Request $request)
    {
        $menu = Menu::updateOrCreate(
            ['id' => $request->id],
            [
                'title' => $request->title,
                'url' => $request->url,              
                'parent_id' => $request->parent_id ?? null,
                'order' => $request->order ?? 0,
                'target' => $request->target ?? '_self',
                'icon' => $request->icon ?? null,                  
            ]
        );
        return redirect()->route($this->module.'.index')->with('success', 'Record created successfully!');
    }

    public function updateOrder(Request $request)
    {
        $this->saveOrder($request->input('menu'), null);
        return response()->json(['success' => true]);
    }

    private function saveOrder($items, $parentId)
    {
        foreach ($items as $index => $item) {
            Menu::where('id', $item['id'])->update([
                'order' => $index,
                'parent_id' => $parentId
            ]);
            if (isset($item['children'])) {
                $this->saveOrder($item['children'], $item['id']);
            }
        }
    }

    public function destroy($id)
    {
        Menu::where('id', $id)->delete();
        return response()->json(['success' => true]);
    }
}
