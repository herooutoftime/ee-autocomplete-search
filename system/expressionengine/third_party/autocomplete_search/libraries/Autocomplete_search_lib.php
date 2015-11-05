<?php
/**
 * Created by PhpStorm.
 * User: hoot
 * Date: 05/08/15
 * Time: 18:32
 */

class Autocomplete_search_lib {

  public $EE;

  public function __construct()
  {
    $this->EE =& get_instance();
    $this->EE->lang->loadfile('autocomplete_search');
  }

  /**
   * Prepare arguments for query
   * @return [type] [description]
   */
  public function query()
  {
    //   var_dump($this->EE->input->get('query'));
    $_GET['keywords'] = $this->EE->input->get('keywords');
    $_GET['meta'] = $this->build_meta_array();
    $_POST = $_GET;

    // return array('test' => true);
  }

  /**
   * Build meta array for search method
   * @return string Base64 encoded array
   */
  public function build_meta_array() {
      $meta = array(
          'status'				=> $this->EE->TMPL->fetch_param('status', ''),
          'channel'				=> $this->EE->TMPL->fetch_param('channel', ''),
          'category'			=> $this->EE->TMPL->fetch_param('category', ''),
          'search_in'			=> $this->EE->TMPL->fetch_param('search_in', ''),
          'where'				=> $this->EE->TMPL->fetch_param('where', ''),
          'show_expired'		=> $this->EE->TMPL->fetch_param('show_expired', ''),
          'show_future_entries'	=> $this->EE->TMPL->fetch_param('show_future_entries'),
          'result_page'			=> $this->EE->TMPL->fetch_param('result_page', 'search/results'),
          'no_results_page'		=> $this->EE->TMPL->fetch_param('no_result_page', '')
      );

      $meta = serialize($meta);

      if ( function_exists('mcrypt_encrypt') )
      {
          $init_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
          $init_vect = mcrypt_create_iv($init_size, MCRYPT_RAND);

          $meta = mcrypt_encrypt(
              MCRYPT_RIJNDAEL_256,
              md5($this->EE->db->username.$this->EE->db->password),
              $meta,
              MCRYPT_MODE_ECB,
              $init_vect
          );
      }
      else
      {
          $meta = $meta.md5($this->EE->db->username.$this->EE->db->password.$meta);
      }

      return base64_encode($meta);
  }

}
