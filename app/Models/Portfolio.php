<?php
/**
 * Class Portfolio
 * php version 7.2.10
 *
 * @category App\Models
 * @package  App\Models
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 */

namespace App\Models;

use App\Diploma;
use App\Project;
use App\User;
use App\Skill;

/**
 * Class Portfolio
 *
 * @category App\Models
 * @package  App\Models
 * @author   Tao BERQUER <tao.berquer@gmail.com>
 * @author   Alexandre Kaprielian <alex.kaprielian@gmail.com>
 * @license  https://github.com/taoberquer/Portfolio/blob/develop/LICENSE GNU Public License
 * @link     https://github.com/taoberquer/Portfolio
 */
class Portfolio
{
    /**
     * Retourne le premier utilisateur en type User
     *
     * @return mixed
     */
    public function getUser()
    {
        return User::all()->first();
    }

    /**
     * Retourne tout les projets
     *
     * @return Project[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getProjects()
    {
        return Project::all()->sortByDesc('started_at');
    }

    /**
     * Retourne toutes les compétences
     *
     * @return Skill[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getHomeSkills()
    {
        return Skill::all()->sortByDesc('name');
    }

    /**
     * Retourne toutes les experiences
     *
     * @return Diploma[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getExperiences()
    {
        return Diploma::all()->sortByDesc('started_at');
    }
}
