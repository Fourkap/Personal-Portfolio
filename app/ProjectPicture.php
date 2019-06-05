<?php
/**
 * Class ProjectPicture
 * php version 7.2.10
 *
 * @category App
 * @package  App
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectPicture
 *
 * @category App
 * @package  App
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 */
class ProjectPicture extends Model
{
    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'picture_id',
    ];
    /**
     * On désactive l'utilisateur des attributs `created_at` et `updated_at`
     *
     * @var bool
     */
    public $timestamps = false;

    public function getPicture()
    {
        return $this->belongsTo('App\Picture', 'picture_id');
    }
}
