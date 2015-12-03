<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Autocomplete_search
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Module
 * @author		anti
 * @link
 */

class Autocomplete_search {

  public $return_data;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->EE =& get_instance();
    $this->EE->load->add_package_path(PATH_THIRD.'autocomplete_search/');
    $this->EE->load->library('autocomplete_search_lib');
  }

  /**
   * Prepare for query
   * @return mixed Returns response
   */
  public function query()
  {
    $response = $this->EE->autocomplete_search_lib->query();
    // return file_get_contents('https://twitter.github.io/typeahead.js/data/films/post_1960.json');
    return $response;
  }

  /**
   * Split string & reunite it again
   * Used to create token list
   * @return string Constructed string
   */
  public function split()
  {
      $value = $this->EE->TMPL->fetch_param('value');
      $delimiter = $this->EE->TMPL->fetch_param('delimiter');
      $join = $this->EE->TMPL->fetch_param('join');
      return implode('"' . $join . '"', explode($delimiter, mb_ereg_replace("/[^ \w]+/", "", $value)));
  }
  /**
   * Decodes HTML ents & strips tags
   * @return string Cleaned string
   */
  public function clean()
  {
    $value = $this->EE->TMPL->tagdata;
    return strip_tags(html_entity_decode($this->EE->TMPL->tagdata));
  }

  /**
   * Start on your custom code here...
   */

}
/* End of file mod.freeform_unique_email.php */
/* Location: /system/expressionengine/third_party/freeform_unique_email/mod.freeform_unique_email.php */
