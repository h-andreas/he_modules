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
 * English modules
 */
class Modules extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Title of the module
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';
    
    /**
     * Additional information of the module
     *
     * @var string
     */
    protected $additional = '';
    
    /**
     * pdf file with module description
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $description = null;
    
    /**
     * URL of the module description to the view in the portal
     *
     * @var string
     */
    protected $url = '';
    
    /**
     * Number of the ECTS credits
     *
     * @var int
     * @validate NotEmpty
     */
    protected $credits = 0;
    
    /**
     * Level of the course
     *
     * @var int
     * @validate NotEmpty
     */
    protected $level = 0;
    
    /**
     * Semester of the course when it takes place
     *
     * @var int
     * @validate NotEmpty
     */
    protected $semester = 0;
    
    /**
     * Relation to one or more study programs
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HSE\HeModules\Domain\Model\Studyprograms>
     * @cascade remove
     */
    protected $studyprogram = null;
    
    /**
     * Person in charge of the module
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser>
     * @cascade remove
     */
    protected $person = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->studyprogram = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->person = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the additional
     *
     * @return string $additional
     */
    public function getAdditional()
    {
        return $this->additional;
    }
    
    /**
     * Sets the additional
     *
     * @param string $additional
     * @return void
     */
    public function setAdditional($additional)
    {
        $this->additional = $additional;
    }
    
    /**
     * Returns the description
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $description
     * @return void
     */
    public function setDescription(\TYPO3\CMS\Extbase\Domain\Model\FileReference $description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * Sets the url
     *
     * @param string $url
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
    
    /**
     * Returns the credits
     *
     * @return int $credits
     */
    public function getCredits()
    {
        return $this->credits;
    }
    
    /**
     * Sets the credits
     *
     * @param int $credits
     * @return void
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    }
    
    /**
     * Returns the level
     *
     * @return int $level
     */
    public function getLevel()
    {
        return $this->level;
    }
    
    /**
     * Sets the level
     *
     * @param int $level
     * @return void
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }
    
    /**
     * Returns the semester
     *
     * @return int $semester
     */
    public function getSemester()
    {
        return $this->semester;
    }
    
    /**
     * Sets the semester
     *
     * @param int $semester
     * @return void
     */
    public function setSemester($semester)
    {
        $this->semester = $semester;
    }
    
    /**
     * Adds a Studyprograms
     *
     * @param \HSE\HeModules\Domain\Model\Studyprograms $studyprogram
     * @return void
     */
    public function addStudyprogram(\HSE\HeModules\Domain\Model\Studyprograms $studyprogram)
    {
        $this->studyprogram->attach($studyprogram);
    }
    
    /**
     * Removes a Studyprograms
     *
     * @param \HSE\HeModules\Domain\Model\Studyprograms $studyprogramToRemove The Studyprograms to be removed
     * @return void
     */
    public function removeStudyprogram(\HSE\HeModules\Domain\Model\Studyprograms $studyprogramToRemove)
    {
        $this->studyprogram->detach($studyprogramToRemove);
    }
    
    /**
     * Returns the studyprogram
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HSE\HeModules\Domain\Model\Studyprograms> $studyprogram
     */
    public function getStudyprogram()
    {
        return $this->studyprogram;
    }
    
    /**
     * Sets the studyprogram
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HSE\HeModules\Domain\Model\Studyprograms> $studyprogram
     * @return void
     */
    public function setStudyprogram(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $studyprogram)
    {
        $this->studyprogram = $studyprogram;
    }
    
    /**
     * Adds a FrontendUser
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $person
     * @return void
     */
    public function addPerson(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $person)
    {
        $this->person->attach($person);
    }
    
    /**
     * Removes a FrontendUser
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $personToRemove The FrontendUser to be removed
     * @return void
     */
    public function removePerson(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $personToRemove)
    {
        $this->person->detach($personToRemove);
    }
    
    /**
     * Returns the person
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser> $person
     */
    public function getPerson()
    {
        return $this->person;
    }
    
    /**
     * Sets the person
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser> $person
     * @return void
     */
    public function setPerson(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $person)
    {
        $this->person = $person;
    }

}