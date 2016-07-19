<?php

namespace HSE\HeModules\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \HSE\HeModules\Domain\Model\Modules.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ModulesTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \HSE\HeModules\Domain\Model\Modules
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \HSE\HeModules\Domain\Model\Modules();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAdditionalReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAdditional()
		);
	}

	/**
	 * @test
	 */
	public function setAdditionalForStringSetsAdditional()
	{
		$this->subject->setAdditional('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'additional',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForFileReferenceSetsDescription()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setDescription($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUrlReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUrl()
		);
	}

	/**
	 * @test
	 */
	public function setUrlForStringSetsUrl()
	{
		$this->subject->setUrl('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'url',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCreditsReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setCreditsForIntSetsCredits()
	{	}

	/**
	 * @test
	 */
	public function getLevelReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setLevelForIntSetsLevel()
	{	}

	/**
	 * @test
	 */
	public function getSemesterReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setSemesterForIntSetsSemester()
	{	}

	/**
	 * @test
	 */
	public function getStudyprogramReturnsInitialValueForStudyprograms()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getStudyprogram()
		);
	}

	/**
	 * @test
	 */
	public function setStudyprogramForObjectStorageContainingStudyprogramsSetsStudyprogram()
	{
		$studyprogram = new \HSE\HeModules\Domain\Model\Studyprograms();
		$objectStorageHoldingExactlyOneStudyprogram = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneStudyprogram->attach($studyprogram);
		$this->subject->setStudyprogram($objectStorageHoldingExactlyOneStudyprogram);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneStudyprogram,
			'studyprogram',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addStudyprogramToObjectStorageHoldingStudyprogram()
	{
		$studyprogram = new \HSE\HeModules\Domain\Model\Studyprograms();
		$studyprogramObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$studyprogramObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($studyprogram));
		$this->inject($this->subject, 'studyprogram', $studyprogramObjectStorageMock);

		$this->subject->addStudyprogram($studyprogram);
	}

	/**
	 * @test
	 */
	public function removeStudyprogramFromObjectStorageHoldingStudyprogram()
	{
		$studyprogram = new \HSE\HeModules\Domain\Model\Studyprograms();
		$studyprogramObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$studyprogramObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($studyprogram));
		$this->inject($this->subject, 'studyprogram', $studyprogramObjectStorageMock);

		$this->subject->removeStudyprogram($studyprogram);

	}

	/**
	 * @test
	 */
	public function getPersonReturnsInitialValueForFrontendUser()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPerson()
		);
	}

	/**
	 * @test
	 */
	public function setPersonForObjectStorageContainingFrontendUserSetsPerson()
	{
		$person = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUser();
		$objectStorageHoldingExactlyOnePerson = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePerson->attach($person);
		$this->subject->setPerson($objectStorageHoldingExactlyOnePerson);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePerson,
			'person',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPersonToObjectStorageHoldingPerson()
	{
		$person = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUser();
		$personObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$personObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($person));
		$this->inject($this->subject, 'person', $personObjectStorageMock);

		$this->subject->addPerson($person);
	}

	/**
	 * @test
	 */
	public function removePersonFromObjectStorageHoldingPerson()
	{
		$person = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUser();
		$personObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$personObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($person));
		$this->inject($this->subject, 'person', $personObjectStorageMock);

		$this->subject->removePerson($person);

	}
}
