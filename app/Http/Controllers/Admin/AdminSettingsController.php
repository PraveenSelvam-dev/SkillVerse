<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $settings = (object)['site_name' => 'SkillVerse', 'contact_email' => 'contact@skillverse.com'];
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
