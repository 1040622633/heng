<?php  
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Deng extends Controller
{
	public function zhu()
	{
		return view('zhu');
	}
	public function shang()
	{
		$biao=Db::table('yong');
		$zhi=Request::instance()->post();
		$yong=$biao->where('yong',$zhi['yong'])->find();
		if($yong['mi']==$zhi['mi'])
		{
			Session::set('yong',$yong['yong']);
			$this->success('登陆成功','Xiang/hou');
		}
		else
		{
			$this->error('账户或密码错误');
		}
	}
	public function wen()
	{
		$biao=Db::table('wen');
		$zhi=$biao->select();
		$this->assign('zhi',$zhi);
		return view();
	}
	public function zhan($id)
	{
		$biao=Db::table('wen');
		$zhi=$biao->where("w_id",$id)->find();
		$this->assign('zhi',$zhi);
		return view();
	}
	public function ping()
	{
		$biao=Db::table('ping');
		$zhi=Request::instance()->post();
		$tian=$biao->insert($zhi);
		if($tian)
		{
			$this->zhan($zhi['w_id']);
			$this->success('评论成功','Deng/zhan');
		}
		else
		{
			$this->error('添加失败');
		}
	}
	// public function zhu()
	// {
	// 	$this->success("{:url(Xiang/zhu)}");
	// }
}
?>