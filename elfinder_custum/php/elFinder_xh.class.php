<?php
/**
 * elFinder_xh - Extends of Core class.elFinder
 * 
 *  Add 'pixlr'
 * 
 * @author Takashi Uchiyama
 *
 **/

include_once( dirname(__FILE__) .'/../../elfinder/php/elFinder.class.php');

class elFinder_xh extends elFinder{

/** arry_merge..
 * Sorry Don't work .People the cause is found, please tell me!!

	public $add_commands = array(
			'pixlr'	 => array('target' => false, 'node' => false, 'image' => false, 'type' => false, 'title' => false)
					);

	public function __construct(){
		$this->commands = array_merge($this->commands, $this->add_commands);
	}
**/
/*** Overwrite add 'pixlr'=>... */

	protected $commands = array(
		'open'      => array('target' => false, 'tree' => false, 'init' => false, 'mimes' => false, 'compare' => false),
		'ls'        => array('target' => true, 'mimes' => false, 'intersect' => false),
		'tree'      => array('target' => true),
		'parents'   => array('target' => true),
		'tmb'       => array('targets' => true),
		'file'      => array('target' => true, 'download' => false),
		'zipdl'     => array('targets' => true, 'download' => false),
		'size'      => array('targets' => true),
		'mkdir'     => array('target' => true, 'name' => false, 'dirs' => false),
		'mkfile'    => array('target' => true, 'name' => true, 'mimes' => false),
		'rm'        => array('targets' => true),
		'rename'    => array('target' => true, 'name' => true, 'mimes' => false),
		'duplicate' => array('targets' => true, 'suffix' => false),
		'paste'     => array('dst' => true, 'targets' => true, 'cut' => false, 'mimes' => false, 'renames' => false, 'hashes' => false, 'suffix' => false),
		'upload'    => array('target' => true, 'FILES' => true, 'mimes' => false, 'html' => false, 'upload' => false, 'name' => false, 'upload_path' => false, 'chunk' => false, 'cid' => false, 'node' => false, 'renames' => false, 'hashes' => false, 'suffix' => false, 'mtime' => false),
		'get'       => array('target' => true, 'conv' => false),
		'put'       => array('target' => true, 'content' => '', 'mimes' => false),
		'archive'   => array('targets' => true, 'type' => true, 'mimes' => false, 'name' => false),
		'extract'   => array('target' => true, 'mimes' => false, 'makedir' => false),
		'search'    => array('q' => true, 'mimes' => false, 'target' => false),
		'info'      => array('targets' => true, 'compare' => false),
		'dim'       => array('target' => true),
		'resize'    => array('target' => true, 'width' => true, 'height' => true, 'mode' => false, 'x' => false, 'y' => false, 'degree' => false, 'quality' => false),
		'netmount'  => array('protocol' => true, 'host' => true, 'path' => false, 'port' => false, 'user' => false, 'pass' => false, 'alias' => false, 'options' => false),
		'url'       => array('target' => true, 'options' => false),
		'callback'  => array('node' => true, 'json' => false, 'bind' => false, 'done' => false),
		'chmod'     => array('targets' => true, 'mode' => true),
		'pixlr'	 => array('target' => false, 'node' => false, 'image' => false, 'type' => false, 'title' => false)
	);

	/**
	 * Edit on Pixlr.com
	 *
	 * @param  array  command arguments
	 * @author Naoki Sawada
	 **/
	 protected function pixlr($args) {

		$out = array();
		if (! empty($args['target'])) {
			$args['upload'] = array( $args['image'] );
			$args['name']   = array( preg_replace('/\.[a-z]{1,4}$/i', '', $args['title']).'.'.$args['type'] );
				
			$res = $this->upload($args);
				
			$res['callback'] = array(
				'node' => $args['node'],
				'bind' => 'upload'
			);
		} else {
			$res = array(
				'error'    => $this->error(self::ERROR_UPLOAD_NO_FILES),
				'callback' => array('node' => $args['node'])
			);
		}
		
		return $res;
	}

}
