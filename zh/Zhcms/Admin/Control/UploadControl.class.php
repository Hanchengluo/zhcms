<?php
if(!defined("ZHPHP_PATH"))exit;
/**
 * 文章附件上传(Thumb,Image,Images)
 * Class IndexControl
 * @author 周鸿<136871204@qq.com>
 */
class UploadControl extends CommonControl
{
	private $_db;
	public function __init(){
		$this->_db = M('upload');
	}
    //显示文件列表
    public function index()
    {
        //上传类型
        $type = Q('type', null, 'strtolower');
        //上传目录  
        $dir = C('UPLOAD_PATH')."/original/" . Q("get.dir", "content") . "/" .date("Y/m/d/");
        //上传数量
        $limit = Q("get.num", 1, "intval");
        //上传文件类型
        $filetype = Q('filetype', 'jpg,png,gif,jpeg', 'strtolower');
        //uploadify插件使用的上传类型
        //转换成：*.jpg,*.png,*.gif,*.jpeg
        $uploadtype = '*.' . str_replace(',', ',*.', $filetype);
        
        $thumb_size=Q('thumb_size','');
        
        switch ($type) {
            case 'thumb':
                //最大上传图片尺寸
                $upload_img_max_width = C('upload_img_max_width');
                $upload_img_max_height = C('upload_img_max_height');
                $tag = array(
                    "type" => $filetype,
                    "name" => "zhcms",
                    "dir" => $dir,
                    "limit" => 1,
                    "width" => 88,
                    "height" => 78,
                    "waterbtn" => 1,
                    "upload_img_max_width" => $upload_img_max_width,
                    "upload_img_max_height" => $upload_img_max_height,
                );
                break;
            case 'image':
                //最大上传图片尺寸
                $upload_img_max_width = C('upload_img_max_width');
                $upload_img_max_height = C('upload_img_max_height');
                $tag = array(
                    "type" => $filetype,
                    "name" => "zhcms",
                    "dir" => $dir,
                    "limit" => 1,
                    "width" => 88,
                    "height" => 78,
                    "waterbtn" => 1,
                    "upload_img_max_width" => $upload_img_max_width,
                    "upload_img_max_height" => $upload_img_max_height,
                    'thumb_size'=>$thumb_size,
                );
                break;
            case 'images';
                //最大上传图片尺寸
                $upload_img_max_width = Q('upload_img_max_width') ? Q('upload_img_max_width') : C('upload_img_max_width');
                $upload_img_max_height = Q('upload_img_max_height') ? Q('upload_img_max_height') : C('upload_img_max_height');
                $tag = array(
                    "type" => $uploadtype,
                    "name" => "zhcms",
                    "dir" => $dir,
                    "limit" => $limit,
                    "width" => 88,
                    "height" => 78,
                    "waterbtn" => 1,
                    "upload_img_max_width" => $upload_img_max_width,
                    "upload_img_max_height" => $upload_img_max_height,
                    'thumb_size'=>$thumb_size,
                );
                break;
            case 'files':
                $tag = array(
                    "type" => $uploadtype,
                    "name" => "zhcms",
                    "dir" => $dir,
                    "width" => 88,
                    "height" => 78,
                    "limit" => $limit,
                    "waterbtn" => 0,
                    "size"=>10
                );
                break;
        }
        
        $upload = tag("upload", $tag);
        
        $get = '';
        foreach ($_GET as $name => $v) {
            $get .= "var $name='$v';\n";
        }
        $this->get = $get;
        $this->upload = $upload;
        //站内图片
        //$this->site($filetype);
        //未使用图片
        //$this->untreated($filetype);
        $this->display();
    }
    /**
     * Uploadify上传文件处理
     */
    public function zh_uploadify()
    {
    	$uploadModel = M('upload');
        //开启裁切
        C('UPLOAD_IMG_RESIZE_ON', true);
        C('upload_img_max_width', $_POST['upload_img_max_width']);
        C('upload_img_max_height', $_POST['upload_img_max_height']);
		$size=Q('size')?Q('size'):C('allow_size');
        $allow_type=Q('allow_type')?Q('allow_type'):"";
        if($allow_type==''){
            $allow_type_array=array();
        }else{
            $allow_type = str_replace('*.', '', $allow_type);
            $allow_type_array=explode(";",$allow_type);
        }
        
        $thumb_size=Q('thumb_size','');
        $original_file_dir=Q('post.upload_dir');
 
        if($thumb_size==''){
            $upload = new Upload($original_file_dir, $allow_type_array, $size, Q("water"));
        }else{
            if(!empty($thumb_size)){
                //500*500,300*300,200*200
                $thumb_arr=array();
                
                $thumb_size_array=explode(",",$thumb_size);
                
                foreach($thumb_size_array as $sizek=>$sizev){
                    $size=explode("*",$sizev);
                    $thumb_file_name=str_replace("original",$size[0]."x".$size[1],$original_file_dir);
                    $thumb_arr[]=array($thumb_file_name,$size[0],$size[1],5);
                    
                }
            
                $upload = new Upload($original_file_dir, $allow_type_array, $size, Q("water"),true,$thumb_arr);
            }
            
        }
        
        /*
        $this->thumbOn=true;
            $this->thumb=array(
                        array('upload/line/200x200/1.jpg',200,200,5),
                        array('upload/line/300x300/2.jpg',300,300,5),
            );
        */
        //p($allow_type_array);
        //$upload = new Upload(Q('post.upload_dir'), $allow_type_array, $size, Q("water"));
        $file = $upload->uploadFile();
        //$upload->thumb();
        if (!empty($file)) {
            $file = $file[0];
            /*if(empty(session('uid')))
            {
                $file['uid']='';
            }else{
                $file['uid']=session('uid');
            }*/
            /*if(session('uid')){
                $file['uid']=session('uid');
            }else if(session('bid')){
                 $file['uid']=session('bid');
            }*/
			
            $data['stat'] = 1;
            $data['url'] = __ROOT__ . '/' . $file['path'];
            $data['path'] = $file['path'];
            $data['filename'] = $file['filename'];
            $data['name'] = $file['name'];
            $data['basename'] = $file['basename'];
            $data['thumb'] = array();
            $data['isimage'] = $file['image'];
            //写入upload表
            
            //$data['table_id']=$uploadModel->add($file);
        } else {
            $data['stat'] = 0;
            $data['msg'] = $upload->error;
        }
        echo json_encode($data);
        exit;
    }
    
