<?php

/**
 * sfDoctrinePagerLayout
 *
 * @author      Piero Recchia <piero.recchia@gmail.com>
 * @package     Doctrine
 * @subpackage  Pager_Layout
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 */
class sfDoctrinePagerLayout extends Doctrine_Pager_Layout {

    /**
     *
     * @param  Doctrine_Pager $pager     Doctrine_Pager object related to the pager layout
     * @param  Doctrine_Pager_Range $pagerRange     Doctrine_Pager_Range object related to the pager layout
     * @param  string $urlMask     URL to be assigned for each page
     * @return  void
     */
    public function __construct($pager, $pagerRange, $urlMask) {
        sfProjectConfiguration::getActive()->loadHelpers(array('Url', 'Tag', 'Asset'));
        parent::__construct($pager, $pagerRange, $urlMask);
    }

    protected function _parseTemplate($options = array()) {
        $str = parent::_parseTemplate($options);
        return preg_replace('/\{link_to\}(.*?)\{\/link_to\}/', link_to('$1', $this->_parseUrl($options)), $str);
    }

    public function display($options = array(), $return = false) {
        $pager = $this->getPager();
        $str = '';
        $this->addMaskReplacement('page', '<<', true);
        $options['page_number'] = $pager->getFirstPage();
        $str .= $this->processPage($options);
        $this->addMaskReplacement('page', '<', true);
        $options['page_number'] = $pager->getPreviousPage();
        $str .= $this->processPage($options);
        $this->removeMaskReplacement('page');
        $str .= parent::display($options, true);
        $this->addMaskReplacement('page', '>', true);
        $options['page_number'] = $pager->getNextPage();
        $str .= $this->processPage($options);
        $this->addMaskReplacement('page', '>>', true);
        $options['page_number'] = $pager->getLastPage();
        $str .= $this->processPage($options);

        if ($return) {
            return $str;
        }

        echo $str;
    }

}

?>