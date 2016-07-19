<?php
namespace HSE\HeModules\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
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
 * Test case for class HSE\HeModules\Controller\ModulesController.
 *
 */
class ModulesControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \HSE\HeModules\Controller\ModulesController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('HSE\\HeModules\\Controller\\ModulesController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllModulessFromRepositoryAndAssignsThemToView()
	{

		$allModuless = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$modulesRepository = $this->getMock('HSE\\HeModules\\Domain\\Repository\\ModulesRepository', array('findAll'), array(), '', FALSE);
		$modulesRepository->expects($this->once())->method('findAll')->will($this->returnValue($allModuless));
		$this->inject($this->subject, 'modulesRepository', $modulesRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('moduless', $allModuless);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenModulesToView()
	{
		$modules = new \HSE\HeModules\Domain\Model\Modules();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('modules', $modules);

		$this->subject->showAction($modules);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenModulesToModulesRepository()
	{
		$modules = new \HSE\HeModules\Domain\Model\Modules();

		$modulesRepository = $this->getMock('HSE\\HeModules\\Domain\\Repository\\ModulesRepository', array('add'), array(), '', FALSE);
		$modulesRepository->expects($this->once())->method('add')->with($modules);
		$this->inject($this->subject, 'modulesRepository', $modulesRepository);

		$this->subject->createAction($modules);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenModulesToView()
	{
		$modules = new \HSE\HeModules\Domain\Model\Modules();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('modules', $modules);

		$this->subject->editAction($modules);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenModulesInModulesRepository()
	{
		$modules = new \HSE\HeModules\Domain\Model\Modules();

		$modulesRepository = $this->getMock('HSE\\HeModules\\Domain\\Repository\\ModulesRepository', array('update'), array(), '', FALSE);
		$modulesRepository->expects($this->once())->method('update')->with($modules);
		$this->inject($this->subject, 'modulesRepository', $modulesRepository);

		$this->subject->updateAction($modules);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenModulesFromModulesRepository()
	{
		$modules = new \HSE\HeModules\Domain\Model\Modules();

		$modulesRepository = $this->getMock('HSE\\HeModules\\Domain\\Repository\\ModulesRepository', array('remove'), array(), '', FALSE);
		$modulesRepository->expects($this->once())->method('remove')->with($modules);
		$this->inject($this->subject, 'modulesRepository', $modulesRepository);

		$this->subject->deleteAction($modules);
	}
}
