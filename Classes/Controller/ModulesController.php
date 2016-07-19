<?php
namespace HSE\HeModules\Controller;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Page\PageRenderer;

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
 * ModulesController
 */
class ModulesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * modulesRepository
     *
     * @var \HSE\HeModules\Domain\Repository\ModulesRepository
     * @inject
     */
    protected $modulesRepository = NULL;

    /**
     *  initializeAction
     *
     *  add css file concerning to TypoScript settings
     *
     * @return void
     */
    public function initializeAction() {
        $extPath =  ExtensionManagementUtility::siteRelPath('he_modules');
        /** @var \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer */
        $pageRenderer = $this->objectManager->get(PageRenderer::class);
        $pageRenderer->addCssFile($extPath . 'Resources/Public/Css/he_modules.css');
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {

        $modulesStadtmitte = $this->modulesRepository->findModulesByCampus('Stadtmitte');
        $this->view->assign('modulesStadtmitte', $modulesStadtmitte);

        $modules = $this->modulesRepository->findAll();
        $this->view->assign('modules', $modules);
    }
    
    /**
     * action show
     *
     * @param \HSE\HeModules\Domain\Model\Modules $modules
     * @return void
     */
    public function showAction(\HSE\HeModules\Domain\Model\Modules $modules)
    {
        $this->view->assign('modules', $modules);
    }
    
    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     *
     * @param \HSE\HeModules\Domain\Model\Modules $newModules
     * @return void
     */
    public function createAction(\HSE\HeModules\Domain\Model\Modules $newModules)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->modulesRepository->add($newModules);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \HSE\HeModules\Domain\Model\Modules $modules
     * @ignorevalidation $modules
     * @return void
     */
    public function editAction(\HSE\HeModules\Domain\Model\Modules $modules)
    {
        $this->view->assign('modules', $modules);
    }
    
    /**
     * action update
     *
     * @param \HSE\HeModules\Domain\Model\Modules $modules
     * @return void
     */
    public function updateAction(\HSE\HeModules\Domain\Model\Modules $modules)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->modulesRepository->update($modules);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \HSE\HeModules\Domain\Model\Modules $modules
     * @return void
     */
    public function deleteAction(\HSE\HeModules\Domain\Model\Modules $modules)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->modulesRepository->remove($modules);
        $this->redirect('list');
    }

}