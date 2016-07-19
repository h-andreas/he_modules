<?php
namespace HSE\HeModules\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Corresponding study program
 */
class Studyprograms extends \HSE\HeTools\Domain\Model\Studyprograms
{

    /**
     * course
     *
     * @var bool
     */
    protected $course = false;
    
    /**
     * Returns the course
     *
     * @return bool $course
     */
    public function getCourse()
    {
        return $this->course;
    }
    
    /**
     * Sets the course
     *
     * @param bool $course
     * @return void
     */
    public function setCourse($course)
    {
        $this->course = $course;
    }
    
    /**
     * Returns the boolean state of course
     *
     * @return bool
     */
    public function isCourse()
    {
        return $this->course;
    }

}