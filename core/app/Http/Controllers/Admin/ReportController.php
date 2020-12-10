<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Report;

class ReportController extends Controller
{
    public function reports() {
      $data['reports'] = Report::latest()->paginate(9);
      return view('admin.reports', $data);
    }
}
