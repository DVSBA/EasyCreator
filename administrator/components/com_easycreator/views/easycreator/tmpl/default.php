<?php
/**
 * @version SVN: $Id$
 * @package    EasyCreator
 * @subpackage Views
 * @author     Nikolai Plath {@link http://www.nik-it.de}
 * @author     Created on 03-Mar-2008
 * @license    GNU/GPL, see JROOT/LICENSE.php
 */

//-- No direct access
defined('_JEXEC') || die('=;)');

if( ! JComponentHelper::getParams('com_easycreator')->get('cred_author')) :
    //-- Parameters have not been set
    $link = '<a href="index.php?option=com_easycreator&controller=config">'.jgettext('Configuration settings').'</a>';
    JError::raiseNotice(100, sprintf(jgettext('Please set your personal information in %s'), $link));
endif;
?>

<div style="background-color: #fff; width: 222px; position: absolute; right: 3em;">
    <?php echo ecrHTML::boxStart(); ?>
        <div class="ecr_button img icon-16-easy-joomla" onclick="ecrInfoBox.toggle();">
        	<?php echo jgettext('EasyCreator Information'); ?>
        </div>
        <div id="ecrInfoBox" style="background-color: #ccc;">
            <?php echo $this->loadTemplate('ecrbox'); ?>
        </div>
    <?php echo ecrHTML::boxEnd(); ?>
</div>

<?php
if(JComponentHelper::getParams('com_easycreator')->get('versionCheck')) :
    if(JFactory::getSession()->get('ecr_versionCheck')) :
        //-- Do smthng ?
    else :
        echo '<div id="ecr_versionCheck">';
        JFactory::getDocument()->addScriptDeclaration("window.addEvent('domready', function() { checkVersion(); });");
        echo '</div>';
        JFactory::getSession()->set('ecr_versionCheck', 'checked');
    endif;
else:
    echo jgettext('Version check is disabled');
endif;
?>

<h1 style="text-align: center;">What do you want to Create today ¿<br /><tt>=;)</tt></h1>

<div class="ecr_floatbox" style="width: 48.5%">
<?php echo ecrHTML::boxStart(); ?>
    <?php echo $this->loadTemplate('projectlist'); ?>
<?php echo ecrHTML::boxEnd(); ?>
</div>
<div class="ecr_floatbox" style="width: 49%">

<?php echo ecrHTML::boxStart(); ?>
    <?php $this->addTemplatePath(JPATH_COMPONENT.DS.'views'.DS.'register'.DS.'tmpl'); ?>
    <?php echo $this->loadTemplate('unregistered'); ?>
<?php echo ecrHTML::boxEnd(); ?>
</div>

<div style="clear: both;"></div>