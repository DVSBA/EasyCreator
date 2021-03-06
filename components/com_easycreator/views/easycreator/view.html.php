<?php defined('_JEXEC') || die('=;)');
/**
 * @package    EasyCreator
 * @subpackage Frontent
 * @author     Nikolai Plath (elkuku)
 * @author     Created on 24-Sep-2008
 */

jimport('joomla.application.component.view');

/**
 * HTML View class for the EasyCreator Component.
 *
 * @package    EasyCreator
 * @subpackage Frontent
 */
class EasyCreatorViewEasyCreator extends JView
{
    /**
     * Execute and display a template script.
     *
     * @param string $tpl The name of the template file to parse.
     *
     * @return mixed|void
     */
    public function display($tpl = null)
    {
        //--get vars from request
        $selectedProject = JRequest::getVar('ebc_project', '');

        if($selectedProject)
        {
            echo '<strong>'.$selectedProject.'</strong><hr />';
            $prefix = substr($selectedProject, 0, 3);

            switch($prefix)
            {
                case 'com':
                    $this->setLayout('component');
                    break;

                case 'mod':
                    $this->setLayout('module');
                    break;

                default:
                    echo '<h3 style="color: blue;">not yet...</h3>';
                    echo 'render: '.$selectedProject;
                    break;
            }
        }

        $this->assignRef('selectedProject', $selectedProject);

        parent::display($tpl);
    }
}
