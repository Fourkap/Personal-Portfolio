<?php
/**
 * Class skill
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
 * Class Skill
 *
 * @category App
 * @package  App
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 */
class Skill extends Model
{
    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * On désactive l'utilisateur des attributs `created_at` et `updated_at`
     * pour ce model
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retourne l'id de la compétence en type int
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Retourne le nom de la compétence en type string
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
