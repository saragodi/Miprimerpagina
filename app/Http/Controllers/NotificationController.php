<?php

namespace App\Http\Controllers;

/* E-commerce Models */

use Config;
use Mail;

use Carbon\Carbon;

use Auth;
use Storage;
use Session;

use App\Models\User;
use App\Models\Order;
use App\Models\MailConfig;
use App\Models\MailTheme;
use App\Models\StoreConfig;
use App\Models\StoreTheme;
use App\Models\Notification;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
}