    /**
     * 删除文件处理
     */
    public function zh_uploadify_del(){
        $files = explode("@@", Q('file'));
        $delFlie=$files[0];
         is_file($delFlie) and unlink($delFlie);
         $this->ajax(1);
        //$uploadModel = M('upload');
        /*if($uploadModel->where(" path = '$delFlie' ")->del()){
            is_file($delFlie) and unlink($delFlie);
            $this->ajax(1);
        }else{
            $this->ajax(2);
        }*/
    }

    /**
     * 当修改图片的alt表单数据时，Ajax更改upload表中的name字段值
     */
    public function update_file_name()
    {
        $name = Q('name');
        $id = Q('id', null, 'intval');
        $this->_db->save(array(
            "id" => $id,
            "name" => $name
        ));
    }

    /**
     * 站内文件
     */
    public function site()
    {
        //上传文件类型
        $type = explode(',', Q('filetype'));
        $type = implode("','", $type);
        //只查找自己的图片
        if(session('uid')){
                $where = 'uid=' . $_SESSION['uid'] . " AND ext IN('$type') AND state=1";
            }else if(session('bid')){
                 $where = 'uid=' . $_SESSION['bid'] . " AND ext IN('$type') AND state=1";
            }
        //$where = 'uid=' . $_SESSION['uid'] . " AND ext IN('$type') AND state=1";
        $count = $this->_db->where($where)->count();
        $page = new Page($count, 10, 8, '', '', __WEB__ . '?a=Admin&c=ContentUpload&m=site&filetype=' . Q('filetype'));
        $this->site_data = $this->_db->where($where)->limit($page->limit())->all();
        $this->site_page = $page->show();
        if (METHOD == 'site') {
            $this->display('site');
        }
    }

    /**
     * 未使用的文件
     */
    public function untreated()
    {
        //只查找自己的图片
        $type = explode(',', Q('filetype'));
        $type = implode("','", $type);
        //只查找自己的图片
        if(session('uid')){
                $where = 'uid=' . $_SESSION['uid'] . " AND ext IN('$type') AND state=0";
            }else if(session('bid')){
                 $where = 'uid=' . $_SESSION['bid'] . " AND ext IN('$type') AND state=0";
            }
        //$where = 'uid=' . $_SESSION['uid'] . " AND ext IN('$type') AND state=0";
        $count = $this->_db->where($where)->count();
        $page = new Page($count, 10, 8, '', '', __WEB__ . '?a=Admin&c=ContentUpload&m=untreated&filetype=' . Q('filetype'));
        $this->untreated_data = $this->_db->where($where)->limit($page->limit())->all();
        $this->untreated_page = $page->show();
        if (METHOD == 'untreated') {
            $this->display('untreated');
        }
    }

}























