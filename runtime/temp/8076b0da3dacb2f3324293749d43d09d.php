<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"./application/admin/view2/comment/ajax_ask_list.html";i:1495107356;}*/ ?>
<form id="op" action="<?php echo U('Comment/ask_handle'); ?>" method="post">
<table>
 	<tbody>
 	<?php if(empty($comment_list) == true): ?>
 		<tr data-id="0">
	        <td class="no-data" align="center" axis="col0" colspan="50">
	        	<i class="fa fa-exclamation-circle"></i>没有符合条件的记录
	        </td>
	     </tr>
	<?php else: if(is_array($comment_list) || $comment_list instanceof \think\Collection || $comment_list instanceof \think\Paginator): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
  	<tr data-id="<?php echo $list['comment_id']; ?>">
        <td class="sign" axis="col0">
          <div style="width: 24px;"><i class="ico-check" ><input type="checkbox" name="selected[]" value="<?php echo $list['id']; ?>" style="display:none;"/></i></div>
        </td>
        <td align="left" abbr="nickname" axis="col3" class="">
          <div style="text-align: left; width: 120px;" class=""><?php echo $list['username']; ?></div>
        </td>        
        <td align="left" abbr=content axis="col4" class="">
          	<div style="text-align: left; width: 260px;" class=""><?php echo $list['content']; ?></div>
        </td> 
        <td align="center" abbr="article_show" axis="col5" class="" style="white-space: normal;">
            <div style="text-align: left; width: 260px;white-space: normal;height:inherit;line-height: inherit;" class="">
          		<a target="_blank" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$list[goods_id])); ?>"><?php echo $goods_list[$list[goods_id]]; ?></a>
          	</div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 80px;">
                    <?php if($list[is_show] == 1): ?>
                      <span class="yes" onClick="changeTableVal('goods_consult','id','<?php echo $list['id']; ?>','is_show',this)" ><i class="fa fa-check-circle"></i>是</span>
                      <?php else: ?>
                      <span class="no" onClick="changeTableVal('goods_consult','id','<?php echo $list['id']; ?>','is_show',this)" ><i class="fa fa-ban"></i>否</span>
                    <?php endif; ?>
        </div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 120px;" class=""><?php echo $consult_type[$list[consult_type]]; ?></div>
        </td>        
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 120px;" class=""><?php echo date('Y-m-d H:i:s',$list['add_time']); ?></div>
        </td>     
        <td align="center" abbr="article_time" axis="col6" class="">
               <div style="text-align: center; width: 160px;" class="">
       			<a class="btn green" style="display:"  href="<?php echo U('Comment/consult_info',array('id'=>$list[id])); ?>"><i class="fa fa-list-alt"></i>查看</a>
       		</div>
           </td>
         <td align="" class="" style="width: 100%;">
            <div>&nbsp;</div>
          </td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </tbody>
</table>

    <div class="sDiv" style="float:left;margin-top:10px">
        <?php if(empty($comment_list) != true): ?>
            <select name="type" id="operate">
                <option value="0">操作选择</option>
                <option value="show">显示</option>
                <option value="hide">隐藏</option>
                <option value="del">删除</option>
            </select>

            <button type="submit">确定</button>
        <?php endif; ?>
    </div>
</form>	
<div class="row">
    <div class="col-sm-6 text-left"></div>
    <div class="col-sm-6 text-right"><?php echo $page; ?></div>
</div>
<script>
    $(".pagination  a").click(function(){
        var page = $(this).data('p');
        ajax_get_table('search-form2',page);
    }); 
    
    $( '.ftitle > h5').empty().html("(共<?php echo $pager->totalRows; ?>条记录)");
   
</script>