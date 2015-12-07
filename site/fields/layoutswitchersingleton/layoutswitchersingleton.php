<?php

/**
 * layout Switcher
 * Kirby layout Switcher Field for Kirby 2
 *
 * @version   1.0.0
 * @author    Christian Noss <c.noss@klickmeister.de>
 * @basedon:  Field Switcher from Jonas Döbertin <hello@jd-powered.net>
 * @license   GNU GPL v3.0 <http://opensource.org/licenses/GPL-3.0>
 */

class LayoutSwitcherSingletonField extends BaseField
{

    public function __toString() {
		$languages = c::get('languages');
		$lang = $currentLang = strtoupper(site()->language()->code());
		foreach($languages as $l) {
			if(isset($l['default']) && $l['default']) {
				$lang = strtoupper($l['code']);
			}
		}
		if($currentLang == $lang) {
			return parent::__toString();
		}

		return "";
	}

    /**
     * Base directory for language files
     *
     * @var string
     * @since 1.2.0
     */
    const LANG_DIR = 'languages';

    /**
     * Define frontend assets
     *
     * @var array
     * @since 1.0.0
     */
    public static $assets = array(
        'css' => array(
            'layoutswitchersingleton.css',
        ),
        'js' => array(
            'layoutswitchersingleton.js',
        ),
    );


    /**
     * Field setup
     *
     * (1) Load language files
     *
     * @since 1.2.0
     *
     * @return \SelectorField
     */
    public function __construct()
    {

        /*
            (1) Load language files
         */
        $baseDir = __DIR__ . DS . self::LANG_DIR . DS;
        $lang    = panel()->language();
        if (file_exists($baseDir . $lang . '.php')) {
            require $baseDir . $lang . '.php';
        } else {
            require $baseDir . 'en.php';
        }
    }


    /**
     * Generate label markup
     *
     * @since 1.0.0
     *
     * @return string
     */
    public function label()
    {

        /* Label */
        $label = parent::label();

        /**
         * Fields don't have to have a label assigned.
         * With this, we deal with missing label information.
         *
         * @since 1.3.0
         */
        if (!is_null($label)) {
            $label->addClass('figure-label');
            //$label->append($action);

            return $label;
        }

        return;
    }

    /**
     * Generate field content markup
     *
     * @since 1.0.0
     *
     * @return string
     */
    public function content()
    {

        /* Zusätzliche Textspalten */
        $additional_columns = yaml($this->page()->columns());
        $additional_columns = reset($additional_columns);

        /* Bildbeschnitt, falls vorhanden */
        $image_crop = ($this->page()->image_crop() != "") ? $this->page()->image_crop() : "";


        $wrapper = new Brick('div');
        $wrapper->addClass('layoutswitcher');
        $wrapper->data(array(
            'field'      => 'layoutswitcher',
            'name'       => $this->name(),
            'page'       => $this->page(),
        ));

        $wrapper->html(tpl::load(__DIR__ . DS . 'template.php', array(
            'field' => $this,
            'text1'      => $this->page()->text(),
            'text2'      => $additional_columns["text2"],
            'text3'      => $additional_columns["text3"],
            'noc'        => intval($additional_columns["noc"]),
            'crop'       => $image_crop,
            'page_tpl'   => $this->page()->intendedTemplate()
        )));

        return $wrapper;
    }

    /**
     * Return the current value
     *
     * @since 1.0.0
     *
     * @return array
     */


    public function items()
    {
        $ret = array();
        if(is_string($this->value)) {
            $this->value = yaml::decode($this->value);

            if(isset($this->value[0])){
                foreach($this->value[0] as $key=>$value){ $ret[$key] = $value; }
            }

        }
        return $ret;
    }

    public function result() {
        $result = parent::result();
        $raw    = (array)json_decode($result);
        $data   = array();
        foreach($raw as $key => $row) {
          unset($row->_id);
          unset($row->_csfr);
          $data[$key] = (array)$row;
        }
        return yaml::encode($data);
    }

    public $fields = array();
    public $entry  = null;

    public function fields() {

        $output = array();
        foreach($this->fields as $k => $v) {
          $v['name']  = $k;
          $v['value'] = '{{' . $k . '}}';
          $output[] = $v;
        }

        return $output;

    }

    public function entry() {

        if(is_null($this->entry) or !is_string($this->entry)) {

        $html = array();
        foreach($this->fields as $name => $field) {
            echo $name;
            $html[] = '{{' . $name . '}}';
        }
            return "Test" . implode('<br>', $html);
        } else {
            return $this->entry . "bolle";
        }
    }


    /**
     * Get files based on types option
     *
     * @since 1.0.0
     *
     * @return \Files
     */
    public function files()
    {
        /**
         * FIX: When used in site options, we don't have a `$this->page`
         * property we can use to access the pages files.
         *
         * (1) If we have page property, we'll use that to fetch the files.
         * (2) If we don't have a page property we're on the site options page.
         *     (2.1) If we're using Kirby 2.1+ we can use the new `site()->files()`
         *           method to get access to the new global site files to use them.
         *     (2.2) If we are using a lower version, global site files don't
         *           exist. We'll return an empty collection object instead.
         *
         * @since 1.3.0
         */
        if (!is_null($this->page)) {/* (1) */
            $files = $this->page->files(); /* (1) */
        } else {/* (2) */
            if (version_compare(Kirby::version(), '2.1', '>=')) {/* (2.1) */
                $files = site()->files(); /* (2.1) */
            } else {
                return new Collection(); /* (2.2) */
            }
        }

        return $files;
    }

}
