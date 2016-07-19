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
 * Test case for class \HSE\HeModules\Domain\Model\Studyprograms.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class StudyprogramsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \HSE\HeModules\Domain\Model\Studyprograms
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \HSE\HeModules\Domain\Model\Studyprograms();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getCourseReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getCourse()
		);
	}

	/**
	 * @test
	 */
	public function setCourseForBoolSetsCourse()
	{
		$this->subject->setCourse(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'course',
			$this->subject
		);
	}
}
