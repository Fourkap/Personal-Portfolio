<?php
/**
 * Class HomeController
 * php version 7.2.10
 *
 * @category App\Http\Controllers
 * @package  App\Http\Controllers
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 */

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

/**
 * Class HomeController
 *
 * @category App\Http\Controllers
 * @package  App\Http\Controllers
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 */
class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $portfolio = new Portfolio();

        return view('home', compact('portfolio'));
    }
}
