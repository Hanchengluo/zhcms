<?php

/**
 * 会员组管理
 * Class GroupControl
 * @author 周鸿 <136871204@qq.com>
 */
class GroupControl extends AuthControl {

	public function index() {
		$roleData = cache('role');
		$AdminRole = array();
		foreach ($roleData as $role) {
			if ($role['admin'] == 0) {
				$AdminRole[] = $role;
			}
		}
		$this -> assign('data', $AdminRole);
		$this -> display();
	}

	/**
	 * 添加角色
	 */
	public function add() {
		if (IS_POST) {
			$role = K('Role');
			if ($aid = $role -> addRole($_POST)) {
				$this -> success('グループ新規成功！');
			}
		} else {
			$this -> display();
		}
	}

	//更新缓存
	public function updateCache() {
		$RoleModel = K('Role');
		if ($RoleModel -> updateCache()) {
			$this -> success('キャッシュ更新成功');
		} else {
			$this -> error($RoleModel -> error);
		}
	}

	/**
	 * 验证角色是否存在
	 */
	public function check_role() {
		$model = M('role');
		//角色名称
		$rname = Q('rname', NULL, 'trim');
		//角色ID（编辑角色时验证）
		$rid = Q('rid', NULL, 'intval');
		if ($rid) {
			$model -> where("rid <>$rid");
		}
		//编辑角色时验证
		$stat = $model -> where("rname ='$rname'") -> find() ? 0 : 1;
		$this -> ajax($stat);
	}

	/**
	 * 编辑角色
	 */
	public function edit() {
		if (IS_POST) {
			$Model = K('Role');
			if ($Model -> editRole($_POST)) {
				$this -> success('グループ変更成功！');
			} else {
				$this -> error($Model -> error);
			}
		} else {
			$rid = Q('rid', 0, 'intval');
			if ($rid) {
				$this -> assign('field', M('role') -> find($rid));
				$this -> display();
			}
		}
	}

	/**
	 * 删除角色
	 */
	public function del() {
		$rid = Q('rid', 0, 'intval');
		if ($rid) {
			$Model = K('Role');
			//用户组关联表
			$Model -> delRole($rid);
			$this -> success('グループ削除成功！');
		}
	}

}
