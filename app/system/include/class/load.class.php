<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 

defined('IN_MET') or exit('No permission');

/**
 * 加载类
 */
class load {
	private static $mclass = array();
	/**
	 * 加载系统类
	 * @param string $classname 需要引用系统类的类名，一般不需要加.class.php
	 * @param string $action    同_load_class的$action参数
	 * @return 同_load_class
	 */
	public static function sys_class($classname ,$action = '') {
		return self::_load_class(PATH_SYS_CLASS, $classname, $action);
	}
	
	/**
	 * 加载系统函数库
	 * @param  string $funcname 需要引用系统函数库名，一般不需要加func.php
	 * @return 同_load_func
	 */
	public static function sys_func($funcname) {
		return self::_load_func(PATH_SYS_FUNC, $funcname);
	}
	
	/**
	 * 加载模块功能类
	 */
	public static function mod_class($classname ,$action = '') {
		$classname=str_replace('.class.php', '', $classname);
		$filedir = PATH_MODULE_FILE;
		if(file_exists($filedir.'include/class/'.$classname.'.class.php')){
			return self::_load_class($filedir.'include/class/', $classname, $action);
		}else{
			$classdir = self::dir_get($classname);
			return self::_load_class($filedir.$classdir['dir'], $classdir['file'], $action);
		}
	}
	
	/**
	 * 加载模块功能方法
	 */
	public static function mod_func($funcname) {
		$funcname=str_replace('.func.php', '', $funcname);
		$filedir = PATH_MODULE_FILE;
		if(file_exists($filedir.'include/function/'.$funcname.'.func.php')){
			return self::_load_func($filedir.'include/function/', $funcname);
		}else{
			$funcdir = self::dir_get($funcname);
			return self::_load_func($filedir.$funcdir['dir'], $funcdir['file']);
		}
	}
	public static function app_class($classname ,$action = '') {
		$classname=str_replace('.class.php', '', $classname);
		$filedir = PATH_ALL_APP;
		$classdir = self::dir_get($classname);
		return self::_load_class($filedir.$classdir['dir'], $classdir['file'], $action);

	}
	public static function app_func($classname) {
		$funcname=str_replace('.func.php', '', $funcname);
		$filedir = PATH_ALL_APP;
		$funcdir = self::dir_get($funcname);
		return self::_load_func($filedir.$funcdir['dir'], $funcdir['file']);
	}
	/**
	 * 加载应用自定义类
	 * @param string $classname 需要引用应用自定义类的类名，一般不需要加.class.php
	 * @param string $action    同_load_class的$action参数
	 * @return 同_load_class
	 */
	public static function own_class($classname ,$action = '') {
		$classname=str_replace('.class.php', '', $classname);
		$filedir = PATH_APP_FILE;
		if(file_exists($filedir.'include/class/'.$classname.'.class.php')){
			return self::_load_class($filedir.'include/class/', $classname, $action);
		}else{
			$classdir = self::dir_get($classname);
			return self::_load_class($filedir.$classdir['dir'], $classdir['file'], $action);
		}
	}

	/**
	 * 加载应用自定义函数库
	 * @param  string $funcname 需要引用应用自定义函数库名，一般不需要加func.php
	 * @return 同_load_class
	 */
	public static function own_func($funcname) {
		$funcname=str_replace('.func.php', '', $funcname);
		$filedir = PATH_APP_FILE;
		if(file_exists($filedir.'include/function/'.$funcname.'.func.php')){
			return self::_load_func($filedir.'include/function/', $funcname);
		}else{
			$funcdir = self::dir_get($funcname);
			return self::_load_func($filedir.$funcdir['dir'], $funcdir['file']);
		}
	}
	
	/**
	 * 加载模块
	 * @param  string $funcname    需要引用模块路径
	 * @param  string $classname   模块名称，一般不需要加.class.php
	 * @param  string $action      同_load_class的$action参数
	 * @return 同_load_class
	 */
	public static function module($path = '', $modulename = '', $action = '') {
		if (!$path) {
			if (!$path) $path = PATH_OWN_FILE;
			if (!$modulename) $modulename = M_CLASS;
			if (!$action) $action = M_ACTION;
			if (!$action) $action = 'doindex';
		}
		return self::_load_class($path, $modulename, $action);
	}
	
