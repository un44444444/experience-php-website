<?php defined('SYSPATH') or die('No direct script access.');

class Model_Blog extends Model_Database {

	/**
	 * 获取日志列表
	 * 
	 * @return 日志条目的记录集
	 */
	public function get_blog_list()
	{
		$sql = <<<EOT
SELECT article_entry_id,article_title,article_summary
 FROM article_entry
  ORDER BY article_entry_id DESC
EOT;
		return $this->_db->query(Database::SELECT, $sql, FALSE)->as_array();
	}

	/**
	 * 获取日志信息
	 * 
	 * @param $blog_id 日志编号
	 * @return 日志信息
	 */
	public function get_blog_info($blog_id)
	{
		$sql = <<<EOT
SELECT article_entry_id,article_title,article_summary,article_content
 FROM article_entry
  WHERE article_entry_id=$blog_id
EOT;
		$result = $this->_db->query(Database::SELECT, $sql, FALSE)->as_array();
		if (empty($result))
			return null;
		else
			return $result[0];
	}

//	/**
//	 * 添加新单位
//	 * @param array $params 单位详细资料
//	 */
//	public function add_new_unit(array& $params)
//	{
//		//获取其他提交参数
//		$code = addslashes($params['code']);
//		$name = addslashes($params['name']);
//		$shortname = addslashes($params['shortname']);
//		$master = addslashes($params['master']);
//		$contact = addslashes($params['contact']);
//		$telephone = addslashes($params['telephone']);
//		$postcode = addslashes($params['postcode']);
//		$fax = addslashes($params['fax']);
//		$site = addslashes($params['site']);
//		$addr = addslashes($params['addr']);
//		
//		$sql = <<<EOT
//INSERT INTO org_units(code,name,shortname,master,contact,telephone,addr,postcode,fax,site)
// VALUES('$code','$name','$shortname','$master','$contact','$telephone','$addr','$postcode','$fax','$site')
//EOT;
//		try {
//			$this->_db->query(Database::INSERT, $sql, FALSE);
//			return true;
//		}
//		catch(Database_Exception $e) {
//			return false;
//		}
//	}
//
//	/**
//	 * 修改单位信息
//	 * @param array $params 单位详细资料
//	 */
//	public function modify_unit_info(array& $params)
//	{
//		//获取其他提交参数
//		$code = addslashes($params['code']);
//		//$name = addslashes($params['name']);
//		$shortname = addslashes($params['shortname']);
//		$master = addslashes($params['master']);
//		$contact = addslashes($params['contact']);
//		$telephone = addslashes($params['telephone']);
//		$postcode = addslashes($params['postcode']);
//		$fax = addslashes($params['fax']);
//		$site = addslashes($params['site']);
//		$addr = addslashes($params['addr']);
//		
//		//name='$name',
//		$sql = <<<EOT
//UPDATE org_units SET code='$code',shortname='$shortname',
// master='$master',contact='$contact',telephone='$telephone',
// addr='$addr',postcode='$postcode',fax='$fax',site='$site'
// WHERE code='$code'
//EOT;
//		try {
//			$this->_db->query(Database::UPDATE, $sql, FALSE);
//			return true;
//		}
//		catch(Database_Exception $e) {
//			return false;
//		}
//	}
//
//	/**
//	 * 删除单位
//	 * @param $code 单位代码
//	 */
//	public function remove_unit($code)
//	{
//		$sql = <<<EOT
//DELETE FROM org_units WHERE code='$code'
//EOT;
//		try {
//			return $this->_db->query(Database::DELETE, $sql, FALSE);
//		}
//		catch(Database_Exception $e) {
//			return false;
//		}
//	}

} // End Model_Blog
