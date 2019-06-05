<?php
/**
 * Class Picture
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
 * Class Picture
 *
 * @category App
 * @package  App
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 */
class Picture extends Model
{
    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = ['path'];

    /**
     * On désactive l'utilisateur des attributs `created_at` et `updated_at`
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retourne l'id de l'image en int
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Retourne le chemin de l'image en string
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
}
