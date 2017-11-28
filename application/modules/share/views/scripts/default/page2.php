<?php if ($this->pageCount): ?> 
<script language="javascript">
function go(page) {
	try {
		var baseurl = '<?=$this->url(array('page'=>0));?>';
		var newurl = baseurl.substring(0,baseurl.lastIndexOf("/")+1);
		var pagecount = <?=$this->pageCount?>;
		if(page > 0 && page <= pagecount) {
			window.location.href = newurl + page;
		}
		else
		{
			alert("请输入正确的页码!");
		}
	}
	catch(e)
	{
		alert("Sorry:"+e);
	}
	return false;
}
</script>
<div class="pagination">

<!-- Previous page link --> 
<?php if (isset($this->previous)): ?> 
<a class="page-start" href="<?=$this->url(array('page'=>1,'searchString'=>$this->searchString))?>" title="第一页">&laquo;</a>
<a class="page-start" href="<?=$this->url(array('page'=>$this->previous,'searchString'=>$this->searchString))?>" title="上一页">&lsaquo;</a> 
<?php else: ?> 
  <span class="page-disabled">&laquo;</span> 
  <span class="page-disabled">&lsaquo;</span> 
<?php endif; ?> 

<!-- Numbered page links -->
<?php
	//针对大于10做特殊处理
  	if($this->pageCount>10){
  		//循环起始页
  		if($this->current<=5){
  			$start = 1;
  		}
  		else if ($this->current > ($this->pageCount-5)) {
  			$start = $this->pageCount-10;
  		}
  		else {
  			$start = $this->current-5;
  		}
  		for ($j= $start; $j<$start+10; $j++){
  			if ($j != $this->current){
?>
		    <a href="<?=$this->url(array('page'=>$j,'searchString'=>$this->searchString))?>"><?=$j;?></a>  
<?php 
  			}
  			else
			{
		    	echo '<span class="page-cur">'.$j.'</span>'; 
			}
  		}
  	}
  	else 
  	{
  		foreach ($this->pagesInRange as $page){
  			if ($page != $this->current){
?>	    
  				<a href="<?=$this->url(array('page'=>$page,'searchString'=>$this->searchString))?>"><?= $page; ?></a>  
<?php 
  			}
  			else 
  			{
  				echo '<span class="page-cur">'.$page.'</span>'; 
			}
  		}
  	}
?>

<!-- Next page link --> 
<?php if (isset($this->next)): ?> 
  <a class="page-end" href="<?=$this->url(array('page'=>$this->next,'searchString'=>$this->searchString))?>" title="下一页">&rsaquo;</a>
  <a class="page-end" href="<?=$this->url(array('page'=>$this->pageCount,'searchString'=>$this->searchString))?>" title="最末页">&raquo;</a>
<?php else: ?> 
  <span class="page-disabled">&rsaquo;</span>
  <span class="page-disabled">&raquo;</span>
<?php endif; ?> 
<!-- 分页信息 -->
<span class="page-skip">
&nbsp;<?=$this->current?>/<?=$this->pageCount?>
<!--输入跳转-->
<?php if ($this->pageCount>1):?>
&nbsp;<input id="pagenav" name="pagenav" type="text" size="2" />
<input type="button" value="GO" onclick="javascript:go(document.getElementById('pagenav').value);return false;" />
<?php endif; ?>
</a>
</div>
<?php endif; ?>
