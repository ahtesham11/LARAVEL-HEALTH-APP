<?php
namespace App\Http\Controller;
use Illuminate\Support\Facades\Auth;


class userController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

?>