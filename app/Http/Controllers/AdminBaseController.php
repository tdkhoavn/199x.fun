<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Butschster\Head\Facades\Meta;

class AdminBaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Meta::includePackages(['favicons', 'admin_css']);
    }
}