	/**
	 * 加载系统模块
	 * @param  string $funcname    需要引用模块路径
	 * @param  string $modulename  模块名称，一般不需要加.class.php
	 * @return 同_load_func
	 */
	public static function sys_module($modulename='') {
		return self::module(PATH_SYS_MODULE, $modulename);
	}
	
	/**
	 * 加载插件
	 * @param  string $plugin 需要加载的插件系统名
	 */
	public static function plugin($plugin, $return = 0){
		global $_M;
		if (!$_M['plugin']) {
			$query = "SELECT * FROM {$_M['table']['app_plugin']}  WHERE effect='1' ORDER BY no_order DESC";
			$plugins = DB::get_all($query);
			foreach($plugins as $key => $val){
				$_M['plugin'][$val['m_action']][] = $val['m_name'];
			}
		}
		
		foreach ($_M['plugin'][$plugin] as $key => $val) {
			$own = $_M['url']['own'];
			$_M['url']['own'] = $_M['url']['app'].$val.'/';
			if (file_exists(PATH_APP.'app/'.$val.'/plugin/'.'plugin_'.$val.'.class.php')) {
				require_once PATH_APP.'app/'.$val.'/plugin/'.'plugin_'.$val.'.class.php';
				//self::_load_class(PATH_APP.'app/'.$val.'/plugin/', 'plugin_'.$val, $plugin);
				$name = 'plugin_'.$val;
				if (class_exists($name)) {
					$newclass = new $name;
					if(method_exists($newclass, $plugin)){
						if($return == 1){
							return call_user_func(array($newclass, $plugin));
						}else{
							call_user_func(array($newclass, $plugin));
						}
					}
				}
			}
			$_M['url']['own'] = $own;
		}
		
	}
	
	/**
	 * 加载系统类
	 * @param string $path      加载类的路径，必须是绝对地址
	 * @param string $classname 需要引用类的类名，一般不需要加.class.php
	 * @param string $action    可以在引用这个类后，实例化类，并执行一个已do开头的类的方法
	 * 当acinton为空的时候，只引用文件。当acinton为new时候，会实例化这个类。当acinton为do开头时候，会实例化类，并执行这个方法。
	 * @return 当acinton为空的时候，回传ture,当acinton不为空，回传实例化的类。
	 */
	private static function _load_class($path, $classname, $action = '') {
		$classname=str_replace('.class.php', '', $classname);
		if(!self::$mclass[$classname]){
			if (file_exists($path.'myclass/'.$classname.'.class.php')) {
				require_once $path.'myclass/'.$classname.'.class.php';
			} else if(file_exists($path.$classname.'.class.php')){
				require_once $path.$classname.'.class.php';
			} else {
				echo str_replace(PATH_WEB, '', $path).$classname.'.class.php is not exists';
				exit;
			}
		}
		if ($action) {
			if (!class_exists($classname)) {
				die($action.' class\'s file is not exists!!!');
			}
			if(self::$mclass[$classname]){
				$newclass = self::$mclass[$classname];
			}else{
				$newclass = new $classname;
				self::$mclass[$classname] = $newclass;
			}
			if ($action!='new') {
				if(substr($action, 0, 2) != 'do'){
					die($action.' function no permission load!!!');
				}
				if(method_exists($newclass, $action)){
					call_user_func(array($newclass, $action));
				}else{
					die($action.' function is not exists!!!');
				}
			}
			return $newclass;
		}
		return  true;
	}
	
	/**
	 * 加载系统类
	 * @param  string $path 需要引用函数库的地址，必须是绝对路径
	 * @param  string $funcname 需要引用函数库名，一般不需要加func.php
	 * @return bool 如果不存在要加载的函数库，程序会停止。存在则加载，并返回true
	 */
	private static function _load_func($path, $funcname) {
		$funcname=str_replace('.func.php', '', $funcname);
		if (file_exists($path.$funcname.'.func.php')) {
			require_once $path.$funcname.'.func.php';
		} else {
			echo $funcname.'.func.php is not exists';
			exit;
		}
		return  true;
	}
	
	/**
	 * 路径解析
	 * @param  string $path 需要解析的路径
	 * @return array 解析好的路劲数组
	 */
	private static function dir_get($path) {
		$path =str_replace('\\', '/', $path);
		$paths = explode('/', $path);
		$dir['file'] = $paths[count($paths)-1];
		$dir['dir'] = substr($path, 0, strlen($path) - strlen($dir['file']));
		return $dir;
	}
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>