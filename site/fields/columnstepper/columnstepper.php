<?php

/**
 * Column Stepper
 * Kirby Column Stepper Field for Kirby 2
 *
 * @version   1.0.0
 * @author    Christian Noss <c.noss@klickmeister.de>
 * @basedon:  Field Switcher from Jonas Döbertin <hello@jd-powered.net>
 * @license   GNU GPL v3.0 <http://opensource.org/licenses/GPL-3.0>
 */

class ColumnStepperField extends BaseField
{


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
            'selector.css',
        ),
        'js' => array(
            'columnstepper.js',
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
        /* Action button */
        /*$action = new Brick('a');
        $action->addClass('file-add-button label-option');
        $action->html('<i class="icon icon-left fa fa-plus-circle"></i>' . l::get('bild-zufuegen'));
        $action->attr('href', purl($this->page(), 'upload'));*/

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


        $wrapper = new Brick('div');
        $wrapper->addClass('columnstepper');
        $wrapper->data(array(
            'field'      => 'columnstepper',
            'name'       => $this->name(),
            'page'       => $this->page()
        ));

        $wrapper->html(tpl::load(__DIR__ . DS . 'template.php', array('field' => $this)));

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



}
