<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

if($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_question',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('question'), 'success');
    }else{
        message('删除失败！','','error');
    }
}else{
    $where=" WHERE uniacid=:uniacid ";
    if($_GPC['keywords']){
        $op=$_GPC['keywords'];
        $where .=" and question LIKE concat('%', :question,'%') ";
        $data[':question']=$op;
    }

    // if(!empty($_GPC['time'])){
    //     $start=strtotime($_GPC['time']['start']);
    //     $end=strtotime($_GPC['time']['end']);
    //     $where.=" and ime >={$start} and time<={$end}";
    // }

    $type=isset($_GPC['type'])?$_GPC['type']:'all';
    $data[':uniacid']=$_W['uniacid'];

    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from " . tablename("lhyzhnc_sun_question"). " ".$where." order by sort asc ";
    $total=pdo_fetchcolumn("select count(*) from " . tablename("lhyzhnc_sun_question")." " .$where." order by sort asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    $pager = pagination($total, $pageindex, $pagesize);
}
include $this->template('web/question');